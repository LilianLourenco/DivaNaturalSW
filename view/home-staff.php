<?php
require_once '../backend/Funcao.php';
require_once '../backend/Connection.php';
require_once '../backend/Staff.php';
$objstaff = new Staff();
$objfc = new Funcao();
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
        <link href= "../css/bootstrap.min.css" rel= "stylesheet" type= "text/css"/>
        <script type="../tex/javascript"src="js/bootstrap.min.js"></script>
        <script type="../tex/javascript"src="js/jquery-3.4.1.min"></script>        
        <link href="../bootstrap-3.3.7-dist/css/bootstrap.min.css" rel="stylesheet" type="text/css" media="all">
        <link href="../bootstrap-3.3.7-dist/css/bootstrap-theme.min.css" rel="stylesheet" type="text/css" media="all">
        <script src="../bootstrap-3.3.7-dist/js/bootstrap.min.js" type="text/javascript"></script>
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
                            <a href="product-form.php" ><li>About us</li> </a>
                        </ul>
                    </div>
                    <div class="col-md-4 login">  
                        <h4 id="welc"><a href="Logout.php"><li id="cos">Logout</li></a> <?php echo "Staff id:  " . $_SESSION['idstaff']; ?> - <?php echo "Welcome  " . $_SESSION['name']; ?> - <?php echo "Level" . $_SESSION['level']; ?> </h4>
                        <a href="login-customer.php"> <label class="log">&nbsp;</label><svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-person" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M13 14s1 0 1-1-1-4-6-4-6 3-6 4 1 1 1 1h10zm-9.995-.944v-.002.002zM3.022 13h9.956a.274.274 0 0 0 .014-.002l.008-.002c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664a1.05 1.05 0 0 0 .022.004zm9.974.056v-.002.002zM8 7a2 2 0 1 0 0-4 2 2 0 0 0 0 4zm3-2a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"/>
                            </svg>
                            </svg></a>
                        <a href="form-subscribe.php"><label class="subs">Subscribe</label></a>
                    </div>       
                </div> 
            </nav>
            <div class="row service">
                <div class="col-md-5 menu">
                    <p id="about">  The aesthetic clinic
                        <span >Divah & Natural</span> is already working we are waiting for you to get to know our services and we
                        have great promotions among our services and check out:</p>
                </div>
                <div class="col-md-3 menu"> 
                </div>
                <div class="col-md-4 menu">   
                    <img class="im" src="../_images/woman-mosturising.jpeg">
                </div>
            </div>
            <div class="row space1">
                <div class="col-md-5 space"> </div>  
                <p class="sub-menu">   Our Services</p>
            </div>
            <div class="row service">
                <div class="col-md-4 col-lg-4 col-xs-12 text-center">                 
                    <a href="massge.php">
                        <img src="../_images/massage-face.jpg" alt=" service">
                        <label>Massage</label>
                    </a>
                </div>       
                <div class="col-md-4 col-lg-4 col-xs-12 text-center ">   
                    <a href="botox.php">
                        <img src="../_images/botox.jpg" alt=" service">
                        <label>Botox</label>
                    </a>
                </div>       
                <div class="col-md-4 col-lg-4 col-xs-12 text-center">   
                    <a href="microblading.php">
                        <img src="../_images/eyebrow-tatoo.jpg" alt=" service">
                        <label>Microblading</label>
                    </a>
                </div>       
                <div class="col-md-4 col-lg-4 col-xs-12 text-center ">   
                    <a href="waxing.php">
                        <img src="../_images/laser-waxing.jpg" alt=" service">
                        <label>Laser Waxing</label>
                    </a>
                </div>
                <div class="col-md-4 col-lg-4 col-xs-12 text-center ">   
                    <a href="eyebrown-design.php">
                        <img src="../_images/design-eyesbrows.jpg" alt=" service">
                        <label>Design Eyesbrown</label>
                    </a>
                </div>
                <div class="col-md-4 col-lg-4 col-xs-12 text-center ">   
                    <a href="acne.php">
                        <img src="../_images/acne.jpg" alt=" service">
                        <label>Acne Treatment</label>
                    </a>
                </div>
                <div class="col-md-4 col-lg-4 col-xs-12 text-center ">   
                    <a href="waxing.php">
                        <img src="../_images/waxing.jpg" alt="service">
                        <label>Waxing</label>
                    </a>
                </div>
                <div class="col-md-4 col-lg-4 col-xs-12 text-center">   
                    <a href="massage-reduction.php">
                        <img src="../_images/massage-reduction.jpg" alt=" service">
                        <label>Massage reduction</label>
                    </a>
                </div> 
                <div class="col-md-4 col-lg-4 col-xs-12 text-center ">   
                    <a href="artifitial-sunbathing.php">
                        <img class="sun"src="../_images/glow.jpg" alt=" service">
                        <label>Natural Glow </label>
                    </a>
                </div>
            </div>
            <div class="row space1">
                <div class="col-md-5 space"> </div>  
                <p class="sub-menu">   Our social media</p>
            </div>  
            <div class="row">
                <div class="col-md-5 sp1"> </div>
                <footer id="rodape">
                    <p> Copyright 2020 - by Lilian Lourenco <br />
                    <p> <a  href="https://www.facebook.com/Divah-Natural-106912804464078">Facebook</a><a  href="https://www.instagram.com/divahenatural/">Instagram</a></p>
                </footer>
            </div>
        </div>
    </body>
</html></html>