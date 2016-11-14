<?php  
/**     
* Experius/Emailcatcher Backend Grid Container Block   
*     
* Grid container block for the Emailcatcher backend
* This file is included in Experius/EmailCatcher is licensed under OSL 3.0
*     
* @category         Experius     
* @package          Experius_Emailcatcher     
* @subpackage       Block_Adminhtml_Emailcatcherbackend    
* @copyright        Copyright (c) 2005-2016 Experius. (http://www.experius.nl)     
* @author           Ruben Panis
* @license          http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)     
* @version          Release: 1.0.0    
* @since            Class available since module Release 1.0.0     
*/ 
class Experius_Emailcatcher_Block_Adminhtml_Emailcatcherbackend extends Mage_Adminhtml_Block_Widget_Grid_Container {
	
	public function __construct() {
		$this->_controller = 'adminhtml_emailcatcherbackend';
		$this->_blockGroup = 'emailcatcher';
		$this->_headerText = Mage::helper('emailcatcher')->__('Experius Emailcatcher');
		parent::__construct();
	}
}