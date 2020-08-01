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
