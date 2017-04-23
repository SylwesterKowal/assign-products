<?php
$this->assign('pageTitle', __d('product', 'Products'));
$this->assign('pageTitleSmall', __d('product', ''));
?>

<div class="row">
    <div class="col-md-12">
        <!-- Begin: life time stats -->
        <div class="portlet light">
            <div class="portlet-title">
                <div class="caption">
                    <i class="icon-basket-loaded font-blue"></i>
                    <span class="caption-subject font-blue bold uppercase"><?php echo __d('product', 'Products'); ?></span>
                    <span class="caption-helper"><?php echo __d('product', 'main catalog '); ?></span>
                </div>
                <div class="actions">
                    <?php
                    if (
                        $this->UserAuth->HP('Products', 'add', 'Product') ||
                        $this->UserAuth->HP('Products', 'addMultipleProducts', 'Product')
                    ) {
                        ?>

                    <?php } ?>
                </div>
            </div>
            <div class="portlet-body">

                <?php //echo $this->Search->searchForm('Products', ['legend'=>false, 'updateDivId'=>'updateProductsIndex']); ?>
                <?php //echo $this->element('Product.paginator', ['updateDivId'=>'updateProductsIndex']); ?>
                <div id="updateProductsIndex" class="table-responsive">

                    <?php echo $this->element('AssignProduct.all_products'); ?>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <?php if (!empty($products)) {
                            //echo $this->element('Product.pagination', ['paginationText'=>__d('product','Number of Products')]);
                            echo $this->element('pagination', ['selected' => true]);
                        } ?>
                    </div>
                </div>
            </div>
        </div>
        <!-- End: life time stats -->
    </div>
</div>


