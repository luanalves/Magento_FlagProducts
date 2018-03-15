<?php

class Kasterweb_FlagProducts_Model_Resource_Flags extends Mage_Core_Model_Resource_Db_Abstract
{
    protected function _construct()
    {
        $this->_init('kasterweb_flagproducts/flags', 'entity_id');
    }
}
