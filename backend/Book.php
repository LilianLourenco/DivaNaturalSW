<?php

require_once 'Service.php';
require_once 'Connection.php';
require_once 'Funcao.php';

class Book {

    private $con;
    private $idcustomer;
    private $idstaff;
    private $idserv;
    private $datebook;
    private $times;
    private $status;
    private $servname;

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
           
            //print_r($data);
            
            $this->idcustomer = $data['idcustomer'];
            $this->name = $data['name'];
            $this->idstaff = $data['idstaff'];
            $this->idserv = $data['idserv'];
            $this->datebook = $data['datebook'];
            $this->times = $data['times'];
            $cst = $this->con->connect()->prepare("insert into `tbl_book` (`idcustomer`, `name`,`idstaff`, `idserv`, `datebook`, `times`) values(:idcustomer,:name,:idstaff,:idserv,:datebook,:times);");
            $cst->bindParam(":idcustomer", $this->idcustomer, PDO::PARAM_INT);
            $cst->bindParam(":name", $this->name, PDO::PARAM_STR);
            $cst->bindParam(":idstaff", $this->idstaff, PDO::PARAM_INT);
            //$cst->bindParam(":staffname", $this->staffname, PDO::PARAM_STR);
            $cst->bindParam(":idserv", $this->idserv, PDO::PARAM_INT);
            //$cst->bindParam(":servname", $this->servname, PDO::PARAM_STR);
            $cst->bindParam(":datebook", $this->datebook, PDO::PARAM_STR);
            $cst->bindParam(":times", $this->times, PDO::PARAM_STR);
            //$cst->bindParam(":status", $this->status, PDO::PARAM_STR);
            if ($cst->execute()) {
                return 'ok';
            } else {
                return 'erro';
            }
        } catch (PDOException $ex) {
            return 'error ' . $ex->getMessage();
        }
    }

    #select for bring all service information;

    public function querySeleciona($dado) {
        try {
            $this->idservice = $this->objfc->base64($dado, 2);
            $cst = $this->con->connect()->prepare("SELECT idserv, servname FROM `tbl_service` WHERE `idserv` = :idserv;");
            $cst->bindParam(":idserv", $this->idserv, PDO::PARAM_INT);
            $cst->execute();
            return $cst->fetch();
        } catch (PDOException $ex) {
            return 'error ' . $ex->getMessage();
        }
    }

    public function querySelectbook() {
        try {
            $cst = $this->con->connect()->prepare("SELECT * FROM tbl_service"
                    . "`;");
            $cst->execute();
            return $cst->fetchAll();
        } catch (PDOException $ex) {
            return 'erro ' . $ex->getMessage();
        }
    }
    
    

}
    