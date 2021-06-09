<?php

namespace Apiology\Classes;

use Apiology\Classes\HTTP;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;


class Email
{

	private $http_response;

	// public function sendEmail($_name, $_email, $_message)
	// {

	// $this->http_response = new HTTP();


	// 	// Needs to have PHPMailer installed in order to remove all errors
	// 	$mail = new PHPMailer(true);

	// 	try {
	// 		//Server settings
	// 		$mail->SMTPDebug = SMTP::DEBUG_OFF; //Enable verbose debug output
	// 		$mail->isSMTP(); //Send using SMTP
	// 		$mail->Host       = 'SMTP_SERVER'; //Set the SMTP server to send through
	// 		$mail->SMTPAuth   = true; //Enable SMTP authentication
	// 		$mail->Username   = 'SMTP_USER'; //SMTP username
	// 		$mail->Password   = 'SMTP_PASSWORD';  //SMTP password
	// 		$mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS; //Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
	// 		$mail->Port       = 465; //TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

	// 		//Recipients
	// 		$mail->setFrom('EMAIL_FROM', 'EMAIL USER');
	// 		$mail->addAddress('EMAIL_FROM_ADD', 'EMAIL_USER_FROM_ADD');     //Add a recipient
	// 		$mail->addReplyTo('EMAIL_REPLY_TO', 'EMAIL_REPLY_TO');
	// 		$mail->addCC('EMAIL_CC', 'EMAIL_USER_CC');

	// 		//Attachments
	// 		// $mail->addAttachment('image.jpg'); //Add attachments
	// 		// $mail->addAttachment('/tmp/image.jpg', 'new.jpg'); //Optional name

	// 		//Content
	// 		$mail->isHTML(true); //Set email format to HTML
	// 		$mail->Subject = 'EMAIL_SUBJECT';
	// 		$mail->Body    = 'EMAIL_BODY';

	// 		$mail->send();
	// 		$this->http_response->httpJsonResponse(202, 'Email Sent!');
	// 	} catch (Exception $e) {
	// 		$this->http_response->httpJsonResponse(406, 'Not Acceptable, Mail generated an ERROR and could not be sent: ' . $mail->ErrorInfo);
	// 	}
	// }
}
