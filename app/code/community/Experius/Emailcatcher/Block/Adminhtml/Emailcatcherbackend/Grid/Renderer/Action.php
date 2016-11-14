<?php
/**
 * Experius/Emailcatcher Emailcatcherbackend Grid Renderer Action
 *
 * Emailcatcher backend grid renderer action
 * This file is included in Experius/EmailCatcher is licensed under OSL 3.0
 *
 * @category         Experius
 * @package          Experius_Emailcatcher
 * @subpackage       Emailcatcherbackend_Grid_Renderer_Action
 * @copyright        Copyright (c) 2005-2016 Experius. (http://www.experius.nl)
 * @author           Ruben Panis
 * @license          http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 * @version          Release: 1.0.0
 * @since            Class available since module Release 1.0.0
 */
class Experius_Emailcatcher_Block_Adminhtml_Emailcatcherbackend_Grid_Renderer_Action extends Mage_Adminhtml_Block_Widget_Grid_Column_Renderer_Action
{
    public function render(Varien_Object $row)
    {
        $actions = array();
        $actions[] = array(
            'url'		=>  $this->getUrl('*/*/preview', array('id'=>$row->getId())),
            'popup'     =>  true,
            'caption'	=>	$this->__(Mage::helper('emailcatcher')->__('Email body'))
        );

        $this->getColumn()->setActions($actions);

        return parent::render($row);
    }
}
