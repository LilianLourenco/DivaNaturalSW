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
        <link href="css/customer.css" rel="stylesheet" type="text/css" />
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
                        <h4 id="welc"><?php echo "Welcome  " . $_SESSION['name']; ?></h4>
                        

                    </div>       
                </div> 
            </nav>

            
                




                <form name="formCad" action="customer-screen.php" method="post" class="margin">
                    
                    <div class="row service">
                <div class="col-md-9 menu">    

                    <h1>My data</h1>
                    
                        <label>Name: </label><br>
                        <input type="text" name="name"value="<?php echo $_SESSION['name']; ?> <?php echo $_SESSION['surname']; ?>" >                                        
                        <label>Mobile Number: </label><br>
                        <input type="text" name="mobile"value="<?php echo $_SESSION['mobile']; ?> " >
                        <label>Email: </label><br>
                        <input type="text" name="email"value="<?php echo $_SESSION['email']; ?> " >
                       <label>Birthday: </label><br>
                        <input type="text"  value="<?php echo $_SESSION['birthday']; ?> ">
                       <label>Address: </label><br>
                        <input type="text"  value="<?php echo $_SESSION['street']; ?> <?php echo $_SESSION['city']; ?> "><br>
                        <input type="text"  value="<?php echo $_SESSION['zip_cod']; ?> <?php echo $_SESSION['country']; ?> ">

                    </div>
                    <div class="col-md-3 menu"> 






                        <h1 id="dif">My account</h1>
                        <table class="tabela" border="1" cellspacing="3" cellpadding="1" >
                             
                                <thead>
                                
                            </thead>
                            <tbody class="costumer" >
                                <tr>
                                    <td id="text1"><a href="CheckBook.php"><li id="cos">Book Service</li> </a></td><tr>
                                </tr>
                                <tr>
                                    <td id="text1"><a href="customer-product.php"><li id="cos">My request</li> </a></td><tr>
                                </tr>
                                <tr>
                                    <td id="text1"><a href="customer-product.php"><li id="cos">My records</li></a> </td><tr>
                                </tr>
                                <tr>
                                    <td id="text1"> <a href="customer-screen.php"><li id="cos">Update Data</li></a> </td><tr>
                                </tr>
                                
                                <tr>
                                    <td id="text1"> <a href="index.php"><li id="cos">Logout</li></a> </td><tr>
                                </tr>
                               
                            </tbody>
                            </ul>
                        </table>
                    
            </div>
        </form>




        <div class="col-md-4 menu">   

        </div>
    

</div>
</div>
</body>
