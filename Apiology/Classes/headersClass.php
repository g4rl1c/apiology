<?php
namespace Apiology\Classes;

class Headers 
{

	private $http_response = array();
	private $http_status_code;

	protected function get_header($_http_status_code, $_return_json, $_return_message)
	{
		switch ($_http_status_code) {
			case '200':

				self::code_200($_return_json, $_return_message);

				break;

			case '201':

				self::scode_201($_return_json);

				break;

			case '400':

				self::code_400($_return_json, $_return_message);

				break;

			case '404':

				self::code_404($_return_json, $_return_message);

				break;
			
			default:
				self::code_404();
				break;
		}
	}

	// Set JSON Message if TRUE
	private function return_message($_return_json, $_http_status_code, $_return_message)
	{
		if($_return_json)
		{
			return self::json_response($_http_status_code, $_return_message);
		}
	}

	// Compose JSON Message
	private function json_response($_http_status_code, $_return_message)
	{
		$this->http_response['http_status_code'] = $_http_status_code;
		$this->http_response['message'] = $_return_message;

		echo json_encode($this->http_response, JSON_PRETTY_PRINT);
	}

	// HTTP Status Code
	// ----- 2XX Success
	private function code_200($_return_json, $_return_message)
	{
		header("HTTP/1.1 200 OK");
		return self::return_message($_return_json, 200, $_return_message);
	}

	private function code_201($_return_json, $_return_message)
	{
		header("HTTP/1.1 201 Created");
		return self::return_message($_return_json, 201, $_return_message);
	}

	private function code_202($_return_json, $_return_message)
	{
		header("HTTP/1.1 202 Accepted");
		return self::return_message($_return_json, 202, $_return_message);
	}

	private function code_204($_return_json, $_return_message)
	{
		header("HTTP/1.1 204 No Content");
		return self::return_message($_return_json, 204, $_return_message);
	}

	// ----- 3XX Redirection
	private function code_304($_return_json, $_return_message)
	{
		header("HTTP/1.1 304 Not Modified");
		return self::return_message($_return_json, 304, $_return_message);
	}

	// ----- 4XX Client Error
	private function code_400($_return_json, $_return_message)
	{
		header("HTTP/1.1 400 Bad Request");
		return self::return_message($_return_json, 400, $_return_message);
	}

	private function code_401($_return_json, $_return_message)
	{
		header("HTTP/1.1 401 Unauthorized");
		return self::return_message($_return_json, 401, $_return_message);
	}

	private function code_403($_return_json, $_return_message)
	{
		header("HTTP/1.1 403 Forbidden");
		return self::return_message($_return_json, 403, $_return_message);
	}

	private function code_404($_return_json, $_return_message)
	{
		header("HTTP/1.1 404 Not Found");
		return self::return_message($_return_json, 404, $_return_message);
	}

	private function code_406($_return_json, $_return_message)
	{
		header("HTTP/1.1 406 Not Acceptable");
		return self::return_message($_return_json, 406, $_return_message);
	}

	private function code_408($_return_json, $_return_message)
	{
		header("HTTP/1.1 408 Request Timeout");
		return self::return_message($_return_json, 408, $_return_message);
	}

	private function code_409($_return_json, $_return_message)
	{
		header("HTTP/1.1 409 Conflict");
		return self::return_message($_return_json, 409, $_return_message);
	}

	private function code_417()
	{
		header("HTTP/1.1 417 Expectation Failed");
		return self::return_message(true, 417, "Expectation Failed");
	}

	


}