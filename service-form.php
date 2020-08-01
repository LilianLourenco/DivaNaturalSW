<?php
// Chama as conexões externas
require_once 'backend/Connection.php';
require_once 'backend/Person.php';
require_once 'backend/Funcao.php';
require_once 'backend/Service.php';

// Cria os objetos para as funções
$objfc = new Funcao();
$objserv = new Service();

// (if (isset($_POST['btRegister'])) {) Recebe os dados dos campos passados pelo formulário via POST.
// (if ($objserv->queryInsert($_POST) == 'ok') { ). Envia os dados para a Função QueryInsert da página Service.php
if (isset($_POST['btRegister'])) {
    if ($objserv->queryInsert($_POST) == 'ok') {
     header('location: service-form.php');
        
    } else {
        echo '<script type="text/javascript">alert("Erro em cadastrar");</script>';
    }
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
            <h1> Register</h1>
            
            
            <!-- 
            (action="service-form.php" ) Formulario envia os dados para a página que está no action="".
            (method="POST") Envia os dados via URL            
            -->
            <form name="formCad_service" method="POST" action="service-form.php">
            <label>Service Name:</label>
            <input type="text" name="servname" required="" value="" >
            
            <label>Service Type:</label>            
            <input type="text" name="type_serv" required="" value="">
            
            <label>Minimun session:</label>
            <input type="number" name="session_min" required="" value="" >
            <label>Maxim:</label>
            
            
            <input type="number" name="session_max" value="" >
            
            <label></label>
            <input type="submit" name="btRegister" value="Register">
            
            
        </form>
        </div>
        </div>
        </>    
    </body>
</html>
