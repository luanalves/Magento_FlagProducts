<?php


class Kasterweb_FlagProducts_Block_Adminhtml_Flags extends Mage_Adminhtml_Block_Widget_Grid_Container{

	public function __construct()
	{

	$this->_controller = "adminhtml_flags";
	$this->_blockGroup = "kasterweb_flagproducts";
	$this->_headerText = Mage::helper("kasterweb_flagproducts")->__("Flag Manager");
	$this->_addButtonLabel = Mage::helper("kasterweb_flagproducts")->__("Add New Item");
	parent::__construct();
	
	}

}