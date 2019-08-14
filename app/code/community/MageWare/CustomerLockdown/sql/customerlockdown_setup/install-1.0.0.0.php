<?php

$installer = $this;

$installer->startSetup();

$installer->getConnection()
    ->addColumn($installer->getTable('customer/entity'), 'is_suspended', array(
        'type'     => Varien_Db_Ddl_Table::TYPE_SMALLINT,
        'unsigned' => true,
        'nullable' => false,
        'default'  => '0',
        'comment'  => 'Is Suspended'
    ));

$installer->addAttribute('customer', 'is_suspended', array(
    'type'      => 'static',
    'label'     => 'Is Suspended',
    'input'     => 'select',
    'source'    => 'eav/entity_attribute_source_boolean',
    'backend'   => 'customer/attribute_backend_data_boolean',
    'position'  => 25,
    'required'  => false
));

$attribute = Mage::getSingleton('eav/config')
    ->getAttribute('customer', 'is_suspended');

$attribute->setData('used_in_forms', array(
    'adminhtml_customer'
));

$attribute->save();

$installer->endSetup();
