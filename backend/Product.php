<?php

include_once "Connection.php";
include_once "Funcao.php";

class Product {
    
    private $con;
    private $objfc;
    private $idProduct;
    private $name;
    private $description;
    private $dtRegister;
    
    public function __construct(){
        $this->con = new Connection();
        $this->objfc = new Funcao();
    }
    
    public function __set($atributo, $valor){
        $this->$atributo = $valor;
    }
    public function __get($atributo){
        return $this->$atributo;
    }
    
    public function querySeleciona($dado){
        try{
            $this->idProduct = $this->objfc->base64($dado, 2);
            $cst = $this->con->connect()->prepare("SELECT idProduct, name, description FROM `tbl_product` WHERE `idProduct` = :idProduct;");
            $cst->bindParam(":idProduct", $this->idProduct, PDO::PARAM_INT);
            $cst->execute();
            return $cst->fetch();
        } catch (PDOException $ex) {
            return 'error '.$ex->getMessage();
        }
    }
    
    public function querySelect(){
        try{
            $cst = $this->con->connect()->prepare("SELECT `idProduct`, `name`,`description` FROM `tbl_product`;");
            $cst->execute();
            return $cst->fetchAll();
        } catch (PDOException $ex) {
            return 'erro '.$ex->getMessage();
        }
    }
    
    public function queryInsert($dados){
        try{
            $this->name = $this->objfc->treatCharacter($dados['name'], 1);
            $this->description = $dados['description'];
            
            $this->dtRegister = $this->objfc->CurrentDate(2);
            $cst = $this->con->connect()->prepare("INSERT INTO `tbl_product` (`name`, `description`, `dtregister`) VALUES (:name, :description, :dtregister);");
            $cst->bindParam(":name", $this->name, PDO::PARAM_STR);
            $cst->bindParam(":description", $this->description, PDO::PARAM_STR);
            $cst->bindParam(":dtregister", $this->dtRegister, PDO::PARAM_STR);
            if($cst->execute()){
                return 'ok';
            }else{
                return 'erro';
            }
        } catch (PDOException $ex) {
            return 'error '.$ex->getMessage();
        }
    }
    
    public function queryUpdate($dados){
        try{
            $this->idProduct = $this->objfc->base64($dados['prod'], 2);
            $this->name = $this->objfc->treatCharacter($dados['name'], 1);
            $this->description = $dados['description'];
            $cst = $this->con->connect()->prepare("UPDATE `tbl_product` SET  `name` = :name, `description` = :description WHERE `idProduct` = :idProduct;");
            $cst->bindParam(":idProduct", $this->idProduct, PDO::PARAM_INT);
            $cst->bindParam(":name", $this->name, PDO::PARAM_STR);
            $cst->bindParam(":description", $this->description, PDO::PARAM_STR);
            if($cst->execute()){
                return 'ok';
            }else{
                return 'erro';
            }
        } catch (PDOException $ex) {
            return 'error '.$ex->getMessage();
        }
    }
    
    public function queryDelete($dado){
        try{
            $this->idProduct = $this->objfc->base64($dado, 2);
            $cst = $this->con->connect()->prepare("DELETE FROM `tbl_product` WHERE `idProduct` = :idProduct;");
            $cst->bindParam(":idProduct", $this->idProduct, PDO::PARAM_INT);
            if($cst->execute()){
                return 'ok';
            }else{
                return 'erro';
            }
        } catch (PDOException $ex) {
            return 'error'.$ex->getMessage();
        }
    }
    
}
?>
