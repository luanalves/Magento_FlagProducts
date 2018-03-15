<?php

class Kasterweb_FlagProducts_Block_Adminhtml_Flags_Edit_Tab_Form extends Mage_Adminhtml_Block_Widget_Form
{
    protected function _prepareForm()
    {

        $form = new Varien_Data_Form();
        $this->setForm($form);
        $fieldset = $form->addFieldset("kasterweb_flagproducts_form", array("legend" => Mage::helper("kasterweb_flagproducts")->__("Item information")));


        $fieldset->addField("name", "text", array(
            "label" => Mage::helper("kasterweb_flagproducts")->__("Name"),
            "name" => "name",
        ));

        $fieldset->addType('image', 'Kasterweb_FlagProducts_Varien_Data_Form_Element_Thumbnail');

        $fieldset->addField('path_flag',
            'image', array(
                'label' => Mage::helper('kasterweb_flagproducts')->__('Upload Image'),
                'required' => false,
                'name' => 'path_flag',
            ));


        if (Mage::getSingleton("adminhtml/session")->getFlagData()) {
            $form->setValues(Mage::getSingleton("adminhtml/session")->getFlagData());
            Mage::getSingleton("adminhtml/session")->setFlagData(null);
        } elseif (Mage::registry("flag_data")) {
            $form->setValues(Mage::registry("flag_data")->getData());
        }
        return parent::_prepareForm();
    }
}
