<?php
$installer = $this;

$installer->startSetup();

$setup = Mage::getResourceModel('catalog/setup', 'catalog_setup');
$setup->updateAttribute(Mage_Catalog_Model_Product::ENTITY, Kasterweb_FlagProducts_Model_Config::ATTRIBUTE_CODE, 'used_in_product_listing', 1);
$setup->updateAttribute(Mage_Catalog_Model_Product::ENTITY, Kasterweb_FlagProducts_Model_Config::ATTRIBUTE_CODE, 'used_for_sort_by', 1);
$setup->updateAttribute(Mage_Catalog_Model_Product::ENTITY, Kasterweb_FlagProducts_Model_Config::ATTRIBUTE_CODE, 'is_visible_on_front', 1);
$setup->updateAttribute(Mage_Catalog_Model_Product::ENTITY, Kasterweb_FlagProducts_Model_Config::ATTRIBUTE_CODE, 'is_visible_on_front', 1);
$setup->updateAttribute(Mage_Catalog_Model_Product::ENTITY, Kasterweb_FlagProducts_Model_Config::ATTRIBUTE_CODE, 'is_html_allowed_on_front', 1);
$setup->updateAttribute(Mage_Catalog_Model_Product::ENTITY, Kasterweb_FlagProducts_Model_Config::ATTRIBUTE_CODE, 'is_configurable', 0);
$setup->updateAttribute(Mage_Catalog_Model_Product::ENTITY, Kasterweb_FlagProducts_Model_Config::ATTRIBUTE_CODE, 'position', 10);
$installer->endSetup();
