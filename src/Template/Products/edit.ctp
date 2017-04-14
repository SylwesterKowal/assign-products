<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $product->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $product->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Products'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="products form large-9 medium-8 columns content">
    <?= $this->Form->create($product) ?>
    <fieldset>
        <legend><?= __('Edit Product') ?></legend>
        <?php
            echo $this->Form->control('sku');
            echo $this->Form->control('name');
            echo $this->Form->control('short_name');
            echo $this->Form->control('description');
            echo $this->Form->control('short_description');
            echo $this->Form->control('unit');
            echo $this->Form->control('modified_by');
            echo $this->Form->control('product_category_id');
            echo $this->Form->control('active');
            echo $this->Form->control('created_by');
            echo $this->Form->control('notes');
            echo $this->Form->control('pn');
            echo $this->Form->control('ean');
            echo $this->Form->control('manufacturer_id');
            echo $this->Form->control('pkwiu');
            echo $this->Form->control('isbn');
            echo $this->Form->control('bar_code');
            echo $this->Form->control('quantity_in_package');
            echo $this->Form->control('image_gallery');
            echo $this->Form->control('product_type');
            echo $this->Form->control('product_tax');
            echo $this->Form->control('meta_title');
            echo $this->Form->control('meta_description');
            echo $this->Form->control('meta_keywords');
            echo $this->Form->control('weight');
            echo $this->Form->control('shipping_type_id');
            echo $this->Form->control('width');
            echo $this->Form->control('height');
            echo $this->Form->control('thickness');
            echo $this->Form->control('product_detail_set_id');
            echo $this->Form->control('qty_on_palette');
            echo $this->Form->control('serie_id');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
