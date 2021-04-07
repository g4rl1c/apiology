<?php
namespace Apiology\Resources;

use Apiology\Classes\{HTTP};

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;


class Email extends HTTP {

	private $http_response = array();

	public function main()
	{
		if($_SERVER['REQUEST_METHOD'] === 'GET')
		{
			// Message in JSON
			parent::jsonResponse(200, 'This test resource exists!');

		} else if($_SERVER['REQUEST_METHOD'] === 'POST'){

			$_POST = json_decode(file_get_contents("php://input"),true);
			parent::jsonResponse(202, htmlspecialchars($_POST["key"]));

		}
	}

	private function sendEmail($_name, $_email, $_message){

		$mail = new PHPMailer(true);

		try {
				//Server settings
				$mail->SMTPDebug = SMTP::DEBUG_OFF; //Enable verbose debug output
				$mail->isSMTP(); //Send using SMTP
				$mail->Host       = 'SMTP_SERVER'; //Set the SMTP server to send through
				$mail->SMTPAuth   = true; //Enable SMTP authentication
				$mail->Username   = 'SMTP_USER'; //SMTP username
				$mail->Password   = 'SMTP_PASSWORD';  //SMTP password
				$mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;//Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
				$mail->Port       = 465;//TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above
		
				//Recipients
				$mail->setFrom('EMAIL_FROM', 'EMAIL USER');
				$mail->addAddress('EMAIL_FROM_ADD', 'EMAIL_USER_FROM_ADD');     //Add a recipient
				$mail->addReplyTo('EMAIL_REPLY_TO', 'EMAIL_REPLY_TO');
				$mail->addCC('EMAIL_CC', 'EMAIL_USER_CC');
		
				//Attachments
				// $mail->addAttachment('image.jpg'); //Add attachments
				// $mail->addAttachment('/tmp/image.jpg', 'new.jpg'); //Optional name
		
				//Content
				$mail->isHTML(true);//Set email format to HTML
				$mail->Subject = 'EMAIL_SUBJECT';
				$mail->Body    = 'EMAIL_BODY';
		
				$mail->send();
				parent::jsonResponse(202, 'Email Sent!');

		} catch (Exception $e) {				
				parent::jsonResponse(406, 'Not Acceptable, Mail generated an ERROR and could not be sent: ' . $mail->ErrorInfo);

		}
	}
}