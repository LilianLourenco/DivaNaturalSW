<?php

require_once 'Connection.php';
require_once 'Funcao.php';
require_once 'Person.php';

class Customer extends Person {

    private $con;
    private $objFunc;
    private $username;
    private $idcustomer;
    private $dtregister;
    private $password;

    public function __construct() {
        $this->con = new Connection();
        $this->objFunc = new Funcao();
    }

    public function __set($attribute, $value) {
        $this->attribute = $value;
    }

    public function __get($attribute) {
        return $this->attribute;
    }

    public function RegisterCustomer() {
        
    }

    public function querySelect($data) {
        try {
            
        } catch (PDOExceptionException $ex) {
            return 'error' . $ex->getMessage();
        }
    }

    public function select() {
        try {
            
        } catch (Exception $ex) {
            return 'error' . $ex->getMessage();
        }
    }

    public function create($data) {
        try {
            $this->name = $this->objFunc->treatCharacter($data['name'], 1);
            $this->surname = $this->objFunc->treatCharacter($data['surname'], 1);
            $this->username = $this->objFunc->treatCharacter($data['username'], 1);
            $this->email = $data['email'];
            $this->sex = $data['sex'];
            $this->password = sha1($data['password']);
            $this->birthday = $this->objFunc->CurrentDate(2);
            $this->dtregister = $this->objFunc->CurrentDate(2);
            $this->street = $data['street'];
            $this->city = $data['city'];
            $this->zip_cod = $data['zip_cod'];
            $this->country = $data['country'];
            $this->phone_number = $data['phone_number'];
            $this->mobile = $data['mobile'];



           $cst = $this->con->connect()->prepare("INSERT INTO `tbl_customer` (`name`,`surname`,`username`,`email`,`sex`,
                `password`, `birthday`, `dtregister`,`street` ,`city`, `zip_cod`,`country`, `phone_number`,`mobile`) VALUES
                    (:name, :surname, :username, :email, :sex, :password, 
                    :birthday, :dtregister, :street, :city, :zip_cod, :country, :phone_number, :mobile);");
            $cst->bindParam(":name", $this->name, PDO::PARAM_STR);
            $cst->bindParam(":surname", $this->surname, PDO::PARAM_STR);
            $cst->bindParam(":username", $this->username, PDO::PARAM_STR);
            $cst->bindParam(":email", $this->email, PDO::PARAM_STR);
            $cst->bindParam(":sex", $this->sex, PDO::PARAM_STR);
            $cst->bindParam(":password", $this->password, PDO::PARAM_STR);
            $cst->bindParam(":birthday", $this->birthday, PDO::PARAM_STR);
            $cst->bindParam(":dtregister", $this->dtregister, PDO::PARAM_STR);
            $cst->bindParam(":street", $this->street, PDO::PARAM_STR);
            $cst->bindParam(":city", $this->city, PDO::PARAM_STR);
            $cst->bindParam(":zip_cod", $this->zip_cod, PDO::PARAM_STR);
            $cst->bindParam(":country", $this->country, PDO::PARAM_STR);
            $cst->bindParam(":phone_number", $this->phone_number, PDO::PARAM_STR);
            $cst->bindParam(":mobile", $this->mobile, PDO::PARAM_STR);
            
            if ($cst->execute()) {
                return 'ok';
            } else {
                return 'erro';
            }
        } catch (PDOException $ex) {
            return 'error ' . $ex->getMessage();
        }
    }

    public function delete($data) {
        try {
            
        } catch (PDOExceptionException $ex) {
            
        }
    }

    public function read() {
        try {
            
        } catch (PDOExceptionException $ex) {
            
        }
    }

    public function update($data) {
        
    }

    public function calculateAge() {
        
    }

    public function checkByName() {
        
    }

    public function calculateBMI() {
        
    }

    public function listCustomer() {
        
    }
 public function customerLogin($dado) { 
         $this->email = $dado['email'];
         $this->password = sha1($dado['password']);
         try{
             $cst = $this->con->connect()->prepare("select `idcustomer`, `email`, `password` from `tbl_customer` WHERE `email` = :email AND `password` =:password; ");
             $cst->bindParam(":email", $this->email, PDO::PARAM_STR);
             $cst->bindParam(":password", $this->password, PDO::PARAM_STR);
             $cst->execute();
             if($cst->rowCount()==0){
                 header('location: login-customer.php?login-customer.php=error');
                 
             } else {
                 session_start();
                 #fetch = execute bring the query information
                 $rst = $cst->fetch();
                 $_SESSION['loggedin']='yes';
                 $_SESSION['customer'] = $rst['idcustomer'];
                 header('location: customer-screen.php');
                 
             }
         } catch (PDOException $ex) {
             return $ex->getMessage();
         }
         
     }
     
     
     public function CustomerLoggedin($dado){
		$cst = $this->con->connect()->prepare("SELECT `idcustomer`, `name`, `email` FROM `tbl_customer` WHERE `idcustomer` = :idcustomer;");
		$cst->bindParam(':idcustomer', $dado, PDO::PARAM_INT);
		$cst->execute();
		$rst = $cst->fetch();
		$_SESSION['name'] = $rst['name'];
	}
	
	public function logout(){
		session_destroy();
		header ('location: index.php');
	}
	
}

