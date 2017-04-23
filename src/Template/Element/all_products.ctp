<?php use Cake\Routing\Router; ?>
<?php $this->Html->script('/product/js/products-filter-form.js?q=' . QRDN, ['block' => true]); ?>
<?php //$this->Html->script('/product/js/product-filter-form-categories-jstree.js?q=' . QRDN, ['block' => true]); ?>
<?php echo $this->element('Product.form_filter_hidden', ['columns' => [
    'id' => 'id',
    'sku' => 'sku',
    'q' => 'q',
    'productcategories-id' => 'ProductCategories.id']]);
?>


<?php
// parametry ajax
$this->Html->script('../../assets/global/plugins/typeahead/handlebars.min.js?q=' . QRDN, ['block' => true]);
$this->Html->script('../../assets/global/plugins/typeahead/typeahead.bundle.min.js?q=' . QRDN, ['block' => true]);
$this->Html->script('../../assets/global/plugins/jquery.serializejson/jquery.serializejson.min.js?q=' . QRDN, ['block' => true]);
$this->Html->script('/AssignProduct/js/products-mass-action.js?q=' . QRDN, ['block' => true]);
?>
<div class="modal fade" id="filter-more" tabindex="-1" role="basic" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                <h4 class="modal-title"><?php echo __d('product', 'Filter') ?></h4>
            </div>
            <div class="modal-body">
                <?php
                $parameters = ['data-file-name' => 'productcategories-id', 'class' => 'filtersFiles input-filters form-filter form-control input-sm', 'label' => false, 'div' => false];
                $parameters['options'] = $productCategories;
                $parameters['empty'] = __d('product', 'Select Category');
                $parameters['class'] = $parameters['class'] . ' selectpicker'; //select2
                $parameters['data-live-search'] = 'true';
                $parameters['data-size'] = '5';
                echo $this->Form->input('ProductCategories.id', $parameters);
                ?>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn dark btn-outline" data-dismiss="modal">Close</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>

<table class="table  table-hover table-light  table-advance table-checkable table-condensed">
    <thead>
    <tr class="heading" role="row">
        <th class="table-column"></th>
        <th class="table-column"><?php echo __d('product', 'Image'); ?></th>
        <th class="table-column"><?= $this->Paginator->sort('id') ?></th>
        <th class="table-column"><?= $this->Paginator->sort('sku', __d('product', 'SKU')) ?></th>
        <th style="min-width: 350px;"><?= $this->Paginator->sort('name', __d('product', 'Name')) ?></th>
        <th class="table-column"><?= $this->Paginator->sort('unit', __d('product', 'Unit')) ?></th>
        <th class="table-column"><?= $this->Paginator->sort('weight', __d('product', 'Weight')) ?></th>
    </tr>
    <tr class="filter" role="row">
        <th>
            <label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
                <input type="checkbox" class="all-checkboxes" data-user-firm-id="<?= $userFirmId ?>"
                       data-url="<?php echo Router::url(['controller' => 'Products', 'action' => 'assignProductToFirm', 'plugin' => 'AssignProduct']); ?>">
            </label>
        </th>
        <th></th>
        <th>
            <?php
            $parameters = ['data-file-name' => 'id', 'class' => 'filtersFiles input-filters form-filter form-control input-sm', 'label' => false, 'div' => false];
            echo $this->Form->input('id', $parameters); ?>
        </th>
        <th>
            <?php
            $parameters = ['data-file-name' => 'sku', 'class' => 'filtersFiles input-filters form-filter  form-control input-sm', 'label' => false, 'div' => false];
            echo $this->Form->input('sku', $parameters); ?>
        </th>
        <th>
            <?php
            $parameters = ['data-file-name' => 'q', 'class' => 'filtersFiles input-filters form-control form-filter input-sm', 'label' => false, 'div' => false];
            echo $this->Form->input('q', $parameters); ?>
        </th>
        <th class="text-right" style="min-width: 80px;" colspan="2">
            <?php
            echo $this->Form->button('<i class="fa fa-ellipsis-h"></i>', ['type' => 'button', 'escape' => false, 'class' => 'btn-link ', 'data-toggle' => 'modal', 'href' => "#filter-more"]);
            echo $this->Form->button('<i class="fa fa-filter"></i>', ['type' => 'button', 'escape' => false, 'class' => 'btn-link ', 'onclick' => "document.getElementById('form-hidden-filter-products').submit();"]);
            echo $this->Html->link('<i class="fa fa-remove"></i>', ['action' => 'index'], ['escape' => false, 'class' => 'btn-link']);
            ?>
        </th>
    </tr>
    </thead>
    <tbody>
    <?php
    if (!empty($products)) {
        $page = $this->request->params['paging']['Products']['page'];
        $limit = $this->request->params['paging']['Products']['perPage'];
        $i = ($page - 1) * $limit;
        foreach ($products as $product_):
            $i++;
            ?>
            <tr class="heading" role="row">
                <th class="active">
                    <label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">

                        <input type="checkbox" class="checkboxes" value=""
                               id="product_id_<?= $product_->id; ?>"
                            <?php
                            $product_stock = ($product_->has('product_stocks')) ? reset($product_->product_stocks) : false;
                            if (isset($product_stock->id)) echo 'checked disabled'; ?>
                               data-id="<?= $product_->id; ?>"
                               data-user-firm-id="<?= $userFirmId ?>"
                               data-url="<?php echo Router::url(['controller' => 'Products', 'action' => 'assignProductToFirm', 'plugin' => 'AssignProduct']); ?>"
                        >

                    </label>
                </th>
                <td><?php echo $this->Html->link($this->ProductImages->getMainImage($product_, 30), ['controller' => 'Products', 'action' => 'view', $product_->id], ['escape' => false]); ?></td>
                <td><?= $this->Number->format($product_->id) ?></td>
                <td>
                    <?php
                    // echo $this->Slug->link($product, $product->sku, ['controller' => 'Products', 'action' => 'view', $product->id, 'plugin' => 'Product']);
                    echo $this->Html->link($product_->sku, ['controller' => 'Products', 'action' => 'view', $product_->id], ['escape' => false]);
                    ?></td>
                <td><?= $this->Html->link(h($product_->name), ['controller' => 'Products', 'action' => 'view', $product_->id], ['escape' => false]); ?></td>
                <td><?= $this->element('Product.unit', ['product' => $product_]); ?></td>
                <td><?= $this->element('Product.weight', ['product' => $product_]); ?> </td>

            </tr>
            <?php
        endforeach;
    } else {
        echo "<tr><td colspan=10><br/><br/>" . __d('product', 'No Records Available') . "</td></tr>";
    }
    ?>


    </tbody>
</table>

<div id="ajax-edit-product-parameters" class="modal fade" tabindex="-1" data-replace="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                <h4 class="modal-title"><?php echo __d('product', 'Parameters'); ?></h4>
            </div>
            <div class="modal-body">
                <img src="/../../assets/global/img/loading-spinner-grey.gif" alt="" class="loading">
                <span> &nbsp;&nbsp;Loading... </span>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn default"
                        data-dismiss="modal"><?php echo __d('product', 'Close'); ?></button>
            </div>
        </div>
    </div>
</div>
