<?php
class Experius_Emailcatcher_Model_Mysql4_Emailcatcher extends Mage_Core_Model_Mysql4_Abstract
{
    protected function _construct()
    {
        $this->_init("emailcatcher/emailcatcher", "emailcatcher_id");
    }
}