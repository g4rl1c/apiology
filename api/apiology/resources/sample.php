<?php

namespace Apiology\Apiology\Resources;

// Headers Class
use Apiology\Apiology\classes\http as HTTP;

// Resource / Class
class Sample
{

	private $http_response;
	private $email;

	public function test()
	{
		$this->http_response = new HTTP();
		$this->http_response->httpJsonResponse(200, "Child Resource found", array());
	}
}
