<?php

class MageWare_CustomerLockdown_Model_Observer
{
    public function checkPredispatchLockdown($observer)
    {
        $session = Mage::getSingleton('customer/session');

        if ($session->isLoggedIn()) {
            if ($session->getCustomer()->getIsSuspended()) {
                $session->logout();
            }
        }

        return $this;
    }

    public function checkCustomerLockdown($observer)
    {
        $customer = $observer->getModel();

        if ($customer->getIsSuspended()) {
            throw Mage::exception('Mage_Core', Mage::helper('customerlockdown')->__('Account is suspended.'));
        }

        return $this;
    }
}
