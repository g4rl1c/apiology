<?php
namespace Apiology\Resources;

use Apiology\Classes\{HTTP};

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;


class Contact extends HTTP {

	private $arrayPost = array();

	public function main()
	{
		if($_SERVER['REQUEST_METHOD'] === 'GET')
		{
			print(json_encode("OK YES", JSON_PRETTY_PRINT));
		} else if($_SERVER['REQUEST_METHOD'] === 'POST'){
			$_POST = json_decode(file_get_contents("php://input"),true);
			self::contactForm(htmlspecialchars($_POST["name"]), htmlspecialchars($_POST["email"]), htmlspecialchars($_POST["message"]));
		}
	}

	private function contactForm($_name, $_email, $_message){

		$mail = new PHPMailer(true);

		try {
				//Server settings
				$mail->SMTPDebug = SMTP::DEBUG_OFF;                      //Enable verbose debug output
				$mail->isSMTP();                                            //Send using SMTP
				$mail->Host       = 'mail.bytelab.cl';                     //Set the SMTP server to send through
				$mail->SMTPAuth   = true;                                   //Enable SMTP authentication
				$mail->Username   = 'bitsencontacto@bytelab.cl';                     //SMTP username
				$mail->Password   = 'sgAB1D)o,OkM64Iy+]';                               //SMTP password
				$mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;         //Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
				$mail->Port       = 465;                                    //TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above
		
				//Recipients
				$mail->setFrom('bitsencontacto@bytelab.cl', 'Bits en Contacto');
				$mail->addAddress('jmarquezrave@gmail.com', 'Jorge Marquez');     //Add a recipient
				$mail->addReplyTo('jmr@netzaj.net', 'Information');
				$mail->addCC('jmr@netzaj.net');
		
				//Attachments
				// $mail->addAttachment('../Android-Linux.png');         //Add attachments
				// $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name
		
				//Content
				$mail->isHTML(true);                                  //Set email format to HTML
				$mail->Subject = 'Mensaje desde el Formulario de Contacto de la Web';
				$mail->Body    = '<h3>Este es un mensaje desde el Formulario de Contacto de la Web</h3>
				<p>Nombre: <strong>' . $_name . '<strong></p><p>Email: <strong>' . $_email . '<strong></p><p>Mensaje: <strong>' . $_message . '<strong></p>';
				$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
		
				$mail->send();
				
				$this->arrayPost['status_code'] = 202;
				$this->arrayPost['response'] = "The request has been accepted";
				parent::setHeader($this->arrayPost['status_code']);
				print(json_encode($this->arrayPost, JSON_PRETTY_PRINT));

		} catch (Exception $e) {
				// echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
				$this->arrayPost['status_code'] = 400;
				$this->arrayPost['response'] = "Message could not be sent";
				parent::setHeader($this->arrayPost['status_code']);
				print(json_encode($this->arrayPost, JSON_PRETTY_PRINT));
		}


	}
}