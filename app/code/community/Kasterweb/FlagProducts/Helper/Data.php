<?php

class Kasterweb_FlagProducts_Helper_Data extends Mage_Core_Helper_Abstract
{

    public function getPathFlagById($id)
    {
        $model = Mage::getModel('kasterweb_flagproducts/flags')->load($id);
        if ($model) {
            return $model;
        }
        return false;
    }
}
	 