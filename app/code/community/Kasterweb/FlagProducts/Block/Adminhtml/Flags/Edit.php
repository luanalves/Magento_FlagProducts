<?php

class Kasterweb_FlagProducts_Block_Adminhtml_Flags_Edit extends Mage_Adminhtml_Block_Widget_Form_Container
{
    public function __construct()
    {

        parent::__construct();
        $this->_objectId = "entity_id";
        $this->_blockGroup = "kasterweb_flagproducts";
        $this->_controller = "adminhtml_flags";
        $this->_updateButton("save", "label", Mage::helper("kasterweb_flagproducts")->__("Save Item"));
        $this->_updateButton("delete", "label", Mage::helper("kasterweb_flagproducts")->__("Delete Item"));

        $this->_addButton("saveandcontinue", array(
            "label" => Mage::helper("kasterweb_flagproducts")->__("Save And Continue Edit"),
            "onclick" => "saveAndContinueEdit()",
            "class" => "save",
        ), -100);

        $this->_formScripts[] = "
            function saveAndContinueEdit(){
                editForm.submit($('edit_form').action+'back/edit/');
            }
        ";
    }

    public function getHeaderText()
    {
        if (Mage::registry("flag_data") && Mage::registry("flag_data")->getId()) {
            return Mage::helper("kasterweb_flagproducts")->__("Edit Item '%s'", $this->htmlEscape(Mage::registry("flag_data")->getName()));
        } else {
            return Mage::helper("kasterweb_flagproducts")->__("Add Item");
        }
    }
}