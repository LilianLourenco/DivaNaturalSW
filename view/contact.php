<?php
require_once '../backend/Funcao.php';
$objfc = new Funcao();
if (isset($_POST['btSend'])) {
    $objfc->SendEmail($_POST);
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

                        <div class="col-md-4 login">   
                        <a href="view/login-customer.php"> <label class="log">&nbsp;</label><svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-person" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M13 14s1 0 1-1-1-4-6-4-6 3-6 4 1 1 1 1h10zm-9.995-.944v-.002.002zM3.022 13h9.956a.274.274 0 0 0 .014-.002l.008-.002c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664a1.05 1.05 0 0 0 .022.004zm9.974.056v-.002.002zM8 7a2 2 0 1 0 0-4 2 2 0 0 0 0 4zm3-2a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"/>
                            </svg>
                        </a>

                    </div>       
                </div> 
            </nav>

            <div class="row service">
                <div class="col-md-5 menu">
                    <form class="cont" action="" method="POST" >
                        <label>Name:</label><br>
                        <input type="text" name="name" required="required"><br>
                        <label>Email:</label><br>
                        <input type="email" name="email" required="required" pattern="^[a-z0-9._-]{2,}@[a-z0-9-]{2,}.[a-z.]{2,}$"><br>
                        <label>Subject:</label><br>
                        <input type="text" name="subject" required="required"><br>
                        <label>Message:</label><br>
                        <textarea name="message" required="required"></textarea>
                        <br><br>
                        <input type="submit" name="btEnviar" value="Enviar">  

                    </form>

                </div>
                <div class="col-md-3 menu"> 
                </div>
                <div class="col-md-4 menu">   

                </div>
            </div>

        </div>
    </div>
</body>
