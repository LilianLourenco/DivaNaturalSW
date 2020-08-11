<?php
require_once '../backend/Service.php';
require_once '../backend/Funcao.php';
require_once '../backend/Connection.php';
require_once '../backend/Staff.php';
require_once '../backend/Customer.php';
require_once '../backend/Book.php';

$objcustomer = new Customer();
$objstaff = new Staff();
$objfc = new Funcao();
$objserv = new Service();
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
<?php


$objBook = new Book();


if(isset($_POST['btnBook'])){
     if($objBook->insert($_POST)== 'ok'){
         header("Location: succefully-book.php ");
         
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
                        
                        <a href="form-subscribe.php"><label class="subs">Logout</label></a>
                        
                    </div>       
                </div> 
            </nav>

            <div class="row service">
                <form name="formCheckBook" action="CheckBook.php" method="post" class="margin">
                <div class="col-md-5 menu"></br></br></br>
                    <Label>Name   </Label>
                    <input type="text" name="idcustomer" value="<?php echo $_SESSION['idcustomer']; ?>" >
                    <input type="text" name="name" value="<?php echo $_SESSION['name']; ?> <?php echo $_SESSION['surname']; ?>" readonly="disable" >

                    <label for="service">Choose a service:</label>
                    <select name="idserv">
                        <option>Select a service</option>
                            <?php foreach ($objserv->querySelect() as $rst) { ?>
                    <div class="product">
                        <div class="nome">
                            
                            <option value="<?=$rst['idserv'] ?>"><?=$rst['idserv'] ?> - <?=$objfc->treatCharacter($rst['servname'], 2) ?></option></selct></div>             
 </div>
                <?php } ?>
                        </select></br>
                        
                        <label for="Professional">Choose a Professional:</label>
                    <select name="idstaff">
                        <option>Select a Professional</option>
                            <?php foreach ($objstaff->querySelect() as $rst) { ?>
                    <div class="product">
                        <div class="nome">
                            
                            <option value="<?=$rst['idstaff']?>"><?=$rst['idstaff']?> - <?=$objfc->treatCharacter($rst['name'], 2) ?></option></selct></div>             
 </div>
                <?php } ?>
                        </select></br>
                    <Label>Date</Label>
                    <input type="date" name="datebook">
                    <Label>Time</Label>
                    
                    <Select name="times">
                        
                        <option> Available Time</option>
                        <option value="1">8:00 - 9:00</option>
                        <option value="2">9:00 - 10:00</option>
                        <option value="3">10:00 - 11:00</option>
                        <option value="4">11:00 - 12:00</option>
                        <option value="5">13:00 - 14:00</option>
                        <option value="6">14:00 - 15:00</option>
                        <option value="7">15:00 - 16:00</option>
                        <option value="8">16:00 - 17:00</option>
                    
                    </select></br>
                 <input type="submit" name="btnBook" value="Book">
                    
                    

                </div>
                
            </div>
            </form>

            </div>
        </div>
    </body>
    <html>