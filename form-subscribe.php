<?php
require_once 'backend/Person.php';
require_once 'backend/Funcao.php';
require_once 'backend/Customer.php';
$objfc = new Funcao();
$objCust = new Customer();


if(isset($_POST['btnSubscribe'])){
     if($objCust->create($_POST)== 'ok'){
         header("Location: customer-screen.php ");
         
     }else{
         echo '<sript type="text/javascript">alert("Registration fail") </script>';
     }
}








   #$Nome=$_POST['name'];
    #$Sobrenome=$_POST['surname'];
    #$Usuario=$_POST['username'];
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
            
            
            
            <form method="POST" action="form-subscribe.php">
            <label>Name:</label>
            <input type="text" name="name" required="" >
            <label>Surname:</label>            
            <input type="text" name="surname" required="" >
            
            <label>Username:</label>
            <input type="text" name="username" required="" >
            <label>Email:</label>
            
            <input type="email" name="email"  >
            
            <label>Password:</label>
            <input type="password" name="password" required="" >
            
            <label>Sex:</label>
            <input type="text" name="sex" required="" >
            
            <label>Birthday:</label>
            <input type="date" name="birthday"  >
            
            
            <label>Telephone Number:</label>
            <input type="text" name="phone_number"required="">
            
            <label>Mobile:</label>
            <input type="text" name="mobile" required="" >
            
            <label>Street:</label>
            <input type="text"name="street" required=""  >
            
            <label>City:</label>
            <input type="text" name="city" required=""  >
            
            <label>zip code:</label>
            <input type="text" name="zip_cod" required=""  >
            
            <label>Country:</label>
            <input type="text" name="country" required=""  >
            
            <label></label>
            <input type="submit"name="btnSubscribe" value="Subcribe">
            
            
        </form>
        </div>
        </div>
        </>    
    </body>
</html>
