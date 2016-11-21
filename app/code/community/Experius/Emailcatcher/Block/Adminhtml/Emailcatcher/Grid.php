<?php
/**
 * Experius/Emailcatcher Emailcatcher Grid
 *
 * Emailcatcher backend grid
 * This file is included in Experius/EmailCatcher is licensed under OSL 3.0
 *
 * @category         Experius
 * @package          Experius_Emailcatcher
 * @subpackage       Emailcatcher_Grid
 * @copyright        Copyright (c) 2005-2016 Experius. (http://www.experius.nl)
 * @author           Ruben Panis
 * @license          http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 * @version          Release: 1.0.0
 * @since            Class available since module Release 1.0.0
 */
class Experius_Emailcatcher_Block_Adminhtml_Emailcatcher_Grid extends Mage_Adminhtml_Block_Widget_Grid
{
    public function __construct()
    {        
        parent::__construct();
        $this -> setEmptyText(Mage::helper('emailcatcher') -> __('No emails found'));
        $this -> setId('emailcatcherGrid');
        $this -> setDefaultSort('emailcatcher_id');
        $this -> setDefaultDir('ASC');
        $this -> setSaveParametersInSession(true);
    }
    
    /**     
    * Sets the collection for display in the grid
    * @return parent::_prepareCollection()
    */ 
    
    protected function _prepareCollection()
    {
        $collection = Mage::getModel('emailcatcher/emailcatcher') -> getCollection();
        $this -> setCollection($collection);
        return parent::_prepareCollection();
    }
    
    /**     
    * Sets the columns for display in the grid
    * @return parent::_prepareColumns()
    */ 
    protected function _prepareColumns()
    {
        $this -> addColumn('emailcatcher_id', array('header' => Mage::helper('emailcatcher') -> __('Emailcatcher id'), 'width' => 50, 'index' => 'emailcatcher_id', 'sortable' => false, ));

        $this -> addColumn('to', array('header' => Mage::helper('emailcatcher') -> __('To'), 'index' => 'to', 'sortable' => false, ));

        $this -> addColumn('from', array('header' => Mage::helper('emailcatcher') -> __('From'), 'index' => 'from', 'sortable' => false, ));

        $this -> addColumn('subject', array('header' => Mage::helper('emailcatcher') -> __('Subject'), 'index' => 'subject', 'sortable' => false, ));

        $this -> addColumn('in_devmode', array('header' => Mage::helper('emailcatcher') -> __('In dev mode'), 'index' => 'in_devmode', 'sortable' => false, 'type' => 'checkbox', 'values' => array('1', '2'), ));

        $this -> addColumn('created_at', array('header' => Mage::helper('emailcatcher') -> __('Created at'), 'index' => 'created_at', 'sortable' => false, ));

        $this -> addColumn('action', array('header' => Mage::helper('emailcatcher') -> __('View email'), 'index' => 'emailcatcher_id', 'sortable' => false, 'filter' => false, 'width' => '100px', 'renderer' => 'emailcatcher/adminhtml_emailcatcher_grid_renderer_action'));

        return parent::_prepareColumns();
    }
    
    /**     
    * Sets the id field mass actions, adds the mass delete action
    * @return $this
    */ 
    protected function _prepareMassaction()
    {
        $this -> setMassactionIdField('emailcatcher_id');
        $this -> getMassactionBlock() -> setFormFieldName('emails');

        $this -> getMassactionBlock() -> addItem('delete', array('label' => Mage::helper('emailcatcher') -> __('Delete'), 'url' => $this -> getUrl('*/*/massDelete'), 'confirm' => Mage::helper('emailcatcher') -> __('Are you sure?')));

        return $this;
    }

}
