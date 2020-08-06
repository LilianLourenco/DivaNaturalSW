<?php
require_once 'backend/Funcao.php';
require_once 'backend/Connection.php';
require_once 'backend/Customer.php';
$objcustomer = new Customer();
$objfc = new Funcao();
session_start();

IF ($_SESSION['loggedin'] == "yes") {


    $objcustomer->CustomerLoggedin($_SESSION['customer']);
    
} else {
    header('location:login-customer.php');
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
        <link href="css/style.css" rel="stylesheet" type="text/css" />
        <link href="css/control.css" rel="stylesheet" type="text/css" />
        <link href= "css/bootstrap.min.css" rel= "stylesheet" type= "text/css"/>
        <script type="tex/javascript"src="js/bootstrap.min.js"></script>
        <script type="tex/javascript"src="js/jquery-3.4.1.min"></script>


        <title>
            Divah &  Natural
        </title>


    </head>

    <body>
        <div class="container"> 
            <nav class="main-menu">
                <div class="row logo1">
                    <div class="col-md-2 logo">

                        <img class="logo_foto "src="_images/logo.jpg">    
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
                        
                                      <a href="index.php"><svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-arrow-right-circle" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
  <path fill-rule="evenodd" d="M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
  <path fill-rule="evenodd" d="M7.646 11.354a.5.5 0 0 1 0-.708L10.293 8 7.646 5.354a.5.5 0 1 1 .708-.708l3 3a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708 0z"/>
  <path fill-rule="evenodd" d="M4.5 8a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1H5a.5.5 0 0 1-.5-.5z"/>
</svg></a>
                        
                    </div>       
                </div> 
            </nav>

            <div class="row service">
                <div class="col-md-5 menu"></br></br></br>
                    <Label>Name   </Label>
                    <input type="text" name="name"value="<?php echo $_SESSION['name']; ?> <?php echo $_SESSION['surname']; ?>" >
                    
                    <label for="service">Choose a service:</label>
                        <select id="cars" name="carlist" form="carform">
                            <option value="1">Massage</option>
                            <option value="2">Botox</option>
                            <option value="eyes_tatoo">Eyes Tatoo</option>
                            <option value="Laser_waxing">Laser waxing</option>
                            <option value="eyesbrown">Design Eyesbrown</option>
                            <option value="acne">Acne Treatment</option>
                            <option value="waxing">Waxing</option>
                            <option value="massage_reduction">Massage Reduction</option>
                            <option value="artifitial_sunbathing">Artifitial Sunbathing</option>
                        </select></br>
                    <Label>Profissional</Label>
                    <input type="text" name="staff">
                    <Label>Date</Label>
                    <input type="date" name="bookdata">
                    <Label>Time</Label>
                    <input type="datetime" name="time"></br>
                    
                    <input type="submit" name="btRegister" value="Register">
                    
                    

                </div>
            </div>

            </div>
        </div>
    </body>
