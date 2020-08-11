
<?php

include_once "Connection.php";
include_once "Funcao.php";

class StaffService  {
    
    private $con;
    private $objfc;
    private $id_servstaff;
    private $idstaff;
    private $namestaff;   
    private $idserv;
    private $nameserv;
    
    
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
            $this->id_servstaff = $this->objfc->base64($dado, 2);
            $cst = $this->con->connect()->prepare("SELECT id_servstaff, namestaff, idserv, nameserv, idstaff, FROM `tbl_servstaff` WHERE `id_servstaff` = :id_servstaff;");
            $cst->bindParam(":id_servstaff", $this->id_servstaff, PDO::PARAM_INT);
            $cst->execute();
            return $cst->fetch();
        } catch (PDOException $ex) {
            return 'error '.$ex->getMessage();
        }
    }
    
    public function querySelect(){
        try{
            $cst = $this->con->connect()->prepare("SELECT `id_servstaff`, `idstaff`, `namestaff`,`idserv`, `nameserv` FROM `tbl_servstaff`;");
            $cst->execute();
            return $cst->fetchAll();
        } catch (PDOException $ex) {
            return 'erro '.$ex->getMessage();
        }
    }
    
    public function queryInsert($dados){
        try{
            $this->idstaff = $dados['idstaff'];
            $this->namestaff = $this->objfc->treatCharacter($dados['namestaff'], 1);
            $this->idserv = $dados['idserv'];
            $this->nameserv = $this->objfc->treatCharacter($dados['nameserv'], 1);
            
            $cst = $this->con->connect()->prepare("INSERT INTO `tbl_servstaff` (`idserv`,`nameserv`,`idstaff`, `namestaff`  ) VALUES (:idserv, :nameserv, :idstaff, :namestaff );");
            $cst->bindParam(":idstaff", $this->idstaff, PDO::PARAM_INT);            
              $cst->bindParam(":nameserv", $this->nameserv, PDO::PARAM_STR);
            $cst->bindParam(":namestaff", $this->namestaff, PDO::PARAM_STR);
            $cst->bindParam(":idserv", $this->idserv, PDO::PARAM_INT);
          
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
            $this->id_servstaff = $this->objfc->base64($dados['serv'], 2);
            $this->idstaff = $dados['idstaff'];
            $this->namestaff = $this->objfc->treatCharacter($dados['namestaff'], 1);
            $this->idserv = $dados['idserv'];
            $this->namestaff = $this->objfc->treatCharacter($dados['nameserv'], 1);            
            $cst = $this->con->connect()->prepare("UPDATE `tbl_servstaff` SET  `idstaff` = :idstaff, `namestaff` = :namestaff,`idserv` = :idserv,`nameserv` = :nameserv WHERE `id_servstaff` = :id_servstaff;");
            $cst->bindParam(":id_servstaff", $this->id_servstaff, PDO::PARAM_INT);            
            $cst->bindParam(":idstaff", $this->idstaff, PDO::PARAM_INT);            
            $cst->bindParam(":namestaff", $this->namestaff, PDO::PARAM_STR);
            $cst->bindParam(":idserv", $this->idserv, PDO::PARAM_INT);
            $cst->bindParam(":nameserv", $this->nameserv, PDO::PARAM_STR);
           
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
            $this->id_servstaff = $this->objfc->base64($dado, 2);
            $cst = $this->con->connect()->prepare("DELETE FROM `tbl_servstaff` WHERE `id_servstaff` = :id_servstaff;");
            $cst->bindParam(":id_servstaff", $this->id_servstaff, PDO::PARAM_INT);
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
