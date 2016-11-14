<?php
/**
 * Experius/Emailcatcher Backend Controller
 *
 * Controller for the backend of the Experius Emailcatcher
 * This file is included in Experius/EmailCatcher is licensed under OSL 3.0
 *
 * @category         Experius
 * @package          Experius_Emailcatcher
 * @subpackage       EmailcatcherbackendController
 * @copyright        Copyright (c) 2005-2016 Experius. (http://www.experius.nl)
 * @author           Ruben Panis
 * @license          http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 * @version          Release: 1.0.0
 * @since            Class available since module Release 1.0.0
 */
class Experius_Emailcatcher_Adminhtml_EmailcatcherbackendController extends Mage_Adminhtml_Controller_Action
{
    public function indexAction()
    {
        $this -> loadLayout();
        $this -> _title($this -> __('Email Catcher'));
        $this -> renderLayout();
    }

    /**
     * Preview the mail body in a popup
     */
    public function previewAction()
    {
        $this -> loadLayout('emailcatcher_systemPreview');
        $this -> renderLayout();
    }

    /**
     * Mass action for deleting catched mail
     */
    public function massDeleteAction()
    {
        $emailcatcherIds = $this -> getRequest() -> getParam('emails');
        if (!is_array($emailcatcherIds)) {
            Mage::getSingleton('adminhtml/session') -> addError(Mage::helper('emailcatcher') -> __('Please select one or more emails.'));
        } else
        {
            try
            {
                $emailcatch = Mage::getModel('emailcatcher/emailcatcher');
                foreach ($emailcatcherIds as $emailcatcherId)
                {
                    $emailcatch -> load($emailcatcherId) -> delete();
                }
                Mage::getSingleton('adminhtml/session') -> addSuccess(Mage::helper('adminhtml') -> __('Total of %d record(s) were deleted.', count($emailcatcherIds)));
            } catch(exception $e)
            {
                Mage::getSingleton('adminhtml/session') -> addError($e -> getMessage());
            }
        }

        $this -> _redirect('*/*/index');
    }

}
