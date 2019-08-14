<?php

$installer = $this;

$installer->startSetup();

$installer->updateAttribute('customer', 'is_suspended', 'backend_model', 'customerlockdown/attribute_backend_data_boolean');

$installer->endSetup();
