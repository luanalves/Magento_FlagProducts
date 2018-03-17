<?php

class Kasterweb_FlagProducts_Helper_Data extends Mage_Core_Helper_Abstract
{

    /**
     * @param $ids string|array
     * @return bool|Mage_Core_Model_Abstract
     */
    public function getPathFlagById($ids)
    {
        $return = false;
        if (is_string($ids)) {
            $ids = explode(',', $ids);
        }
        if (is_array($ids)) {
            foreach ($ids as $id) {
                $return[] = $this->__loadFlags($id);
            }
        }
        if (is_int($ids)) {
            $return[] = $this->__loadFlags($id);
        }

        return $return;
    }

    /**
     * @param $flagModel Kasterweb_FlagProducts_Model_Flags
     * @param $productModel Mage_Catalog_Product
     * @return string
     */
    public function loadImageFlag($flagModel, $productModel, $top = null)
    {
        $styletop='';
        if ($top != null) {
            $styletop="style='margin-top: $top%;'";
        }
        return "<img src='" . Mage::getBaseUrl('media') . $flagModel->getPathFlag() . "' alt='" . $productModel->getName() . "' title='" . $productModel->getName() . "' class='flag' $styletop />";
    }

    /**
     * @param $id int
     * @return Model Kasterweb_FlagProducts_Model_Flags | bool false
     */
    protected function __loadFlags($id)
    {
        $model = Mage::getModel('kasterweb_flagproducts/flags')->load($id);
        if ($model) {
            return $model;
        }
        return false;
    }
}
	 