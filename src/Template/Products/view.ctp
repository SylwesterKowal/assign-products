<?php
$this->assign('pageTitle', __d('product', 'Product Detail'));
$this->assign('pageTitleSmall', __d('product', ''));

$this->Html->css('/../../assets/global/plugins/cubeportfolio/css/cubeportfolio.css', ['block' => true]);
$this->Html->css('/../../assets/pages/css/portfolio.min.css', ['block' => true]);

$this->Html->script('/../../assets/global/plugins/cubeportfolio/js/jquery.cubeportfolio.min.js?q=' . QRDN, ['block' => true]);
$this->Html->script('/../../assets/pages/scripts/portfolio-4.js?q=' . QRDN, ['block' => true]);
?>
<div class="row">
    <div class="col-md-12">
        <div class="portlet light">
            <div class="portlet-title">
                <div class="caption">
                    <i class="icon-lock-open font-green"></i>
                    <span class="caption-subject font-green bold uppercase"><?php echo h($product['name']); ?></span>
                </div>
                <div class="actions">
                    <?php
                    $page = (isset($this->request->query['page'])) ? $this->request->query['page'] : 1;
                    if (isset($return_url)) {
                        $return_page = $return_url;
                    } else {
                        $return_page = ['action' => 'index', 'page' => $page];
                    }
                    ?>
                    <?php echo $this->Html->link('<i class="icon-action-undo"></i>', $return_page,
                        ['class' => 'btn btn-circle btn-icon-only btn-default', 'escape' => false, 'title' => __d('product', 'Back', true)]
                    ); ?>


                </div>
            </div>
            <div class="portlet-body">

                <div class="row">
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-3">
                                <?php echo $this->element('Product.product_catalog_info', ['product' => $product]); ?>
                            </div>
                            <div class="col-md-6">
                                <div class="portlet sale-summary">
                                    <div class="portlet-title">
                                        <div class="caption font-red sbold"> <?= __d('product', 'Main info'); ?> </div>
                                        <div class="tools">
                                            <a class="reload" href="javascript:;"> </a>
                                        </div>
                                    </div>
                                    <div class="portlet-body">
                                        <ul class="list-unstyled">
                                            <li>
                                                <span class="sale-info"> <?= __d('product', 'Product Name') ?>
                                                    <i class="fa fa-img-down"></i>
                                                </span>
                                                <span class="sale-num"> <?= h($product->name) ?> </span>
                                            </li>
                                            <?php if (!empty($product->short_name)) { ?>
                                                <li>
                                                <span class="sale-info"> <?= __d('product', 'Short Product Name') ?>
                                                    <i class="fa fa-img-down"></i>
                                                </span>
                                                    <span
                                                            class="sale-num"> <?= h($product->short_name) ?> </span>
                                                </li>
                                            <?php } ?>
                                            <?php if (!empty($product->short_description)) { ?>
                                                <li>
                                                <span class="sale-info"> <?= __d('product', 'Description') ?>
                                                    <i class="fa fa-img-down"></i>
                                                </span>
                                                    <span
                                                            class="sale-num"> <?= $product->short_description ?> </span>
                                                </li>
                                            <?php } ?>
                                            <?php if (!empty($product->description)) { ?>
                                                <li>
                                                    <span
                                                            class="sale-num"> <?= $product->description ?> </span>
                                                </li>
                                            <?php } ?>
                                            <?php if (!empty($product->short_description)) { ?>
                                                <li>
                                                <span class="sale-info"> <?= __d('product', 'Notes') ?>
                                                    <i class="fa fa-img-down"></i>
                                                </span>
                                                    <span
                                                            class="sale-num"> <?= h($product->notes) ?> </span>
                                                </li>
                                            <?php } ?>
                                        </ul>
                                    </div>
                                    <div class="portlet-title">
                                        <div
                                                class="caption font-red sbold"> <?= __d('product', 'Product Parameters'); ?> </div>
                                        <div class="tools">
                                            <a class="reload" href="javascript:;"> </a>
                                        </div>
                                    </div>
                                    <div class="portlet-body">
                                        <ul class="list-unstyled">
                                            <li>
                                                <?= $this->element('Product.parameters/display', ['product' => $product]); ?>
                                            </li>

                                        </ul>
                                    </div>

                                    <div class="portlet-title">
                                        <div
                                                class="caption font-red sbold"> <?= __d('product', 'Metadata Info'); ?> </div>
                                        <div class="tools">
                                            <a class="reload" href="javascript:;"> </a>
                                        </div>
                                    </div>
                                    <div class="portlet-body">
                                        <ul class="list-unstyled">
                                            <?php if (!empty($product->meta_title)) { ?>
                                                <li>
                                                <span class="sale-info"> <?= __d('product', 'Meta Title') ?>
                                                    <i class="fa fa-img-down"></i>
                                                </span>
                                                    <span
                                                            class="sale-num"> <?= h($product->meta_title) ?> </span>
                                                </li>
                                            <?php } ?>
                                            <?php if (!empty($product->meta_description)) { ?>
                                                <li>
                                                <span class="sale-info"> <?= __d('product', 'Meta Description') ?>
                                                    <i class="fa fa-img-down"></i>
                                                </span>
                                                    <span
                                                            class="sale-num"> <?= h($product->meta_description) ?> </span>
                                                </li>
                                            <?php } ?>
                                            <?php if (!empty($product->meta_keywords)) { ?>
                                                <li>
                                                <span class="sale-info"> <?= __d('product', 'Meta Keywords') ?>
                                                    <i class="fa fa-img-down"></i>
                                                </span>
                                                    <span
                                                            class="sale-num"> <?= h($product->meta_keywords) ?> </span>
                                                </li>
                                            <?php } ?>
                                        </ul>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="portlet sale-summary">
                                    <div class="portlet-title">
                                        <div
                                                class="caption font-red sbold"> <?= __d('product', 'Product Info'); ?></div>
                                        <div class="tools">
                                            <a class="reload" href="javascript:;"> </a>
                                        </div>
                                    </div>
                                    <div class="portlet-body">
                                        <ul class="list-unstyled">
                                            <li>
                                                <span class="sale-info"> <?= __d('product', 'SKU') ?>
                                                    <i class="fa fa-img-down"></i>
                                                </span>
                                                <span class="sale-num"> <?= $product->sku ?> </span>
                                            </li>
                                            <?php if (!empty($product->pn)) { ?>
                                                <li>
                                                <span class="sale-info"> <?= __d('product', 'P/N') ?>
                                                    <i class="fa fa-img-down"></i>
                                                </span>
                                                    <span class="sale-num"> <?= $product->pn ?> </span>
                                                </li>
                                            <?php } ?>
                                            <?php if (!empty($product->ean)) { ?>
                                                <li>
                                                <span class="sale-info"> <?= __d('product', 'EAN') ?>
                                                    <i class="fa fa-img-down"></i>
                                                </span>
                                                    <span class="sale-num"> <?= $product->ean ?> </span>
                                                </li>
                                            <?php } ?>
                                            <?php if (!empty($product->manufacturer_id)) { ?>
                                                <li>
                                                <span class="sale-info"> <?= __d('product', 'Manufacturer') ?>
                                                    <i class="fa fa-img-down"></i>
                                                </span>
                                                    <span class="sale-num"> <?= h($product->manufacturer->name) ?> </span>
                                                </li>
                                            <?php } ?>
                                            <?php if (!empty($product->serie_id)) { ?>
                                                <li>
                                                <span class="sale-info"> <?= __d('product', 'Serie') ?>
                                                    <i class="fa fa-img-down"></i>
                                                </span>
                                                    <span class="sale-num"> <?= h($product->series->name) ?> </span>
                                                </li>
                                            <?php } ?>
                                            <li>
                                                <span class="sale-info"> <?= __d('product', 'Weight') ?> </span>
                                                <span class="sale-num">
                                                    <?php
                                                    echo $this->Number->format($product->weight) . ' ' . __d('product', 'kg');
                                                    ?>
                                                </span>
                                            </li>
                                            <li>
                                                <span class="sale-info"> <?= __d('product', 'Unit') ?> </span>
                                                <span class="sale-num">
                                                    <?php
                                                    echo $this->Units->init()->unit((int)$product->unit, false, true);
                                                    ?>
                                                </span>
                                            </li>
                                            <?php if (!empty($product->quantity_in_package)) { ?>
                                                <li>
                                                <span class="sale-info"> <?= __d('product', 'Quantity in package') ?>
                                                    <i class="fa fa-img-down"></i>
                                                </span>
                                                    <span
                                                            class="sale-num"> <?= h($product->quantity_in_package) ?> </span>
                                                </li>
                                            <?php } ?>

                                            <li>
                                                <span class="sale-info"> <?= __d('product', 'Tax') ?> </span>
                                                <span class="sale-num">
                                                    <?php
                                                    $key = (int)$product->product_tax;
                                                    echo (isset($productTaxes->$key)) ? $productTaxes->$key : '';
                                                    ?>
                                                </span>
                                            </li>
                                        </ul>
                                    </div>


                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>

