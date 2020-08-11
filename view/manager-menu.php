<?php
require_once '../backend/Connection.php';
require_once '../backend/Staff.php';
$objstaff = new Staff();

session_start();

IF ($_SESSION['loggedin'] == "yes") {
    $objstaff->StaffLoggedin($_SESSION['staff']);
} else {
    header('location:login.php');
}
#logout
if (!empty($_GET['logout']) == 'yes') {
    $objstaff->logout();
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
        <link href="../css/managerStyle.css" rel="stylesheet" type="text/css" />
        <link href= "../css/bootstrap.min.css" rel= "stylesheet" type= "text/css"/>
        <script type="../tex/javascript"src="js/bootstrap.min.js"></script>
        <script type="../tex/javascript"src="js/jquery-3.4.1.min"></script>
         <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>


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
                            <a href="manager-menu.php"><li>Service</li></a> 
                            <a href="blog.php"><li>Blog</li></a> 
                            <a href="contact.php"><li>Contact</li> </a>
                            <a href="aboutus.php" ><li>About us</li> </a>
                            
                        </ul>
                        
                    </div>
                    <div class="col-md-4 login">   
                        <?php echo $_SESSION['name']?>
                        <a href="?logout=yes"><svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-arrow-right-circle" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
  <path fill-rule="evenodd" d="M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
  <path fill-rule="evenodd" d="M7.646 11.354a.5.5 0 0 1 0-.708L10.293 8 7.646 5.354a.5.5 0 1 1 .708-.708l3 3a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708 0z"/>
  <path fill-rule="evenodd" d="M4.5 8a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1H5a.5.5 0 0 1-.5-.5z"/>
</svg></a>
                        
                        
                    </div>       
                </div> 
            </nav>
            <h3 class="txt">System Control</h3>
            <div class="row service">
                <div class="col-md-12 menu">
                    <div class="col-md-6 menu">  
                        <table class="tabela" border="1" cellspacing="3" cellpadding="1"   >
                            <thead>
                                
                            </thead>
                            <tbody class="cost" >
                                <tr>
                                    <td ><a href="Customer.php"><li id="cli">Client</li> </a></td><tr>
                                </tr>
                                <tr>
                                    <td><a href="CheckBook.php"><li id="cli">Book</li> </a></td><tr>
                                </tr>
                                <tr>
                                    <td><a href="service-form.php"><li id="cli">Service</li></a> </td><tr>
                                </tr>
                                <tr>
                                    <td> <a href="staff-form.php"><li id="cli">Staff</li></a> </td><tr>
                                </tr>
                                <tr>
                                    <td>  <a href="product-form.php"><li id="cli">Product</li> </a></td><tr>
                                </tr>
                                <tr>
                                    <td><a href="stock-form.php" ><li id="cli">Stock</li> </a></td><tr>
                                </tr>
                                
                                 <tr>
                                     <td><a href="staff-service.php" ><li id="cli">Staff Service</li> </a></td><tr>
                                </tr>
                            </tbody>
                        </table>

                        <ul>
                            
                            
                            
                           
                          
                            
                        </ul>
            </div>

            </div>
        </div>
    </body>
