<?php


class Experius_Emailcatcher_Block_Adminhtml_Emailcatcherbackend_Grid_Renderer_Action extends Mage_Adminhtml_Block_Widget_Grid_Column_Renderer_Action
{
    public function render(Varien_Object $row)
    {
        $actions = array();
        $actions[] = array(
            'url'		=>  $this->getUrl('*/*/preview', array('id'=>$row->getId())),
            'popup'     =>  true,
            'caption'	=>	$this->__('Email body')
        );

        $this->getColumn()->setActions($actions);

        return parent::render($row);
    }

    protected function _getEscapedValue($value)
    {
        return addcslashes(htmlspecialchars($value),'\\\'');
    }

    protected function _actionsToHtml(array $actions)
    {
        $html = array();
        $attributesObject = new Varien_Object();
        foreach ($actions as $action) {
            $attributesObject->setData($action['@']);
            $html[] = '<a ' . $attributesObject->serialize() . '>' . $action['#'] . '</a>';
        }
        return implode(' <span class="separator">&nbsp;|&nbsp;</span> ', $html);
    }
}
