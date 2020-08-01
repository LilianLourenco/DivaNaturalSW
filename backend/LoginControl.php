<?php
require_once 'Connection.php';
require_once 'Funcao.php';
require_once 'Person.php';
require_once 'Staff.php';



class LoginControl {

//class Staff {

    

    public function __set($attribute, $value) {
        $this->attribute = $value;
    }

    public function __get($attribute) {
        return $this->attribute;
    }
    
    public function staffLogin($dado) { 
         $this->email = $dado['email'];
         $this->password = sha1($dado['password']);
         try{
             $cst = $this->con->connect()->prepare("select `idStaff`, `email`, `password` from `tbl_staff` WHERE `email` = :email AND `password` =:password; ");
             $cst->bindParam(":email", $this->email, PDO::PARAM_STR);
             $cst->bindParam(":password", $this->password, PDO::PARAM_STR);
             $cst->execute();
             if($cst->rowCount()==0){
                 header('location: login.php?login.php=error');
                 
             } else {
                 session_start();
                 #fetch = execute bring the query information
                 $rst = $cst->fetch();
                 $_SESSION['loggedin']='yes';
                 $_SESSION['staff'] = $rst['idstaff'];
                 header('location: manager-menu.php');
                 
             }
         } catch (PDOException $ex) {
             return $ex->getMessage();
         }
         
     }
     
     
     public function StaffLoggedin($dado){
		$cst = $this->con->connect()->prepare("SELECT `idstaff`, `name`, `email` FROM `tbl_staff` WHERE `idstaff` = :idstaff;");
		$cst->bindParam(':idstaff', $dado, PDO::PARAM_INT);
		$cst->execute();
		$rst = $cst->fetch();
		$_SESSION['name'] = $rst['name'];
	}
	
	public function logout(){
		session_destroy();
		header ('location: login.php');
	}

}
