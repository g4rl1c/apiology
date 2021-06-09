<?php

namespace Apiology\Resources;

// Headers Class
use Apiology\Classes\HTTP;

// Resource / Class
class Sample extends HTTP
{

	private $http_response;

	public function test($r)
	{
		$this->http_response =  new HTTP();
		$this->http_response->httpJsonResponse(200, "Welcome to Sample Resource - Test Method!", $r);
	}
}
