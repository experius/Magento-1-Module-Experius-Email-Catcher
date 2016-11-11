<?php  

class Experius_Emailcatcher_Block_Adminhtml_Emailcatcherbackend extends Mage_Adminhtml_Block_Widget_Grid_Container {
	
	public function __construct() {
		$this->_controller = 'adminhtml_emailcatcherbackend';
		$this->_blockGroup = 'emailcatcher';
		$this->_headerText = 'Experius Emailcatcher';
		parent::__construct();
	}
}