<?php
/**
 * Created by PhpStorm.
 * User: Frank
 * Date: 12.03.2016
 * Time: 23:25
 */

class db extends FDO {
    private $_host = "localhost";
    private $_data = "schach";
    private $_user = "schach";
    private $_pass = "Regenbogen";

    public function __construct()
    {
        return parent::__construct('mysql:host='.$this->_host.';dbname'.$this->_data,$this->_user,$this->_pass);
    }
}