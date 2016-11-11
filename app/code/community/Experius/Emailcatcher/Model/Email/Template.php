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
 
class Experius_Emailcatcher_Model_Email_Template extends Mage_Core_Model_Email_Template {
	
	public function send($email, $name = null, array $variables = array()) {
		$isMailSent = parent::send();
				
		//store if mail is sent, or dev mail is disabled
		if ($isMailSent || Mage::getStoreConfigFlag('system/smtp/disable')) {
			
			try {
				$emailcatch = Mage::getModel('emailcatcher/emailcatcher');
				
				$emailcatch->setTo(implode(',',$email));
				$emailcatch->setFrom($this->getSenderEmail());
				$emailcatch->setSubject($this->getProcessedTemplateSubject($variables));	
				$emailcatch->setBody($this->getProcessedTemplate($variables, true));
				$emailcatch->setIn_devmode(Mage::getStoreConfigFlag('system/smtp/disable'));	
				$emailcatch->setCreated_at(Mage::getModel('core/date')->date('Y-m-d H:i:s'));
				$emailcatch->setStore_Id(Mage::app()->getStore()->getStoreId());
				
				$emailcatch->save();
			}
			catch(Exception $e) {
				Mage::logException($e);
			}																
		}
				
		return $isMailSent;
				
	}
}
