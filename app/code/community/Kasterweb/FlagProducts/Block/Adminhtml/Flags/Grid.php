<?php

class Kasterweb_FlagProducts_Block_Adminhtml_Flags_Grid extends Mage_Adminhtml_Block_Widget_Grid
{

    public function __construct()
    {
        parent::__construct();
        $this->setId("flagGrid");
        $this->setDefaultSort("entity_id");
        $this->setDefaultDir("DESC");
        $this->setSaveParametersInSession(true);
    }

    protected function _prepareCollection()
    {
        $collection = Mage::getModel("kasterweb_flagproducts/flags")->getCollection();
        $this->setCollection($collection);
        return parent::_prepareCollection();
    }

    protected function _prepareColumns()
    {
        $this->addColumn("entity_id", array(
            "header" => Mage::helper("kasterweb_flagproducts")->__("ID"),
            "align" => "right",
            "width" => "50px",
            "type" => "number",
            "index" => "entity_id",
        ));

        $this->addColumn("name", array(
            "header" => Mage::helper("kasterweb_flagproducts")->__("Name"),
            "index" => "name",
        ));
        $this->addColumn('created_at', array(
            'header' => Mage::helper('kasterweb_flagproducts')->__('Created At'),
            'index' => 'created_at',
            'type' => 'datetime',
        ));
        $this->addColumn('updated_at', array(
            'header' => Mage::helper('kasterweb_flagproducts')->__('Updated At'),
            'index' => 'updated_at',
            'type' => 'datetime',
        ));
//        $this->addExportType('*/*/exportActionsCsv', 'CSV');
//        $this->addExportType('*/*/exportActionsExcel', 'Excel XML');

        return parent::_prepareColumns();
    }

    public function getRowUrl($row)
    {
        return $this->getUrl("*/*/edit", array("id" => $row->getId()));
    }


    protected function _prepareMassaction()
    {
        $this->setMassactionIdField('entity_id');
        $this->getMassactionBlock()->setFormFieldName('entity_ids');
        $this->getMassactionBlock()->setUseSelectAll(true);
        $this->getMassactionBlock()->addItem('remove_flag', array(
            'label' => Mage::helper('kasterweb_flagproducts')->__('Remove Flag'),
            'url' => $this->getUrl('*/adminhtml_flags/massRemove'),
            'confirm' => Mage::helper('kasterweb_flagproducts')->__('Are you sure?')
        ));
        return $this;
    }


}