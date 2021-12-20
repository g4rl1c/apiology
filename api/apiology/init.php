<?php

namespace Apiology\Apiology;

use Apiology\Apiology\classes\core\http as HTTP;

class Init
{

	private $http_response;

	// constructor
	public function __construct()
	{
		// Call the HTTP Class to emmit http responses and headers

		$this->http_response = new HTTP();

		// get Server request URI
		$request_uri = $_SERVER['REQUEST_URI'];
		// get Server Request Method
		$request_method = $_SERVER['REQUEST_METHOD'];
		// Explode Request URI
		$request_uri = explode('/', filter_var(trim($request_uri, '/'), FILTER_SANITIZE_URL));

		// only Accept GET, POST, PUT and DELETE Methods here
		if ($request_method == 'GET' || $request_method == 'POST' || $request_method == 'PUT' || $request_method == 'DELETE') {
			// Check path from URI
			switch ($request_uri) {
					// Empty path == root
				case empty($request_uri[0]):
					$this->http_response->httpJsonResponse(200, "Welcome to Apiology!");
					break;
					// Path with a resource and possible arguments
				case !empty($request_uri[0]):
					// self::getRequest($request_uri);
					$version = "Apiology\\Apiology\\classes\\core\\version";
					$version = new $version();
					$version->getRequest($request_uri);
					break;
			}
		} else {
			$this->http_response->httpJsonResponse(403, "Sorry!. You have a Bad Request");
		}
	}
}
