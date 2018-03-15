<?php
class Kasterweb_FlagProducts_Block_Adminhtml_Flags_Edit_Tabs extends Mage_Adminhtml_Block_Widget_Tabs
{
		public function __construct()
		{
				parent::__construct();
				$this->setId("flag_tabs");
				$this->setDestElementId("edit_form");
				$this->setTitle(Mage::helper("kasterweb_flagproducts")->__("Item Information"));
		}
		protected function _beforeToHtml()
		{
				$this->addTab("form_section", array(
				"label" => Mage::helper("kasterweb_flagproducts")->__("Item Information"),
				"title" => Mage::helper("kasterweb_flagproducts")->__("Item Information"),
				"content" => $this->getLayout()->createBlock("kasterweb_flagproducts/adminhtml_flags_edit_tab_form")->toHtml(),
				));
				return parent::_beforeToHtml();
		}

}
