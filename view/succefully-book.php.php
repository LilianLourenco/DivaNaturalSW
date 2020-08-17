<?php
require_once '../backend/Funcao.php';
require_once '../backend/Connection.php';
require_once '../backend/Customer.php';
$objcustomer = new Customer();
$objfc = new Funcao();
session_start();

IF ($_SESSION['loggedin'] == "yes") {


    $objcustomer->CustomerLoggedin($_SESSION['customer']);
    
} else {
    header('location:index.php');
}
#logout
if (!empty($_GET['logout']) == 'yes') {
    $objcustomer->logout();
}
?>


<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link href="../css/style.css" rel="stylesheet" type="text/css" />
        <link href="../css/control.css" rel="stylesheet" type="text/css" />
        <link href= "../css/bootstrap.min.css" rel= "stylesheet" type= "text/css"/>
        <script type="../tex/javascript"src="js/bootstrap.min.js"></script>
        <script type="../tex/javascript"src="js/jquery-3.4.1.min"></script>


        <title>
            Divah &  Natural
        </title>


    </head>

    <body>
        <div class="container"> 
            <nav class="main-menu">
                <div class="row logo1">
                    <div class="col-md-2 logo">

                        <img class="logo_foto "src="../_images/logo.jpg">    
                    </div>
                    <div class="col-md-6 menu">  
                        <ul>
                            <a href="home.php"><li>Home</li> </a>                            
                            <a href="blog.php"><li>Blog</li></a> 
                            <a href="contact.php"><li>Contact</li> </a>
                            <a href="aboutus.php" ><li>About us</li> </a>
                        </ul>

                    </div>
                    <div class="col-md-4 login">   
                        
                        
                                <td id="text1"> <a href="Logout.php"><li id="cos">Logout</li></a> </td><tr>
                                </tr>
                                <a href="customer-screen.php"><label class="subs">Back to customer screen</label></a>       
                        
                    </div>       
                </div> 
            </nav>

            <div class="row service">
                <div class="col-md-5 menu"></br></br></br>
                    <h1>Succefull book</H1>

                </div>
            </div>

            </div>
        </div>
    </body>
