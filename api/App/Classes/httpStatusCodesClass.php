<?php

namespace Apiology\Classes;

class HTTP
{
	private $http_response = array();
	private $http_status_code;

	// HTTP JSON Response | int, string, array/object
	public function httpJsonResponse($_status, $_message, $data = null)
	{
		self::httpStatusCode($_status);
		$this->http_response['status'] = $_status;
		$this->http_response['message'] = $_message;
		if ($data != null) {
			$this->http_response['data'] = $data;
		}
		print(json_encode($this->http_response, JSON_PRETTY_PRINT));
	}

	static private function httpStatusCode($_code)
	{

		switch ($_code) {
			case 200:
				header("HTTP/1.1 200 OK");
				break;
			case 201:
				header("HTTP/1.1 201 Created");
				break;
			case 202:
				header("HTTP/1.1 202 Accepted");
				break;
			case 204:
				header("HTTP/1.1 204 No Content");
				break;
			case 400:
				header("HTTP/1.1 400 Bad Request");
				break;
			case 401:
				header("HTTP/1.1 401 Unauthorized");
				break;
			case 403:
				header("HTTP/1.1 403 Forbidden");
				break;
			case 404:
				header("HTTP/1.1 404 Not Found");
				break;
			case 406:
				header("HTTP/1.1 406 Not Acceptable");
				break;

			default:
				header("HTTP/1.1 418 I'm a teapot");
				break;
		}
	}
}
