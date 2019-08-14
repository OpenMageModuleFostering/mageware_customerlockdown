<?php

class MageWare_CustomerLockdown_Model_Attribute_Backend_Data_Boolean
    extends Mage_Eav_Model_Entity_Attribute_Backend_Abstract
{
    public function beforeSave($customer)
    {
        $attributeName = $this->getAttribute()->getName();
        $inputValue = $customer->getData($attributeName);
        $sanitizedValue = (!empty($inputValue)) ? '1' : '0';
        $customer->setData($attributeName, $sanitizedValue);

        return $this;
    }
}
