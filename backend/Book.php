<?php

require_once 'Service.php';
require_once 'Connection.php';
require_once 'Funcao.php';
class Book {
    private $idcustomer;
    private $idstaff;
    private $idserv;
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

    
    public function insert($data) {
        
        
        try {
            $this->idcustomer = $this->$data['idcustomer'];
            $this->idstaff = $this->$data['idstaff'];
            $cst = $this->con->connect()->prepare("insert into `tbl_book` (`idcustomer`, idstaff`)values(:idcustomer, idstaff;)");
        } catch (PDOExceptionException $ex) {
            return 'error' . $ex->getMessage();
        }
    }
    
    #select for bring all service information;
     public function querySeleciona($dado){
        try{
            $this->idservice = $this->objfc->base64($dado, 2);
            $cst = $this->con->connect()->prepare("SELECT idserv, servname FROM `tbl_service` WHERE `idserv` = :idserv;");
            $cst->bindParam(":idserv", $this->idserv, PDO::PARAM_INT);
            $cst->execute();
            return $cst->fetch();
        } catch (PDOException $ex) {
            return 'error '.$ex->getMessage();
        }
    }
    
     public function querySelect(){
        try{
            $cst = $this->con->connect()->prepare("SELECT `idserv`, `servname` FROM `tbl_service"
                    . "`;");
            $cst->execute();
            return $cst->fetchAll();
        } catch (PDOException $ex) {
            return 'erro '.$ex->getMessage();
        }
    }
    
    
}
