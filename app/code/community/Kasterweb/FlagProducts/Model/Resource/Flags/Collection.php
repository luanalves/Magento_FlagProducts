<?php

class Kasterweb_FlagProducts_Model_Resource_Flags_Collection extends Mage_Core_Model_Resource_Db_Collection_Abstract
{
    protected function _construct()
    {
        $this->_init('kasterweb_flagproducts/flags');
    }
}
