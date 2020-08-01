<?php
require_once 'backend/Product.php';
require_once 'backend/Funcao.php';
require_once 'backend/Connection.php';

$objprod = new Product();
$objfc = new Funcao();

if (isset($_POST['btCadastrar'])) {
    if ($objprod->queryInsert($_POST) == 'ok') {
        header('location: product-form.php');
    } else {
        echo '<script type="text/javascript">alert("Erro em cadastrar");</script>';
    }
}

if (isset($_POST['btAlterar'])) {
    if ($objprod->queryUpdate($_POST) == 'ok') {
        header('location: ?acao=edit&prod=' . $objfc->base64($_POST['prod'], 1));
    } else {
        echo '<script type="text/javascript">alert("Erro em alterar");</script>';
    }
}




if (isset($_GET['acao'])) {
    switch ($_GET['acao']) {
        case 'edit': $prod = $objprod->querySeleciona($_GET['prod']);
            break;
        case 'search': $prod = $objprod->querySeleciona($_GET['prod']);
           
        case 'delet':
            if ($objprod->queryDelete($_GET['prod']) == 'ok') {
                header('location: product-form.php');
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
                <?php foreach ($objprod->querySelect() as $rst) { ?>
                    <div class="product">
                        <div class="nome"><?= $objfc->treatCharacter($rst['name'], 2) ?></div>
                        <div class="editar"><a href="?acao=edit&prod=<?= $objfc->base64($rst['idProduct'], 1) ?>" title="Editar dados"><img src="_images/ico-editar.png" width="16" height="16" alt="Editar"></a></div>
                        <div class="excluir"><a href="?acao=delet&prod=<?= $objfc->base64($rst['idProduct'], 1) ?>" title="Excluir esse dado"><img src="_images/ico-excluir.png" width="16" height="16" alt="Excluir"></a></div>
                    </div>
                <?php } ?>
            </div>
            <div class="col-lg-12 formProd">   
            <div id="formulario">
                
                
                <form name="formCad" action="product-form.php" method="post" class="margin">
                    <label>Name: </label><br>
                    <input type="text" name="name" required="required" value="<?= $objfc->treatCharacter(isset($prod['name']) ? ($prod['name']) : (''), 2) ?>"><br>
                    <label>Description: </label><br>
                    <input type="description" name="description" required="required"  value="<?= $objfc->treatCharacter((isset($prod['description'])) ? ($prod['description']) : (''), 2) ?>"><br>

                    <br>
                    <input type="submit" name="<?= (isset($_GET['acao']) == 'edit') ? ('btAlterar') : ('btCadastrar') ?>" value="<?= (isset($_GET['acao']) == 'edit') ? ('Alterar') : ('Cadastrar') ?>">
                    <input type="hidden" name="prod" value="<?= (isset($prod['idProduct'])) ? ($objfc->base64($prod['idProduct'], 1)) : ('') ?>">
                </form>
            </div>
            </div>

        </div>

    </body>
</html>
