<?php

include_once "Connection.php";
include_once "Funcao.php";

class Stock {
    
    private $con;
    private $objfc;
    private $idproduct;
    private $idstock;
    private $date;
    private $amount;
    private $max;
    private $min;
    
    
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
            $this->idproduct = $this->objfc->base64($dado, 2);
            $cst = $this->con->connect()->prepare("SELECT idproduct, amount, min, max FROM `tbl_stock` WHERE `idproduct` = :idproduct;");
            $cst->bindParam(":idproduct", $this->idProduct, PDO::PARAM_INT);
            $cst->execute();
            return $cst->fetch();
        } catch (PDOException $ex) {
            return 'error '.$ex->getMessage();
        }
    }
    
    public function querySelect(){
        try{
            $cst = $this->con->connect()->prepare("SELECT `idproduct`, `amount`,`min`,`max` FROM `tbl_stock`;");
            $cst->execute();
            return $cst->fetchAll();
        } catch (PDOException $ex) {
            return 'erro '.$ex->getMessage();
        }
    }
    
    public function queryInsert($dados){
        try{
            #$this->amount = $dados['idproduct'];
            $this->amount = $dados['amount'];
            $this->min = $dados['min'];
            $this->max = $dados['max'];
            $this->date = $this->objfc->CurrentDate(2);
            $cst = $this->con->connect()->prepare("INSERT INTO `tbl_stock` (`amount`, `min`, `max`, `date`) VALUES (:amount, :min , :max,:date);");
            $cst->bindParam(":amount", $this->amount, PDO::PARAM_INT);
            $cst->bindParam(":min", $this->min, PDO::PARAM_INT);
            $cst->bindParam(":max", $this->max, PDO::PARAM_INT);
            $cst->bindParam(":date", $this->date, PDO::PARAM_STR);
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
            $this->idroduct = $this->objfc->base64($dados['stock'], 2);            
            $this->amount = $dados['amount'];
            $cst = $this->con->connect()->prepare("UPDATE `tbl_stock` SET  `amount` = :amount, `min` = :min,:max,  WHERE `idproduct` = :idproduct;");
            $cst->bindParam(":idProduct", $this->idProduct, PDO::PARAM_INT);
            $cst->bindParam(":amount", $this->amount, PDO::PARAM_INT);
            $cst->bindParam(":min", $this->min, PDO::PARAM_INT);
            $cst->bindParam(":max", $this->max, PDO::PARAM_INT);
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
            $this->idproduct = $this->objfc->base64($dado, 2);
            $cst = $this->con->connect()->prepare("DELETE FROM `tbl_stock` WHERE `idproduct` = :idproduct;");
            $cst->bindParam(":idproduct", $this->idProduct, PDO::PARAM_INT);
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
