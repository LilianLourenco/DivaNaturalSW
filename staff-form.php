<?php
require_once 'backend/Connection.php';
require_once 'backend/Person.php';
require_once 'backend/Funcao.php';
require_once 'backend/Staff.php';

$objfc = new Funcao();
$objstaff = new Staff();


if(isset($_POST['btRegister'])){
     if($objstaff->queryInsert($_POST)== 'ok'){
         echo '<sript type="text/javascript">alert("Registration successful") </script>';
         header("Location: staff-form.php ");
         
     }else{
         echo '<sript type="text/javascript">alert("Registration fail") </script>';
     }
}

?>
<?php
    
//    
//        require_once 'backend/Connection.php';
//        require_once 'backend/Staff.php';
//        $objstaff = new Staff();

        session_start();
        
    IF($_SESSION['loggedin']=="yes"){
       $objstaff->StaffLoggedin($_SESSION['staff']);
       
    }else{
        header('location:login.php' );
    }
    #logout
    if(!empty($_GET['logout'])  =='yes'){
         $objstaff->logout();
    }
?>




<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link href="css/style.css" rel="stylesheet" type="text/css" />
        <link href="css/control.css" rel="stylesheet" type="text/css" />
        <link href= "css/bootstrap.min.css" rel= "stylesheet" type= "text/css"/>
        <script type="tex/javascript"src="js/bootstrap.min.js"></script>
        <script type="tex/javascript"src="js/jquery-3.4.1.min"></script>

        <title></title>
    </head>
    <body>
<?php echo $_SESSION['name']?>
                        <a href="?logout=yes"><svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-arrow-right-circle" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
  <path fill-rule="evenodd" d="M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
  <path fill-rule="evenodd" d="M7.646 11.354a.5.5 0 0 1 0-.708L10.293 8 7.646 5.354a.5.5 0 1 1 .708-.708l3 3a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708 0z"/>
  <path fill-rule="evenodd" d="M4.5 8a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1H5a.5.5 0 0 1-.5-.5z"/>
</svg></a>    
        <div class="container"> 
        <div id="form-body">
            <h1> Register</h1>
            
            
            
            <form name="cadStaff" method="POST" action="staff-form.php">
            <label>Name:</label>
            <input type="text" name="name" required="" value="">
            
            <label>Surname:</label>            
            <input type="text" name="surname" required="" value="">
            
            <label>Staff Number:</label>
            <input type="text" name="staff_number" required="" value="">

            <label>Email:</label>                        
            <input type="email" name="email"  value=""
            
           <label>PPS:</label>      
           <input type="text" name="pps" required="" value="">
            
            <label>Password:</label>
            <input type="password" name="password" required="" value="">
            
            
            
            <label>Birthday:</label>
            <input type="date" name="birthday" value="" >
                                            
            
            <label>Mobile:</label>
            <input type="text" name="mobile" required="" >
            
            <label>Street:</label>
            <input type="text"name="street" required=""  >
            
            <label>City:</label>
            <input type="text" name="city" required=""  >
            
            
            
            <label>Country:</label>
            <input type="text" name="country" required=""  >
            
            <label>Start date:</label>
            <input type="date" name="dt_start" required="" >
            
            <label>Salary:</label>
            <input type="number" name="salary" required="" >
            
            <label>Access Level:</label>
            <input type="number" name="level" required="" >
            <label></label>
            <input type="submit" name="btRegister" value="Subcribe">
            
            
        </form>
        </div>
        </div>
        </>    
    </body>
</html>
