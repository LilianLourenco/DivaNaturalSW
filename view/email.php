<?php 
include "../backend/Funcao.php";
$nome=$_POST['name'];
$email=$_POST['email'];

$objfunc = new Funcao();

$objfunc->sendEmail($_POST);

if(strlen($_POST['nome']))
{
    if(sendMail($_POST['email'],'divahhnatural@gmail.com', $_POST['nome'].'<BR/><BR/>'.'MENSAGEM'.'<BR/>'.$_POST['mensagem'], 'Formul�rio de contato - Servidor Inform�tica'))
    {
        echo $_POST['nome']." "."sua mensagem foi enviada com sucesso!";
		echo '<br/>';
		echo "Voc� vai receber uma c�pia desta mensagem em seu email!";
		echo '<br/>';
		echo "Em breve entraremos em contato!";
		sendMail($_POST['email'],$email, $_POST['nome'].'<BR/><BR/>'.'MENSAGEM'.'<BR/>'.$_POST['mensagem'], 'ENC: Formul�rio de contato - Servidor Inform�tica');
    }
    else
    {
        echo $_POST['nome']." "."desculpe mas ocorreu um erro ao enviar";
		echo '<br/>';
		echo "Por favor tente novamente";
    }
    echo "<meta http-equiv=refresh content=3;URL=index.php>";
    exit();
}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="iso-8859-1">
	<link rel="stylesheet" href="style.css" type="text/css" media="all" />
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
</head>
<body>
	<h2>Formul�rio de contato - Servidor Inform�tica</h2>
	
    <form method="post" id="formulario_contato" onsubmit="validaForm(); return false;" class="form">
		<p class="name">
            <label for="name">Nome</label>
            <input type="text" name="nome" id="nome" placeholder="Seu Nome" />
		</p>
		
		<p class="email">
            <label for="email">E-mail</label>
            <input type="text" name="email" id="email" placeholder="mail@exemplo.com.br" />
		</p>		
	
		<p class="text">
            <label for="mensagem">Mensagem</label>
            <textarea name="mensagem" id="mensagem" placeholder="Escreva sua mensagem" /></textarea>
		</p>
		
		<p class="submit">
            <input type="submit" value="Enviar" />
		</p>
	</form>
    <script type="text/javascript">
        function validaForm()
        {
            erro = false;
            if($('#nome').val() == '')
            {
                alert('Voc� precisa preencher o campo Nome');erro = true;
            }
            if($('#email').val() == '' && !erro)
            {
                alert('Voc� precisa preencher o campo E-mail');erro = true;
            }
            if($('#mensagem').val() == '' && !erro)
            {
                alert('Voc� precisa preencher o campo Mensagem');erro = true;
            }
            
            //se nao tiver erros
            if(!erro)
            {
                $('#formulario_contato').submit();
            }
        }
    </script>
</body>
</html>