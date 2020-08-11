<?php
require_once '../backend/Product.php';
require_once '../backend/Stock.php';
require_once '../backend/Funcao.php';
require_once '../backend/Connection.php';

$objstk = new Stock();
$objfc = new Funcao();

if (isset($_POST['btregister'])) {
    if ($objstk->queryInsert($_POST) == 'ok') {
        header('location: stock-form.php');
    } else {
        echo '<script type="text/javascript">alert("Error in Register");</script>';
    }
}

if (isset($_POST['btUpdate'])) {
    if ($objstk->queryUpdate($_POST) == 'ok') {
        header('location: ?acao=edit&stock=' . $objfc->base64($_POST['stock'], 1));
    } else {
        echo '<script type="text/javascript">alert("Error in  update");</script>';
    }
}

if (isset($_GET['acao'])) {
    switch ($_GET['acao']) {
        case 'edit': $stock = $objstk->querySeleciona($_GET['stock']);
            break;
        case 'delet':
            if ($objstk->queryDelete($_GET['stock']) == 'ok') {
                header('location: product-form.php');
            } else {
                echo '<script type="text/javascript">alert("Error in delete");</script>';
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

                        <a href="form-subscribe.php"><label class="subs">Logout</label></a>

                    </div>       
                </div> 
            </nav>




            <div id="lista" class="margin">
                <?php foreach ($objstk->querySelect() as $rst) { ?>
                    <div class="product">
                        <div class="nome"><?= $objfc->treatCharacter($rst['name'], 2) ?></div>
                        <div class="editar"><a href="?acao=edit&prod=<?= $objfc->base64($rst['idproduct'], 1) ?>" title="Update data"><img src="_images/ico-editar.png" width="16" height="16" alt="Update"></a></div>
                        <div class="excluir"><a href="?acao=delet&prod=<?= $objfc->base64($rst['idProduct'], 1) ?>" title="Delete data"><img src="_images/ico-excluir.png" width="16" height="16" alt="Delete"></a></div>
                    </div>
                <?php } ?>
            </div>
            <div class="col-lg-12 formProd">   
            <div id="formulario">
                
                
                <form name="formCad" action="stock.php" method="post" class="margin">
                    <label>Amount: </label><br>
                    <input type="number" name="name" required="required" value="<?= $objfc->treatCharacter(isset($stock['amount']) ? ($stock['amount']) : (''), 2) ?>"><br>
                    <label>Min: </label><br>
                    <input type="number" name="min" required="required"  value="<?= $objfc->treatCharacter((isset($stock['min'])) ? ($stock['min']) : (''), 2) ?>"><br>
                    <label>Max: </label><br>
                    <input type="number" name="max" required="required"  value="<?= $objfc->treatCharacter((isset($stock['max'])) ? ($stock['max']) : (''), 2) ?>"><br>
                    <br>
                    <input type="submit" name="<?= (isset($_GET['acao']) == 'update') ? ('btUpdate') : ('btregister') ?>" value="<?= (isset($_GET['acao']) == 'update') ? ('Update') : ('Register') ?>">
                    <input type="hidden" name="stock" value="<?= (isset($stock['idproduct'])) ? ($objfc->base64($stock['idproduct'], 1)) : ('') ?>">
                </form>
            </div>
            </div>

        </div>

    </body>
</html>
