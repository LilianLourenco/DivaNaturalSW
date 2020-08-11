<?php
require_once '../backend/StaffService.php';
require_once '../backend/Funcao.php';
require_once '../backend/Connection.php';

$objserv = new StaffService ();
$objfc = new Funcao();

if (isset($_POST['btCadastrar'])) {
    if ($objserv->queryInsert($_POST) == 'ok') {
        header('location: staff-service.php');
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
                header('location: staff-service.php');
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
        <title>Formulário de cadastro</title>
        <link href="../css/styleproduct.css" rel="stylesheet" type="text/css" media="all">
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link href="../css/style.css" rel="stylesheet" type="text/css" />
        <link href="../css/control.css" rel="stylesheet" type="text/css" />
        <link href= "../css/bootstrap.min.css" rel= "stylesheet" type= "text/css"/>
        <script type="../tex/javascript"src="js/bootstrap.min.js"></script>
        <script type="../tex/javascript"src="js/jquery-3.4.1.min"></script>

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
                            <a href="manager-menu.php"><li>Service</li></a> 
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
                        <div class="nome"><?= $objfc->treatCharacter($rst['nameserv'], 2) ?></div>
                        <div class="editar"><a href="?acao=edit&serv=<?= $objfc->base64($rst['id_servstaff'], 1) ?>" title="More information"><img src="_images/search.png" width="16" height="16" alt="Editar"></a></div>
                        <div class="editar"><a href="?acao=edit&serv=<?= $objfc->base64($rst['id_servstaff'], 1) ?>" title="Editar dados"><img src="_images/ico-editar.png" width="16" height="16" alt="Editar"></a></div>
                        <div class="excluir"><a href="?acao=delet&serv=<?= $objfc->base64($rst['id_servstaff'], 1) ?>" title="Excluir esse dado"><img src="_images/ico-excluir.png" width="16" height="16" alt="Excluir"></a></div>
                    </div>
                <?php } ?>
            </div>
            <div class="col-lg-12 formProd">   
            <div id="formulario">
                
                
                <form name="formCad" action="staff-service.php" method="post" class="margin">
                    <label>Name Service: </label><br>
                    <input type="text" name="nameserv" required="required" value="<?= $objfc->treatCharacter(isset($serv['nameserv']) ? ($serv['nameserv']) : (''), 2) ?>"><br>
                    <label>Service ID: </label><br>
                    <input type="text" name="idserv" required="required"  value="<?=$objfc->treatCharacter((isset($serv['idserv'])) ? ($serv['idserv']) : (''), 2) ?>"><br>
                    
                    <label>Staff Name: </label><br>
                    <input type="text" name="namestaff" required="required"  value="<?=$objfc->treatCharacter((isset($serv['namestaff'])) ? ($serv['namestaff']) : (''), 2) ?>"><br>
                    
                    <label>Staff ID: </label><br>
                    <input type="text" name="idstaff" required="required"  value="<?=$objfc->treatCharacter((isset($serv['idstaff'])) ? ($serv['idstaff']) : (''), 2) ?>"><br>
                    
                   
                    <br>
                    <input type="submit" name="<?= (isset($_GET['acao']) == 'edit') ? ('btAlterar') : ('btCadastrar') ?>" value="<?= (isset($_GET['acao']) == 'edit') ? ('Alterar') : ('Cadastrar') ?>">
                    <input type="hidden" name="serv" value="<?= (isset($serv['id_servstaff'])) ? ($objfc->base64($serv['id_servstaff'], 1)) : ('') ?>">
                </form>
            </div>
            </div>

        </div>

    </body>
</html>
