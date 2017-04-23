<?php

namespace AssignProduct\Controller;

use Cake\Event\Event;
use Search\Manager;
use Cake\ORM\TableRegistry;
use Exception;
use Magento\Shell\Task\QueueExportProductsToMagentoManagerTask;

/**
 * Products Controller
 *
 * @property \Product\Products\Model\Table\ProductsTable $Products
 * @property \Usermgmt\Users\Model\Table\UserFirmsTable $UserFirms
 */
class ProductsController extends AppController
{
    public $components = ['Security'];
    public $Products;
    public $UserFirms;

    public function initialize()
    {
        parent::initialize();
        $this->loadComponent('RequestHandler');
        $this->loadComponent('Search.Prg', [
            'actions' => ['index']
        ]);


        $this->loadComponent('Paginator');
        $this->loadComponent('Product.Imageproduct');
        $this->loadComponent('Product.ProductParameters');
        $this->loadComponent('Product.ProdCategories');
        $this->loadComponent('Product.Firms');

        $this->Products = TableRegistry::get('Product.Products');
        $this->UserFirms = TableRegistry::get('Usermgmt.UserFirms');


    }


    public function beforeFilter(Event $event)
    {
        parent::beforeFilter($event);
        ProductInIt();
        $this->Auth->allow([$this->request['action']]);
        $this->Security->config('unlockedActions', [$this->request['action']]);
    }

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index($user_firm_id = null, $magento_customer_id = null)
    {
        $this->viewBuilder()->layout('AssignProduct.default');

        if ($this->UserFirms->exists(['id' => $user_firm_id])) {
            $query = $this->Products
                ->find('search', ['search' => $this->request->query])
                ->contain(['Uploads',
                    'ProductCategories',
                    'ProductStocks' => function ($q) use ($user_firm_id) {
                        return $q
                            ->where(['ProductStocks.user_firm_id' => $user_firm_id])
                            ->andWhere(['ProductStocks.export_to_store_status' => 1]);
                    }
                ]);

            if (isset($this->request->query['ProductCategories']['id'])) {
                $category_id = $this->request->query['ProductCategories']['id'];
                $query->matching('ProductCategories', function ($q) use ($category_id) {
                    return $q->where(['ProductCategories.id' => $category_id]);
                });
            }
            $products = $this->paginate($query);


            $this->set('products', $products);
            $this->set('userFirms', $this->Firms->selectFirms());
            $this->set('userFirmId', $user_firm_id);
            $this->set('shippingTypes', $this->Products->ShippingTypes->find('list'));
            $this->set('productCategories', $this->ProdCategories->getSelect2Categories());
            $this->set('_serialize', ['products']);
        } else {
            throw new Exception('Błędny numer konta użytkownika');
        }
    }

