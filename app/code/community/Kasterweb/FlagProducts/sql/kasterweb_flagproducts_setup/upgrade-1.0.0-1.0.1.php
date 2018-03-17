<?php

$installer = $this;
$installer->startSetup();

$setup = new Mage_Eav_Model_Entity_Setup('core_setup');
$setup->removeAttribute(Mage_Catalog_Model_Product::ENTITY, Kasterweb_FlagProducts_Model_Config::ATTRIBUTE_CODE);

$setup->addAttribute(Mage_Catalog_Model_Product::ENTITY, Kasterweb_FlagProducts_Model_Config::ATTRIBUTE_CODE, array(
    'label' => "Flag",
    'type' => 'text',
    'input' => 'multiselect',
    'source' => 'kasterweb_flagproducts/attribute_source_flags',
    'group' => 'Kasterweb',
    'visible' => true,
    'required' => false,
    'global' => Mage_Catalog_Model_Resource_Eav_Attribute::SCOPE_GLOBAL,
    'backend'    => 'eav/entity_attribute_backend_array'
));

$installer->endSetup();