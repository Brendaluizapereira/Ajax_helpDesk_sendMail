<?php

	require "./bibliotecas/PHPmailer/Exception.php";
	require "./bibliotecas/PHPmailer/OAuth.php";
	require "./bibliotecas/PHPmailer/PHPMailer.php";
	require "./bibliotecas/PHPmailer/POP3.php";
	require "./bibliotecas/PHPmailer/SMTP.php";

	use PHPMailer\PHPMailer\PHPMailer;
	use PHPMailer\PHPMailer\Exception;


	//print_r($_POST);

	class Mensagem {
		private $para = null;
		private $assunto = null;
		private $mensagem = null;

		public function __get($atributo) {
			return $this->$atributo;
		}

		public function __set($atributo, $valor) {
			$this->$atributo = $valor;
		}

		public function mensagemValida() {
			if(empty($this->para) || empty($this->assunto) || empty($this->mensagem)) {
				return false;
			} return true;
		}
	}

	$mensagem = new Mensagem();

	$mensagem-> __set('para', $_POST['para']);
	$mensagem-> __set('assunto', $_POST['assunto']);
	$mensagem-> __set('mensagem', $_POST['mensagem']);

	print_r($mensagem);


	if(!$mensagem->mensagemValida()) {
		echo 'Mensagem não é válida';
		//die();
	} 

$mail = new PHPMailer(true);
try {
    //Server settings
    $mail->SMTPDebug = 2;                                 // Enable verbose debug output
    $mail->isSMTP();                                      // Set mailer to use SMTP
    $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
    $mail->SMTPAuth = true;                               // Enable SMTP authentication
    $mail->Username = '';                 // SMTP username
    $mail->Password = '';                           // SMTP password
    $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
    $mail->Port = 587;                                    // TCP port to connect to

    //Recipients
    $mail->setFrom('', 'Brenda enviadora');
    $mail->addAddress($mensagem->__get('para'));     // Add a recipient
    //$mail->addReplyTo('info@example.com', 'Information');
    //$mail->addCC('cc@example.com');
    //$mail->addBCC('bcc@example.com');

    //Attachments
    //$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
    //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

    //Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = $mensagem->__get('assunto');
    $mail->Body    = $mensagem->__get('mensagem');
    $mail->AltBody = 'É necessário utilizar um client que suporte HTML para ter acesso total ao conteúdo desta mensagem';

    $mail->send();
    echo 'Email enviado com sucesso!';
} catch (Exception $e) {
    echo 'Não foi possível enviar este e-mail. Por favor tente novamente.';
    echo 'Detalhes do erro: ' . $mail->ErrorInfo;
}

?>
