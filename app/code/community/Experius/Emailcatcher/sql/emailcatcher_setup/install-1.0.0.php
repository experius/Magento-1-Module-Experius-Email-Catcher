<?php
/**     
* Experius/Emailcatcher SQL Install script   
*     
* Emailcatcher SQL Install script   
* This file is included in Experius/EmailCatcher is licensed under OSL 3.0
*     
* @category         Experius     
* @package          Experius_Emailcatcher     
* @subpackage       Setup_Install    
* @copyright        Copyright (c) 2005-2016 Experius. (http://www.experius.nl)  
* @author           Ruben Panis   
* @license          http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)     
* @version          Release: 1.0.0    
* @since            Class available since module Release 1.0.0     
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
		
        ->setComment('Experius Email Catcher Table');
    $installer->getConnection()->createTable($table);
}

$installer->endSetup();