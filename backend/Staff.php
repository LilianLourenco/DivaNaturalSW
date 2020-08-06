<?php

require_once 'Connection.php';
require_once 'Funcao.php';
require_once 'Person.php';

class Staff extends Person {

//class Staff {

    private $con;
    private $objfc;
    private $staff_number;
    private $idstaff;
    private $dt_start;
    private $password;
    private $pps;
    private $salary;
    private $level;

    public function __construct() {
        $this->con = new Connection();
        $this->objfc = new Funcao();
    }

    public function __set($attribute, $value) {
        $this->attribute = $value;
    }

    public function __get($attribute) {
        return $this->attribute;
    }

    public function querySelect($data) {
        try {
            
        } catch (PDOExceptionException $ex) {
            return 'error' . $ex->getMessage();
        }
    }

    public function queryInsert($data) {
        try {
            $this->name = $this->objfc->treatCharacter($data['name'], 1);
            $this->surname = $this->objfc->treatCharacter($data['surname'], 1);
            $this->staff_number = $this->objfc->treatCharacter($data['staff_number'], 1);
            $this->email = $data['email'];
            $this->pps = $data['pps'];
            $this->password = sha1($data['password']);
            $this->birthday = $this->objfc->CurrentDate(2);
            $this->mobile = $data['mobile'];
            $this->street = $data['street'];
            $this->city = $data['city'];
            $this->country = $data['country'];
            $this->dt_start = $this->objfc->CurrentDate(2);
            $this->salary = $data['salary'];
            $this->level = $data['level'];
            $cst = $this->con->connect()->prepare("INSERT INTO `tbl_staff` (`name`,`surname`,`staff_number`,`email`,`pps`,`password`, `birthday`,`mobile`,`street`,`city`,`country`,`dt_start`,`salary`,`level`) VALUES (:name, :surname, :staff_number, :email, :pps, :password, :birthday, :mobile, :street, :city,:country, :dt_start, :salary, :level);");
            ;
            $cst->bindParam(":name", $this->name, PDO::PARAM_STR);
            $cst->bindParam(":surname", $this->surname, PDO::PARAM_STR);
            $cst->bindParam(":staff_number", $this->staff_number, PDO::PARAM_STR);
            $cst->bindParam(":email", $this->email, PDO::PARAM_STR);
            $cst->bindParam(":pps", $this->pps, PDO::PARAM_STR);
            $cst->bindParam(":password", $this->password, PDO::PARAM_STR);
            $cst->bindParam(":birthday", $this->birthday, PDO::PARAM_STR);
            $cst->bindParam(":mobile", $this->mobile, PDO::PARAM_STR);
            $cst->bindParam(":street", $this->street, PDO::PARAM_STR);
            $cst->bindParam(":city", $this->city, PDO::PARAM_STR);
            $cst->bindParam(":country", $this->country, PDO::PARAM_STR);
            $cst->bindParam(":dt_start", $this->dt_start, PDO::PARAM_STR);
            $cst->bindParam(":salary", $this->salary, PDO::PARAM_INT);
            $cst->bindParam(":level", $this->level, PDO::PARAM_INT);
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

    public function checkByName() {
        
    }

    public function staffLogin($dado) {
        $this->email = $dado['email'];
        $this->password = sha1($dado['password']);
        try {
            $cst = $this->con->connect()->prepare("select `idstaff`, `email`, `password` from `tbl_staff` WHERE `email` = :email AND `password` =:password; ");
            $cst->bindParam(":email", $this->email, PDO::PARAM_STR);
            $cst->bindParam(":password", $this->password, PDO::PARAM_STR);
            $cst->execute();
            if ($cst->rowCount() == 0) {
                header('location: login.php?login=error');
            } else {
                session_start();
                #fetch = execute bring the query information
                $rst = $cst->fetch();
                $_SESSION['loggedin'] = 'yes';
                $_SESSION['staff'] = $rst['idstaff'];
                header('location: home-staff.php');
            }
        } catch (PDOException $ex) {
            return $ex->getMessage();
        }
    }

    public function StaffLoggedin($dado) {
        //$this->idstaff = $dado;
        $cst = $this->con->connect()->prepare("SELECT `idstaff`, `name`,`surname`,`level`, `email` FROM `tbl_staff` WHERE `idstaff` = :idstaff;");
        //$cst->bindParam(':idstaff', $this->idstaff, PDO::PARAM_INT);
        $cst->bindParam(':idstaff', $dado, PDO::PARAM_INT);
        $cst->execute();
        $rst = $cst->fetch();
        #put the data in session
         $_SESSION['idstaff'] = $rst['idstaff'];
        $_SESSION['name'] = $rst['name'];
        $_SESSION['surname'] = $rst['surname'];
        $_SESSION['level'] = $rst['level'];
        
    }

    public function logout() {
        session_destroy();
        header('location: index.php');
    }

}
