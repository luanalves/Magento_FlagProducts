<?php

class Kasterweb_FlagProducts_Model_Flags extends Mage_Core_Model_Abstract
{
    protected $entityId;

    protected function _construct()
    {
        $this->_init('kasterweb_flagproducts/flags', 'entity_id');
    }

    protected function _beforeSave()
    {
        $date = Mage::getModel('core/date')->gmtDate();

        if ($this->isObjectNew() && !$this->getCreatedAt()) {
            $this->setCreatedAt($date);
        }

        $this->setUpdatedAt($date);
        return parent::_beforeSave();
    }

    protected function _getConfig()
    {
        return Mage::getSingleton('kasterweb_flagproducts/config');
    }
}
