<?php
    //include required phpmailer files
   require_once 'includes/PHPMailer.php';
   require_once 'includes/SMTP.php';
   require_once 'includes/Exception.php';
   
   //Define name spaces
            
   use PHPMailer\PHPMailer\PHPMailer;
   use PHPMailer\PHPMailer\SMTP;
   use PHPMailer\PHPMailer\Exception;
class Funcao {
    private $objmail;
    public function __construct() {
       $this->objmail = new PHPMailer();
    }

    public function treatCharacter($vlr, $tipo) {
        switch ($tipo) {
            case 1: $rst = utf8_decode($vlr);
                break;
            case 2: $rst = utf8_encode($vlr);
                break;
            case 3: $rst = htmlentities($vlr, ENT_QUOTES, "ISO-8859-1");
                break;
        }
        return $rst;
    }

    public function CurrentDate($tipo) {
        switch ($tipo) {
            case 1: $rst = date("Y-m-d");
                break;
            case 2: $rst = date("Y-m-d H:i:s");
                break;
            case 3: $rst = date("d/m/Y");
                break;
        }
        return $rst;
    }

    public function base64($vlr, $tipo) {
        switch ($tipo) {
            case 1: $rst = base64_encode($vlr);
                break;
            case 2: $rst = base64_decode($vlr);
                break;
        }
        return $rst;
    }
    function sendMail($de,$para,$mensagem,$assunto)
{
    require_once('phpmailer/class.phpmailer.php');
    $mail = new PHPMailer(true);

    $mail->IsSMTP();
    try {
      $mail->SMTPAuth   = true;                 
      $mail->Host       = 'smtp.divahhnatural.com';     
      $mail->SMTPSecure = "tls";                #remova se nao usar gmail
	  $mail->Port       = 587;                  #remova se nao usar gmail
      $mail->Username   = 'divahhnatural@gmail.com'; 
      $mail->Password   = 'mudar1234';
      $mail->AddAddress($para);
	  $mail->AddReplyTo($de);
      $mail->SetFrom($de);
      $mail->Subject = $assunto;
      $mail->MsgHTML($mensagem);
      $mail->Send();     
      $envio = true;
    } catch (phpmailerException $e) {
      $envio = false;
    } catch (Exception $e) {
      $envio = false;
    }
    return $envio;
}

}

?>
