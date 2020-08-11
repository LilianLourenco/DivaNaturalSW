<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {


    $erro = '';
    if (!isset($_POST['text_name ']) ||
            !isset($_POST['text_email ']) ||
            !isset($_POST['text_subject']) ||
            !isset($_POST['text_message '])) {
        $erro = 'Fill all field, please! ';
    }

   # $name = $_POST['text_name'];
    $email = $_POST['email'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];
    if (empty($erro)) {
        //chech if the email is valide
        if (!filter_var(email, FILTER_VALIDATE_EMAIL)) {
            $erro = 'Email invalid';
        }
    }
    //send email
    if (empty($erro)) {
        include ('send_email.php');
    }
}
?>
<!DOCTYPE html>

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
                        <a hrsef="aboutus.php" ><li>About us</li> </a>
                    </ul>

                </div>
                <div class="col-md-4 login">   

                    <a href="index.php"><label class="subs">Logout</label></a>

                </div>       
            </div> 
        </nav>

        <div class="row service">
            <div class="col-md-5 menu">
                <form class="cont" action="" method="POST" >
<!--                    <label>Name:</label><br>
                    <input type="text" name="name" placeholder="Type Your name" required="required"><br>-->
                    <label>Email:</label><br>
                    <input type="email" name="email" required="required" placeholder="Type your email" pattern="^[a-z0-9._-]{2,}@[a-z0-9-]{2,}.[a-z.]{2,}$"><br>
                    <label>Subject:</label><br>
                    <input type="text" name="subject" placeholder="Subject" required="required"><br>
                    <label>Message:</label><br>
                    <textarea name="message" required="required" cols="60" rows="6"></textarea>
                    <br><br>
                    <input type="submit" name="btSend" value="Send">  


                </form>


                <?php if (!isset($error)): ?>
                    
                <?php endif; ?>
            </div>
            <div class="col-md-3 menu"> 
            </div>
            <div class="col-md-4 menu">   

            </div>
        </div>

    </div>

</body>
</html>