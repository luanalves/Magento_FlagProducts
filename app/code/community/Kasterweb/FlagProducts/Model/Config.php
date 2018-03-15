<?php

class Kasterweb_FlagProducts_Model_Config
{
    const XML_FILE_LOG = 'kasterweb_flagproducts/general/file_log';
    const ATTRIBUTE_CODE = 'kasterweb_flag';

    public function setLog($message)
    {
        $data = array('memory usage' => round(memory_get_usage() / 1048576, 2) . '' . ' MB', 'time' => date('d/m/Y H:m:s'));

        if (is_array($message)) {
            $message = array_merge($data, $message);
        } else {
            $message = array_merge($data, array($message));
        }
        Mage::log(print_r($message, 1), null, $this->_getFileLog(self::XML_FILE_LOG));
    }

    public function setSessionError($log)
    {
        $this->__getSessionLog()->addError($log);
    }

    public function setSessionSuccess($log)
    {
        $this->__getSessionLog()->addSuccess($log);
    }

    protected function _getFileLog($path)
    {
        return Mage::getStoreConfig($path);
    }
}