<?php
namespace Apiology\Resources;

use Apiology\Classes\{HTTP};

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;


class Test extends HTTP {
	public function main()
	{
		if($_SERVER['REQUEST_METHOD'] == 'GET')
		{
			echo json_encode("OK YES", JSON_PRETTY_PRINT);
		}
	}

	public function sample(){
		echo 'I am at Sample';
	}

	public function sampleTwo()
 	{

			foreach(func_get_args() as $value){
				$v = $value;
			}

			var_dump($v);
 		// if(func_num_args() < 1)
 		// {
 		// 	parent::get_header(400, "I don't really know what you are asking me for");
 		// }
 		// else
 		// {
 		// 	parent::get_header(200, null);

		// 	$this->http_response["status_code"] = 200;
		// 	$this->http_response["message"] = "JSON Method Message";

		// 	foreach (func_get_args() as $value) {
 		// 		$this->http_response["parameters"]= $value; 
 		// 	}

		// 	echo json_encode($this->http_response, JSON_PRETTY_PRINT);
 		// }

 	}

	 public function testmail()
	 {
		$mail = new PHPMailer(true);

		try {
				//Server settings
				$mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
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
				$mail->addAddress('weblightfog@gmail.com');               //Name is optional
				$mail->addReplyTo('jmr@netzaj.net', 'Information');
				$mail->addCC('jmarquezrave.cl@gmail.com');
				$mail->addBCC('jorge@bytelab.cl');
		
				//Attachments
				// $mail->addAttachment('../Android-Linux.png');         //Add attachments
				// $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name
		
				//Content
				$mail->isHTML(true);                                  //Set email format to HTML
				$mail->Subject = 'Here is the subject';
				$mail->Body    = 'This is the HTML message body <b>in bold!</b>';
				$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
		
				$mail->send();
				echo 'Message has been sent';
		} catch (Exception $e) {
				echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
		}
	 }

}