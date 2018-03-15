<?php

$installer = $this;
$installer->startSetup();

$tableName = $installer->getTable('kasterweb_flagproducts/flags');

if ($installer->getConnection()->isTableExists($tableName)) {
    $installer->getConnection()->dropTable($tableName);
}

$table = $installer->getConnection()
    ->newTable($tableName)
    ->addColumn('entity_id', Varien_Db_Ddl_Table::TYPE_INTEGER, null, array(
        'unsigned' => true,
        'nullable' => false,
        'primary' => true,
        'identity' => true,
    ), 'ID')
    ->addColumn('name', Varien_Db_Ddl_Table::TYPE_TEXT, 50, array(
        'nullable' => false,
    ), 'name')
    ->addColumn('path_flag', Varien_Db_Ddl_Table::TYPE_TEXT, 255, array(
        'nullable' => false,
    ), 'Path Flag')
    ->addColumn('created_at', Varien_Db_Ddl_Table::TYPE_TIMESTAMP, null, array(
        'nullable' => true,
    ), 'CreatedAt')
    ->addColumn('updated_at', Varien_Db_Ddl_Table::TYPE_TIMESTAMP, null, array(
        'nullable' => true,
    ), 'UpdatedAt');
$installer->getConnection()->createTable($table);
$installer->endSetup();
