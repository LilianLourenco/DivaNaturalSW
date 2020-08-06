<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of LoginTest
 *
 * @author New
 */
class LoginTest {
    public function Login($dado) { 
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
                 $_SESSION['name'] = $rst['name'];
                 $_SESSION['surname'] = $rst['surname'];
                 if($rst['level'] == 1){
                     header('location: custo.php');
                 }else if($rst['level'] == 2){
                     header('location: customer-screen.php');
                 }else{
                    header('location: index.php');
                }
                 
             }
         } catch (PDOException $ex) {
             return $ex->getMessage();
         }
         
     }
     
     
     public function Loggedin($dado){
		$cst = $this->con->connect()->prepare("SELECT `idcustomer`, `name`, `email`, `surname`, `mobile`, `birthday`,`street`,`city`,`zip_cod`,`country` FROM `tbl_customer` WHERE `idcustomer` = :idcustomer;");
		$cst->bindParam(':idcustomer', $dado, PDO::PARAM_INT);
		$cst->execute();
		$rst = $cst->fetch();
		$_SESSION['name'] = $rst['name'];
                $_SESSION['surname'] = $rst['surname'];
                $_SESSION['email'] = $rst['email'];
                $_SESSION['mobile'] = $rst['mobile'];
                $_SESSION['birthday'] = $rst['birthday'];
                $_SESSION['street'] = $rst['street'];
                $_SESSION['city'] = $rst['city']; 
                $_SESSION['zip_cod'] = $rst['zip_cod']; 
                $_SESSION['country'] = $rst['country']; 
                
                                
	}
	
	public function logout(){
		session_destroy();
		header ('location: index.php');
	}

}
