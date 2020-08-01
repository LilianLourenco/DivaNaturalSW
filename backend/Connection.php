<?php

class Connection{
    private $usuario;
    private $senha;
    private $banco;
    private $servidor;
    private static $pdo;
    
    public function __construct(){
        $this->servidor = "localhost";
        $this->banco = "db_divahnatural";
        $this->usuario = "root";
        $this->senha = "";
    }
    
    public function connect(){
     try{
            if(is_null(self::$pdo)){
                self::$pdo = new PDO("mysql:host=".$this->servidor.";dbname=".$this->banco, $this->usuario, $this->senha);
                
            }
            return self::$pdo;
        } catch (PDOException $ex) {
			echo $ex->getMessage();
        }
    }
    
}

?>
