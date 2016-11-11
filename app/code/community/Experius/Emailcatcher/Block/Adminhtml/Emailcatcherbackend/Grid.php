<?php
class Experius_Emailcatcher_Block_Adminhtml_Emailcatcherbackend_Grid extends Mage_Adminhtml_Block_Widget_Grid
{
    public function __construct(){
        parent::__construct();
		$this->setEmptyText('No emails found');
        $this->setId('emailcatcherbackendGrid');
        $this->setDefaultSort('emailcatcher_id');
        $this->setDefaultDir('ASC');
        $this->setSaveParametersInSession(true);
    }

    protected function _prepareCollection(){
        $collection = Mage::getModel('emailcatcher/emailcatcher')->getCollection();
        $this->setCollection($collection);
        return parent::_prepareCollection();
    }

    protected function _prepareColumns()
    {
        $this->addColumn('emailcatcher_id', array(
            'header'   => 'emailcatcher_id',
            'width'    => 50,
            'index'    => 'emailcatcher_id',
            'sortable' => false,
        ));

        $this->addColumn('to', array(
            'header'   => 'to',
            'index'    => 'to',
            'sortable' => false,
        ));
		
		$this->addColumn('from', array(
            'header'   => 'from',
            'index'    => 'from',
            'sortable' => false,
        ));
		
		$this->addColumn('subject', array(
            'header'   => 'subject',
            'index'    => 'subject',
            'sortable' => false,
        ));	
		
		$this->addColumn('in_devmode', array(
            'header'   => 'in_devmode',
            'index'    => 'in_devmode',
            'sortable' => false,
            'type'     => 'checkbox',
            'values'   => array('1','2'),     
        ));		
		
		$this->addColumn('created_at', array(
            'header'   => 'created_at',
            'index'    => 'created_at',
            'sortable' => false,
        ));
		
		$this->addColumn('action', array(
            'header'	=> 'View email',
            'index'		=> 'emailcatcher_id',
            'sortable'  => false,
            'filter' 	=> false,
            'width'		=> '100px',
            'renderer'  => 'emailcatcher/adminhtml_emailcatcherbackend_grid_renderer_action'
    	));

        return parent::_prepareColumns();
    }

    protected function _prepareMassaction(){
    }
}