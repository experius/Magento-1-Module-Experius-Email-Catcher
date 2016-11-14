<?php
/**     
* Experius/Emailcatcher Mysql4 Model Emailcatcher collection   
*     
* Mysql4 Model Emailcatcher collection
* This file is included in Experius/EmailCatcher is licensed under OSL 3.0
*     
* @category         Experius     
* @package          Experius_Emailcatcher     
* @subpackage       Model_Mysql4_Emailcatcher    
* @copyright        Copyright (c) 2005-2016 Experius. (http://www.experius.nl)     
* @author           Ruben Panis
* @license          http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)     
* @version          Release: 1.0.0    
* @since            Class available since module Release 1.0.0     
*/ 
class Experius_Emailcatcher_Model_Mysql4_Emailcatcher_Collection extends Mage_Core_Model_Mysql4_Collection_Abstract {
    public function _construct() {
        $this -> _init('emailcatcher/emailcatcher');
    }
}