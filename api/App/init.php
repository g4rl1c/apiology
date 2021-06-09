<?php

namespace Apiology;

require_once 'Classes/httpStatusCodesClass.php';

use Apiology\Classes\HTTP;

class Init
{
	private $request_uri;
	private $request_method;
	private $file;
	private $resource;
	private $http_response;

	// constructor
	public function __construct()
	{
		// Call the HTTP Class to emmit http responses and headers

		$this->http_response = new HTTP();

		// get Server request URI
		$this->request_uri = $_SERVER['REQUEST_URI'];
		// get Server Request Method
		$this->request_method = $_SERVER['REQUEST_METHOD'];
		// Explode Request URI
		$this->request_uri = explode('/', filter_var(trim($this->request_uri, '/'), FILTER_SANITIZE_URL));

		// only Accept GET Method here
		if ($this->request_method == 'GET') {
			// Check path from URI
			switch ($this->request_uri) {
					// Empty path == root
				case empty($this->request_uri[0]):
					$this->http_response->httpJsonResponse(200, "Welcome to Apiology!");
					break;
					// Path with a resource and possible arguments
				case !empty($this->request_uri[0]):
					$this->getResource($this->request_uri);
					break;
			}
		} else {
			$this->httpJsonResponseNotFound();
		}
	}

	private function httpJsonResponseNotFound()
	{
		$this->http_response = new HTTP();
		$this->http_response->httpJsonResponse(404, "Sorry!. Resource not be found");
	}

	private function getResource($_resource)
	{
		$this->http_response = new HTTP();
		$this->file = RESOURCES . trim(strtolower($_resource[0])) . ".php";
		if (file_exists($this->file)) {
			require $this->file;
			$this->resource = trim(ucfirst($_resource[0]));
			$this->resource = "Apiology\\Resources\\{$this->resource}";

			if (count($_resource) > 1) {
				$this->resource = new $this->resource();
				if (method_exists($this->resource, $_resource[1]) && is_callable($_resource[1], true, $method)) {
					$this->resource->$method(array_splice($_resource, 2));
				} else {
					$this->http_response->httpJsonResponse(404, $method);
				}
			} else {
				$this->httpJsonResponseNotFound();
			}
		} else {
			$this->httpJsonResponseNotFound();
		}
	}
}
