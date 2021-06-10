<?php

namespace Apiology\Resources;

// Headers Class
// use Apiology\Classes\HTTP;
// Email Class
require CLASSES . 'email.php';

use Apiology\Classes\Email;

// Resource / Class
class Sample
{

	private $http_response;
	private $email;

	public function test($r)
	{
		// $this->http_response =  new HTTP();
		// $this->http_response->httpJsonResponse(200, "Welcome to Sample Resource - Test Method!", $r);
	}

	public function correo()
	{
		$this->email = new Email();
		$this->email->sendEmail(array('jmarquezrave@gmail.com', 'Jorge Marquez'), 'My Custom Subject', base64_encode('My Encoded Message to save space'));
		// $this->email = new Email();
		// $this->http_response = new HTTP();

		// $this->http_response->httpJsonResponse(200, "hello wordl");
	}
}
