<?php

namespace Apiology\Classes;

Class HTTP {
	private $http_response = array();
	private $http_status_code;

	protected function setHeader($_code) {
		self::httpStatusCode($_code);
	}

	private function httpStatusCode($_code){
		
		switch ($_code) {
			case 200:
				header("HTTP/1.1 200 OK");
			break;
			case 201:
				header("HTTP/1.1 201 Created");
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
			
			default:
				header("HTTP/1.1 418 I'm a teapot");
			break;
		}

	}

}