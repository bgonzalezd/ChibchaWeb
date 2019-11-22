<?php

class ServicioCorreo{


	public function __construct() {
		$this->host = "ssl://smtp.gmail.com";
		$this->username = "chibchawebhosting@gmail.com";
		$this->password = "chibchawebBGCJ";
		$this->port = "465";
		$this->email_from = "chibchawebhosting@gmail.com";
		$this->email_subject = "Ayuda al usuario" ;
    }

	function enviarCorreo($to, $email_body){
		iconv_set_encoding("internal_encoding", "UTF-8");
		error_reporting(E_ALL ^ E_NOTICE ^ E_DEPRECATED ^ E_STRICT);

		set_include_path("." . PATH_SEPARATOR . ($UserDir = dirname($_SERVER['DOCUMENT_ROOT'])) . "/pear/php" . PATH_SEPARATOR . get_include_path());
		require_once "Mail.php";
		require_once 'Mail/mime.php';
		$mime = new Mail_mime(array('eol' => "\n"));
		$file = '../images/logo_color.png';
		$mime_params = array(
		  'text_encoding' => '7bit',
		  'text_charset'  => 'UTF-8',
		  'html_charset'  => 'UTF-8',
		  'head_charset'  => 'UTF-8'
		);
		$headers = array ('From' => $this->email_from, 'To' => $to, 'Subject' => $this->email_subject, 'Content-Type'  => 'text/html; charset=UTF-8');

		$mime->setHTMLBody($email_body);
		$mime->addAttachment($file, 'image/png');

		$body = $mime->get($mime_params);
		$headers = $mime->headers($headers);

		$smtp = Mail::factory('smtp', array ('host' => $this->host, 'port' => $this->port, 'auth' => true, 'username' => $this->username, 'password' => $this->password));
		$mail = $smtp->send($to, $headers, utf8_decode($body));


		if (PEAR::isError($mail)) {
			return ("<p>" . $mail->getMessage() . "</p>");
		} else {
			return "El mensaje fue enviado correctamente";
		}
	}
	function enviarCorreoP($subject,$to, $email_body){
		iconv_set_encoding("internal_encoding", "UTF-8");
		error_reporting(E_ALL ^ E_NOTICE ^ E_DEPRECATED ^ E_STRICT);

		set_include_path("." . PATH_SEPARATOR . ($UserDir = dirname($_SERVER['DOCUMENT_ROOT'])) . "/pear/php" . PATH_SEPARATOR . get_include_path());
		require_once "Mail.php";
		require_once 'Mail/mime.php';
		$mime = new Mail_mime(array('eol' => "\n"));
		$file = '../images/logo_color.png';
		$mime_params = array(
		  'text_encoding' => '7bit',
		  'text_charset'  => 'UTF-8',
		  'html_charset'  => 'UTF-8',
		  'head_charset'  => 'UTF-8'
		);
		$headers = array ('From' => $this->email_from, 'To' => $to, 'Subject' => $subject, 'Content-Type'  => 'text/html; charset=UTF-8');

		$mime->setHTMLBody($email_body);
		$mime->addAttachment($file, 'image/png');

		$body = $mime->get($mime_params);
		$headers = $mime->headers($headers);

		$smtp = Mail::factory('smtp', array ('host' => $this->host, 'port' => $this->port, 'auth' => true, 'username' => $this->username, 'password' => $this->password));
		$mail = $smtp->send($to, $headers, utf8_decode($body));


		if (PEAR::isError($mail)) {
			return ("<p>" . $mail->getMessage() . "</p>");
		} else {
			return "El mensaje fue enviado correctamente";
		}
	}

}


?>