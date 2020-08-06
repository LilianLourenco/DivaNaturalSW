





<?php
require_once 'backend/Service.php';
require_once 'backend/Funcao.php';
require_once 'backend/Connection.php';

$objserv = new Service();
$objfc = new Funcao();

if (isset($_POST['btCadastrar'])) {
    if ($objserv->queryInsert($_POST) == 'ok') {
        header('location: service-form.php');
    } else {
        echo '<script type="text/javascript">alert("Erro em cadastrar");</script>';
    }
}

if (isset($_POST['btAlterar'])) {
    if ($objserv->queryUpdate($_POST) == 'ok') {
        header('location: ?acao=edit&serv=' . $objfc->base64($_POST['serv'], 1));
    } else {
        echo '<script type="text/javascript">alert("Erro em alterar");</script>';
    }
}




if (isset($_GET['acao'])) {
    switch ($_GET['acao']) {
        case 'edit': $serv = $objserv->querySeleciona($_GET['serv']);
            break;
        case 'search': $serv = $objserv->querySeleciona($_GET['serv']);
           
        case 'delet':
            if ($objserv->queryDelete($_GET['serv']) == 'ok') {
                echo '<script type="text/javascript">alert("Successfuly deleted");</script>';
                header('location: service-form.php');
            } else {
                echo '<script type="text/javascript">alert("Erro em deletar");</script>';
            }
            break;
    }
}
?>
<!DOCTYPE HTML>
<html lang="pt-br">
    <head>
        <meta charset="utf-8">
        <title>Registration Form</title>
        <link href="css/styleproduct.css" rel="stylesheet" type="text/css" media="all">
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link href="css/style.css" rel="stylesheet" type="text/css" />
        <link href="css/control.css" rel="stylesheet" type="text/css" />
        <link href= "css/bootstrap.min.css" rel= "stylesheet" type= "text/css"/>
        <script type="tex/javascript"src="js/bootstrap.min.js"></script>
        <script type="tex/javascript"src="js/jquery-3.4.1.min"></script>

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
                            <a href="service.php"><li>Service</li></a> 
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




            <div id="lista" class="margin">
                <?php foreach ($objserv->querySelect() as $rst) { ?>
                    <div class="product">
                        <div class="nome"><?= $objfc->treatCharacter($rst['servname'], 2) ?></div>
                        

                        <div class="editar"><a href="?acao=edit&serv=<?= $objfc->base64($rst['idserv'], 1) ?>" title="Update data"><img src="_images/ico-editar.png" width="16" height="16" alt="Update"></a></div>
                        <div class="excluir"><a href="?acao=delet&serv=<?= $objfc->base64($rst['idserv'], 1) ?>" title="Delete this data"><img src="_images/ico-excluir.png" width="16" height="16" alt="Delete"></a></div>
                    </div>
                <?php } ?>
            </div>
            <div class="col-lg-12 formServ">   
            <div id="formulario">
                
                
                <form name="formCad" action="service-form.php" method="post" class="margin">
                    <label>Service Name: </label><br>
                    <input type="text" name="servname" required="required" value="<?= $objfc->treatCharacter(isset($serv['servname']) ? ($serv['servname']) : (''), 2) ?>"><br>
            <label>Service Type:</label>            
            <input type="text" name="type_serv" required="" value="<?= $objfc->treatCharacter(isset($serv['type_serv']) ? ($serv['type_serv']) : (''), 2) ?>"><br>
            
            <label>Minimun session:</label>
            
            <input type="text" name="session_min" required="" value="<?= $objfc->treatCharacter(isset($serv['session_min']) ? ($serv['session_min']) : (''), 2) ?>"><br>
            <label>Maxim:</label>

            <input type="number" name="session_max" value="<?= $objfc->treatCharacter(isset($serv['session_max']) ? ($serv['session_max']) : (''), 2) ?>"><br>
            
                    <br>
                    <input type="submit" name="<?= (isset($_GET['acao']) == 'edit') ? ('btAlterar') : ('btCadastrar') ?>" value="<?= (isset($_GET['acao']) == 'edit') ? ('Alterar') : ('Cadastrar') ?>">
                    <input type="hidden" name="serv" value="<?= (isset($serv['idserv'])) ? ($objfc->base64($serv['idserv'], 1)) : ('') ?>">
                </form>
            </div>
            </div>

        </div>

    </body>
</html>
