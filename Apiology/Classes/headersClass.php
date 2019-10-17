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
				# code...
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

	private function code_200($_return_json, $_return_message)
	{
		header("HTTP/1.1 200 OK");
		return self::return_message($_return_json, 200, $_return_message);
	}

	private function code_400($_return_json, $_return_message)
	{
		header("HTTP/1.1 400 Bad Request");
		return self::return_message($_return_json, 400, $_return_message);
	}

	private function code_404($_return_json, $_return_message)
	{
		header("HTTP/1.1 404 Not Found");
		return self::return_message($_return_json, 404, $_return_message);
	}

	


}