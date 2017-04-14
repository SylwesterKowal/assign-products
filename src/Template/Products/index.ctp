<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Product'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="products index large-9 medium-8 columns content">
    <h3><?= __('Products') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('sku') ?></th>
                <th scope="col"><?= $this->Paginator->sort('name') ?></th>
                <th scope="col"><?= $this->Paginator->sort('short_name') ?></th>
                <th scope="col"><?= $this->Paginator->sort('short_description') ?></th>
                <th scope="col"><?= $this->Paginator->sort('unit') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified_by') ?></th>
                <th scope="col"><?= $this->Paginator->sort('product_category_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('active') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created_by') ?></th>
                <th scope="col"><?= $this->Paginator->sort('notes') ?></th>
                <th scope="col"><?= $this->Paginator->sort('pn') ?></th>
                <th scope="col"><?= $this->Paginator->sort('ean') ?></th>
                <th scope="col"><?= $this->Paginator->sort('manufacturer_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('pkwiu') ?></th>
                <th scope="col"><?= $this->Paginator->sort('isbn') ?></th>
                <th scope="col"><?= $this->Paginator->sort('bar_code') ?></th>
                <th scope="col"><?= $this->Paginator->sort('quantity_in_package') ?></th>
                <th scope="col"><?= $this->Paginator->sort('image_gallery') ?></th>
                <th scope="col"><?= $this->Paginator->sort('product_type') ?></th>
                <th scope="col"><?= $this->Paginator->sort('product_tax') ?></th>
                <th scope="col"><?= $this->Paginator->sort('meta_title') ?></th>
                <th scope="col"><?= $this->Paginator->sort('weight') ?></th>
                <th scope="col"><?= $this->Paginator->sort('shipping_type_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('width') ?></th>
                <th scope="col"><?= $this->Paginator->sort('height') ?></th>
                <th scope="col"><?= $this->Paginator->sort('thickness') ?></th>
                <th scope="col"><?= $this->Paginator->sort('product_detail_set_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('qty_on_palette') ?></th>
                <th scope="col"><?= $this->Paginator->sort('serie_id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($products as $product): ?>
            <tr>
                <td><?= $this->Number->format($product->id) ?></td>
                <td><?= h($product->sku) ?></td>
                <td><?= h($product->name) ?></td>
                <td><?= h($product->short_name) ?></td>
                <td><?= h($product->short_description) ?></td>
                <td><?= $this->Number->format($product->unit) ?></td>
                <td><?= h($product->created) ?></td>
                <td><?= h($product->modified) ?></td>
                <td><?= $this->Number->format($product->modified_by) ?></td>
                <td><?= h($product->product_category_id) ?></td>
                <td><?= h($product->active) ?></td>
                <td><?= $this->Number->format($product->created_by) ?></td>
                <td><?= h($product->notes) ?></td>
                <td><?= h($product->pn) ?></td>
                <td><?= h($product->ean) ?></td>
                <td><?= $this->Number->format($product->manufacturer_id) ?></td>
                <td><?= h($product->pkwiu) ?></td>
                <td><?= h($product->isbn) ?></td>
                <td><?= h($product->bar_code) ?></td>
                <td><?= $this->Number->format($product->quantity_in_package) ?></td>
                <td><?= h($product->image_gallery) ?></td>
                <td><?= $this->Number->format($product->product_type) ?></td>
                <td><?= $this->Number->format($product->product_tax) ?></td>
                <td><?= h($product->meta_title) ?></td>
                <td><?= $this->Number->format($product->weight) ?></td>
                <td><?= $this->Number->format($product->shipping_type_id) ?></td>
                <td><?= $this->Number->format($product->width) ?></td>
                <td><?= $this->Number->format($product->height) ?></td>
                <td><?= $this->Number->format($product->thickness) ?></td>
                <td><?= $this->Number->format($product->product_detail_set_id) ?></td>
                <td><?= $this->Number->format($product->qty_on_palette) ?></td>
                <td><?= $this->Number->format($product->serie_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $product->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $product->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $product->id], ['confirm' => __('Are you sure you want to delete # {0}?', $product->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
    </div>
</div>
