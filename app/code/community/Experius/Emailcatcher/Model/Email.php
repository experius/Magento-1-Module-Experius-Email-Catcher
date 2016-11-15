<?php
/**
 * Experius/Emailcatcher Model Email
 *
 * Extension of the standard Zend mail email model
 * Saves the email to the emailcatcher model
 * This file is included in Experius/EmailCatcher is licensed under OSL 3.0
 *
 * @category         Experius
 * @package          Experius_Emailcatcher
 * @subpackage       Model_Email
 * @copyright        Copyright (c) 2005-2016 Experius. (http://www.experius.nl)
 * @author           Ruben Panis
 * @license          http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 * @version          Release: 1.0.0
 * @since            Class available since module Release 1.0.0
 */
class Experius_Emailcatcher_Model_Email extends Mage_Core_Model_Email
{

    /**
     * If parent method has sent the email, catch and save it.
     * Before saving, this checks if the emailcatcher is enabled and mail is sent or mail is disabled in dev and catch dev mail option is checked
     */
    public function send()
    {
        $isMailSent = true;

        try
        {
            parent::send();
        } catch (Exception $e)
        {
            $isMailSent = false;
        }

        //store if emailcatcher is enabled and mail is sent or mail is disabled in dev and dev mail option is checked
        if (Mage::getStoreConfigFlag('experius_emailcatcher/catcher_config/is_enabled') && 
            ($isMailSent || (Mage::getStoreConfigFlag('system/smtp/disable') 
            && Mage::getStoreConfigFlag('experius_emailcatcher/catcher_config/devmode')))) {

            $emailcatch = Mage::getModel('emailcatcher/emailcatcher');

            $emailcatch -> setTo(implode(',', $this -> getToEmail()));
            $emailcatch -> setFrom($this -> getSenderEmail());
            $emailcatch -> setSubject($this -> getSubject());
            $emailcatch -> setBody($this -> getBody());
            $emailcatch -> setIn_devmode(Mage::getStoreConfigFlag('system/smtp/disable'));
            $emailcatch -> setCreated_at(Mage::getModel('core/date') -> date('Y-m-d H:i:s'));

            $emailcatch -> save();
        }
    }

}
