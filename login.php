<?php
require_once 'backend/Connection.php';
require_once 'backend/Person.php';
require_once 'backend/Funcao.php';
require_once 'backend/Staff.php';


$objstaff = new Staff();
if(isset($_POST['btLogin'])){
    $objstaff->staffLogin($_POST);
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
           
        <form method="POST" action="">
            <h3>Restrict Access</h3>
            <input type="email" name="email" placeholder="username">
            <input type="password" name="password"placeholder="password">
            <input type="submit" value="Login" name="btLogin">
            
            
        </form>
            <?php if(!empty($_GET["login"]) == "error"){ ?>
        <div class="alert alert-danger alert-block alert-aling" role="alert">Email or password is wrong</div>
        <?php } ?>
        </div>
        </div>
        </>    
    </body>
</html>
