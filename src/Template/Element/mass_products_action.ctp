<?php



if (isset($this->request->params['paging'])) {
    echo $this->Form->create(null, ['url' => ['controller' => 'ProductMassActions', 'action' => 'save', 'plugin' => 'Product']]);

    echo "<div class='pagination groupActionSelect pull-left margin-right-10'>";
    echo $this->Form->hidden('productIds', ['id' => 'selectedProductIds']);

    $options[''] = __d('product', '- mass product actions -');
    if ($this->UserAuth->HP('ProductMassActions', 'setMassActive', 'Product')) $options['1'] = __d('product', 'Active');
    if ($this->UserAuth->HP('ProductMassActions', 'setMassInactive', 'Product')) $options['2'] = __d('product', 'Deactive');
    if ($this->UserAuth->HP('ProductMassActions', 'setMassAssignToFirm', 'Product')) $options['3'] = __d('product', 'Assign To Firm');
    if ($this->UserAuth->HP('ProductMassActions', 'setMassRemoveToFirm', 'Product')) $options['4'] = __d('product', 'Remove From Firm');
    if ($this->UserAuth->HP('ProductMassActions', 'deleteMassProducts', 'Product')) $options['5'] = __d('product', 'Delete');
    if ($this->UserAuth->HP('ProductMassActions', 'setShippingType', 'Product')) $options['6'] = __d('product', 'Assign Shipping Type');

    echo $this->Form->input('massProductAction', [
        'label' => false,
        'type' => 'select',
        'options' => $options,
        'default' => null,
        'autocomplete' => 'off',
        'id' => 'massProductActionSelect',
        'class' => 'form-control input-sm ',
        'style' => 'max-width: 200px'
    ]);
    echo $this->Form->input('user_firm_id', [
        'class' => 'fomr-control input-sm display-none',
        'label' => false,
        'div' => false,
        'id' => 'userFirmToAssignOrRemove',
        'style' => 'max-width: 200px'
    ]);
    echo $this->Form->input('shipping_type_id', [
        'class' => 'fomr-control input-sm display-none',
        'label' => false,
        'div' => false,
        'id' => 'ShippingTypeToAssign',
        'style' => 'max-width: 200px'
    ]);

    echo "</div>";

    echo '<span class="pagination input-group-btn pull-left "><button id="massProductActionButton" disabled class="btn blue" type="submit">' . __d('product', 'Follow the action') . '</button></span>';
    echo $this->Form->end();
}
?>