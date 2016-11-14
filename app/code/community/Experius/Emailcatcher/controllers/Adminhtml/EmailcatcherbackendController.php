<?php
class Experius_Emailcatcher_Adminhtml_EmailcatcherbackendController extends Mage_Adminhtml_Controller_Action
{
	public function indexAction()
    {     	
       $this->loadLayout();
	   $this->_title($this->__("Email Catcher"));
	   $this->renderLayout();	   
    }
	
	/**
     * Preview action
     */
    public function previewAction()
    {
        $this->loadLayout('emailcatcher_systemPreview');
        $this->renderLayout();
    }
}