<?php

class Kasterweb_FlagProducts_Model_Attribute_Source_Flags extends Mage_Eav_Model_Entity_Attribute_Source_Table
{

    public function getAllOptions($withEmpty = true)
    {
        if (!$this->_options) {
            $options = Mage::getModel('kasterweb_flagproducts/flags')->getCollection();

            $this->_options = $options;

            $options = array();
            if(!empty($this->_options)) {
                foreach ($this->_options as $value) {
                    $options[] = array('value' => $value->getId(), 'label' => $value->getName());
                }
            }
        }

        if ($withEmpty) {
            array_unshift($options, array('label' => Mage::helper("kasterweb_flagproducts")->__('Select Flag'), 'value' => ''));
        }

        return $options;
    }
}