    /**
     * View method
     *
     * @param string|null $id Product id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {

        $product = $this->Products->get($id, [
            'contain' => ['ShippingTypes', 'Uploads', 'ProductDetails', 'Manufacturers', 'ProductCategories', 'Series']
        ]);

//        debug($product); die;
        $this->set('product', $product);
        $this->set('_serialize', ['product']);

//        $this->set('parameters_names', $this->productDetailNamesView());


        $parameters_names = $this->ProductParameters->productDetailNamesList();
        $this->set('parameters_names', $parameters_names);
        $this->loadModel('Product.ProductStocks');
        if ($this->UserAuth->isAdmin()) {

            $productStocks = $this->ProductStocks->find('all')
                ->contain(['Products', 'UserFirms', 'GroupAssortments'])
                ->where(['ProductStocks.product_id' => $id])->toArray();
            $this->set('productStocks', $productStocks);
        } else {
            $productStocks = $this->ProductStocks->find('all')
                ->contain(['Products', 'UserFirms', 'GroupAssortments'])
                ->where([
                    'ProductStocks.product_id' => $id,
                    'ProductStocks.user_firm_id IN' => $this->UserAuth->getFirmId()])->toArray();
            $this->set('productStocks', $productStocks);
        }
        $this->loadModel('Product.ProductCategories');
        $productCategories = $this->ProductCategories->find('threaded')->select(['id', 'parent_id', 'name'])->toArray();
        $this->set('productCategories', $productCategories);

        $this->set('return_url', $this->referer());
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|null Redirects on successful add, renders view otherwise.
     */
    public function assignProductToFirm()
    {

        $this->autoRender = false;
        $this->viewBuilder()->setLayout('ajax');
//        Configure::write('debug', 0);
        if ($this->request->is('put')) {
            try {
                $user_firm_id = (int)$this->request->getData('user_firm_id');
                $productIds = json_decode($this->request->getData('product_ids'), true);
                if ($this->setMassAssignToFirm($productIds, $user_firm_id)) {
                    echo json_encode(['error' => false, 'success' => true, 'ids' => $productIds, 'user_firm_id' => $user_firm_id]);
                } else {
                    echo json_encode(['error' => true, 'success' => false, 'message' => 'Błąd przypisania produktów do firmy', 'ids' => $productIds, 'user_firm_id' => $user_firm_id]);
                }


            } catch (Exception $e) {
                $this->errors[] = 'Wystąpił wyjątek nr ' . $e->getCode() . ', komunikat:' . $e->getMessage();
                echo json_encode([
                        'error' => true,
                        'success' => false,
                        'message' => implode(', ', $this->errors)]
                );
            }
        } else {
            $this->errors[] = __d('checkout', 'Request nie jest typu PUT');
            echo json_encode(['error' => true, 'success' => false, 'message' => implode(', ', $this->errors)]);
        }


    }

    public function setMassAssignToFirm($productIds, $user_firm_id)
    {
        if (is_array($productIds) && is_int($user_firm_id)) {

            $ProductStocks = TableRegistry::get('Product.ProductStocks');
            $ProductStocks->connection()->transactional(function () use ($ProductStocks, $productIds, $user_firm_id) {
                foreach ($productIds as $product_id) {

                    if ($stockRow = $ProductStocks->find()->where([
                        'ProductStocks.product_id' => (int)$product_id,
                        'ProductStocks.user_firm_id' => (int)$user_firm_id,
                    ])->first()
                    ) {
                        if ($stockRow->export_to_store_status == 0) {
                            $stockRow->export_to_store_status = 1;
                            $ProductStocks->save($stockRow);
                        }

                    } else {

                        $productStockEntity = $ProductStocks->newEntity();
                        $productStockEntity['product_id'] = $product_id;
                        $productStockEntity['user_firm_id'] = $user_firm_id;
                        $productStockEntity['export_to_store_status'] = 1;

                        $ProductStocks->save($productStockEntity);
                    }
                }
            });
            // uruchamia proces exportu do magento
            $this->setTaskExportProductToMagento($user_firm_id);
            return true;
        } else {
            return false;
        }
    }

    private function setTaskExportProductToMagento($user_firm_id)
    {
        $userFirmStores = TableRegistry::get('Usermgmt.UserFirmStores')
            ->find()
            ->where(['UserFirmStores.user_firm_id' => $user_firm_id]);
        foreach ($userFirmStores as $ufsKey => $userFirmStore) {
            $addingQueueSuccess = (new QueueExportProductsToMagentoManagerTask)
                ->setUserFirmStoreId($userFirmStore->id)
                ->add();
        }

    }

    /**
     * Edit method
     *
     * @param string|null $id Product id.
     * @return \Cake\Network\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $product = $this->Products->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $product = $this->Products->patchEntity($product, $this->request->getData());
            if ($this->Products->save($product)) {
                $this->Flash->success(__('The product has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The product could not be saved. Please, try again.'));
        }
        $this->set(compact('product'));
        $this->set('_serialize', ['product']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Product id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $product = $this->Products->get($id);
        if ($this->Products->delete($product)) {
            $this->Flash->success(__('The product has been deleted.'));
        } else {
            $this->Flash->error(__('The product could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
