<?php
/**
 * A Magento module named Experius/EmailCatcher
 * Copyright (C) 2016 Ruben Panis
 * 
 * This file included in Experius/EmailCatcher is licensed under OSL 3.0
 * 
 * http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 * Please see LICENSE.txt for the full text of the OSL 3.0 license
 */

$installer = $this;
$installer->startSetup();

/**
 * Create Emailcatcher Table 
 */

$tableName = $installer->getTable('experius_emailcatcher');
// Check if the table already exists
if ($installer->getConnection()->isTableExists($tableName) != true) {
    $table = $installer->getConnection()
        ->newTable($installer->getTable('experius_emailcatcher'))
        ->addColumn('emailcatcher_id', Varien_Db_Ddl_Table::TYPE_INTEGER, null, array(
            'identity'  => true,
            'unsigned'  => true,
            'nullable'  => false,
            'primary'   => true,
        ), 'Emailcatcher Id')
        ->addColumn('to', Varien_Db_Ddl_Table::TYPE_TEXT, null, [], 'to')
		->addColumn('from', Varien_Db_Ddl_Table::TYPE_TEXT, null, [], 'from')
		->addColumn('subject', Varien_Db_Ddl_Table::TYPE_TEXT, null, [], 'subject')
		->addColumn('body', Varien_Db_Ddl_Table::TYPE_TEXT, null, [], 'body')
		->addColumn('in_devmode', Varien_Db_Ddl_Table::TYPE_SMALLINT, null, [], 'in_devmode')				
		->addColumn('created_at', Varien_Db_Ddl_Table::TYPE_DATETIME, null, [], 'created_at')
		
        ->setComment('Experius Mailcatcher Table');
    $installer->getConnection()->createTable($table);
}

$installer->endSetup();