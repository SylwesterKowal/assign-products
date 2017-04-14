<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Product'), ['action' => 'edit', $product->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Product'), ['action' => 'delete', $product->id], ['confirm' => __('Are you sure you want to delete # {0}?', $product->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Products'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Product'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="products view large-9 medium-8 columns content">
    <h3><?= h($product->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Sku') ?></th>
            <td><?= h($product->sku) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($product->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Short Name') ?></th>
            <td><?= h($product->short_name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Short Description') ?></th>
            <td><?= h($product->short_description) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Product Category Id') ?></th>
            <td><?= h($product->product_category_id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Notes') ?></th>
            <td><?= h($product->notes) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Pn') ?></th>
            <td><?= h($product->pn) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Ean') ?></th>
            <td><?= h($product->ean) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Pkwiu') ?></th>
            <td><?= h($product->pkwiu) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Isbn') ?></th>
            <td><?= h($product->isbn) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Bar Code') ?></th>
            <td><?= h($product->bar_code) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Image Gallery') ?></th>
            <td><?= h($product->image_gallery) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Meta Title') ?></th>
            <td><?= h($product->meta_title) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($product->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Unit') ?></th>
            <td><?= $this->Number->format($product->unit) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified By') ?></th>
            <td><?= $this->Number->format($product->modified_by) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created By') ?></th>
            <td><?= $this->Number->format($product->created_by) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Manufacturer Id') ?></th>
            <td><?= $this->Number->format($product->manufacturer_id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Quantity In Package') ?></th>
            <td><?= $this->Number->format($product->quantity_in_package) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Product Type') ?></th>
            <td><?= $this->Number->format($product->product_type) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Product Tax') ?></th>
            <td><?= $this->Number->format($product->product_tax) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Weight') ?></th>
            <td><?= $this->Number->format($product->weight) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Shipping Type Id') ?></th>
            <td><?= $this->Number->format($product->shipping_type_id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Width') ?></th>
            <td><?= $this->Number->format($product->width) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Height') ?></th>
            <td><?= $this->Number->format($product->height) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Thickness') ?></th>
            <td><?= $this->Number->format($product->thickness) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Product Detail Set Id') ?></th>
            <td><?= $this->Number->format($product->product_detail_set_id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Qty On Palette') ?></th>
            <td><?= $this->Number->format($product->qty_on_palette) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Serie Id') ?></th>
            <td><?= $this->Number->format($product->serie_id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($product->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($product->modified) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Active') ?></th>
            <td><?= $product->active ? __('Yes') : __('No'); ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Description') ?></h4>
        <?= $this->Text->autoParagraph(h($product->description)); ?>
    </div>
    <div class="row">
        <h4><?= __('Meta Description') ?></h4>
        <?= $this->Text->autoParagraph(h($product->meta_description)); ?>
    </div>
    <div class="row">
        <h4><?= __('Meta Keywords') ?></h4>
        <?= $this->Text->autoParagraph(h($product->meta_keywords)); ?>
    </div>
</div>
