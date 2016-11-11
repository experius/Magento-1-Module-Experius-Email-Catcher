<?php

class Experius_Emailcatcher_Block_Adminhtml_Emailcatcherbackend_Preview extends Mage_Adminhtml_Block_Widget
{
    /**
     * Prepare html output
     *
     * @return string
     */
    protected function _toHtml()
    {		
        $id = (int)$this->getRequest()->getParam('id');
		$email = Mage::getModel('emailcatcher/emailcatcher')->load($id);
		$emailBody = $email->getData('body');
		
		return $emailBody;		
    }
}
