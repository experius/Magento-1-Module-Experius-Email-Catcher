<?php
/**
 * Experius/Emailcatcher Emailcatcher_Preview
 *
 * Emailcatcher backend preview block
 * This file is included in Experius/EmailCatcher is licensed under OSL 3.0
 *
 * @category         Experius
 * @package          Experius_Emailcatcher
 * @subpackage       Emailcatcher_Preview
 * @copyright        Copyright (c) 2005-2016 Experius. (http://www.experius.nl)
 * @author           Ruben Panis
 * @license          http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 * @version          Release: 1.0.0
 * @since            Class available since module Release 1.0.0
 */
class Experius_Emailcatcher_Block_Adminhtml_Emailcatcher_Preview extends Mage_Adminhtml_Block_Widget
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
