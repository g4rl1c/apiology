<?php

namespace Apiology\Classes;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;


class Email
{

	private $http_response;

	// Accepts 2 arguments
	/* 	$_email - array('account', 'user full name')
	* 	$_message - string base64 encode
	*/
	public function sendEmail($to, $subject, $message)
	{

		// Needs to have PHPMailer installed in order to remove all errors
		$mail = new PHPMailer(true);

		try {
			//Server settings
			$mail->SMTPDebug = SMTP::DEBUG_OFF; //Enable verbose debug output
			$mail->isSMTP(); //Send using SMTP
			$mail->Host       = 'smtp_server'; //Set the SMTP server to send through
			$mail->SMTPAuth   = true; //Enable SMTP authentication
			$mail->Username   = 'no-reply@email.com'; //SMTP username
			$mail->Password   = 'password';  //SMTP password
			$mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS; //Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
			$mail->Port       = 465; //TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

			//Recipients
			$mail->setFrom('from email', 'from full name');
			$mail->addAddress($to[0], $to[1]);     //Add a recipient
			$mail->addReplyTo('reply-to email', 'reply-to full name');
			// $mail->addCC('EMAIL_CC', 'EMAIL_USER_CC');

			//Attachments
			// $mail->addAttachment('image.jpg'); //Add attachments
			// $mail->addAttachment('/tmp/image.jpg', 'new.jpg'); //Optional name

			//Content
			$mail->isHTML(true); //Set email format to HTML
			$mail->Subject = $subject;
			$mail->Body    = base64_decode($message, true);

			$mail->send();
			return true;
		} catch (Exception $e) {
			return $mail->ErrorInfo;
		}
	}
}
