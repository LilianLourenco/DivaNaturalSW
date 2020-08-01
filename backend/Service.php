<?php

include_once "Connection.php";
include_once "Funcao.php";

class Service {
    
    private $con;
    private $objfc;
    private $idserv;
    private $servname;
    private $type_serv;
    private $session_min;
    private $session_max;
    private $serv_date;


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
            // Recebe os dados passados pela chamada da função na página service-form.php (if (isset($_POST['btRegister'])) { if ($objserv->queryInsert($_POST) == 'ok') {
            $this->servname = $this->objfc->treatCharacter($dados['servname'], 1);
            $this->type_serv = $dados['type_serv'];
            $this->session_min = $dados['session_min'];
            $this->session_max = $dados['session_max'];
            //Pega as variáveis recebidas dos campos acima e salva no banco
            $cst = $this->con->connect()->prepare("INSERT INTO `tbl_service` (`servname`, `type_serv`, `session_min`, `session_max`) VALUES (:servname, :type_serv, :session_min, :session_max);");
            $cst->bindParam(":servname", $this->servname, PDO::PARAM_STR);
            $cst->bindParam(":type_serv", $this->type_serv, PDO::PARAM_STR);
            $cst->bindParam(":session_min", $this->session_min, PDO::PARAM_INT);
            $cst->bindParam(":session_max", $this->session_max, PDO::PARAM_INT);
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
