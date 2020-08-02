<?php


require_once 'Connection.php';
require_once 'Funcao.php';
class Book {
    private $idcustomer;
    private $idstaff;
    private $idservice;
    private $dtbook;
    private $time;
    
        public function __construct() {
        $this->con = new Connection();
        $this->objFunc = new Funcao();
    }
    // Magic methods set and get
    public function __set($attribute, $value) {
        $this->attribute = $value;
    }

    public function __get($attribute) {
        return $this->attribute;
    }

    
    public function querySelect($data) {
        try {
            
        } catch (PDOExceptionException $ex) {
            return 'error' . $ex->getMessage();
        }
    }
    
    
}
