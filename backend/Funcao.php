<?php
    require_once 'PHPMailer-master/PHPMailerAutoload.php';

class Funcao {

    public function __construct() {
       $ojtmail = new PHPMailer();
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

    public function sendEmail($dados) {
        $this->objmail->IsSMTP();#security protocol SMTP
        $this->objmail->SMTPAuth = true;
        $this->objmail->SMTPSecure = 'tls';
        $this->objmail->Port = 587;
        $this->objmail->Host = 'smtpt.dominio.com.br';
        $this->objmail->Username = 'email@dominio.com.br';
        $this->objmail->Password = 'senha12345';
        $this->objmail->ContentType = 'text/html; charset=utf-8';
        $this->objmail->SetFrom('email@dominio.com.br', 'please do not answer');
        $this->objmail->AddAddress('Divahenatural@gmail.com', 'test seding email');
        $this->objmail->Subject = '' . $this->tratarCaracter($dados['subject'], 1) . '';

        $html = '<p><strong>Nome:</strong> ' . $this->tratarCaracter($dados['name'], 1) . '<br>';
        $html .= '<strong>E-mail:</strong> ' . $dados['email'] . '<br>';
        $html .= '<strong>Assunto:</strong> ' . $this->tratarCaracter($dados['subject'], 1) . '<br>';
        $html .= '<strong>Mensagem:</strong><br>';
        $html .= $this->tratarCaracter($dados['mensagem'], 1) . '</p>';

        $this->objmail->MsgHTML($html);

        if (!$this->objmail->Send()) {
            echo "Mailer Error: " . $this->objmail->ErrorInfo;
        } else {
            echo "Mensagem enviada";
            
        }
    }

}

?>
