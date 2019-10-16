<?php
namespace Apiology\Classes;

class Headers 
{
	private $response = array();

	public function client_error_404()
	{
		header("HTTP/1.1 404 Not Found");
		$this->response['response'] = "Not Found";
		return json_encode($this->response, JSON_PRETTY_PRINT);
	}

	public function success_200()
	{
		header("HTTP/1.1 200 OK");
		$this->response['response'] = "OK";
		return json_encode($this->response, JSON_PRETTY_PRINT);
	}


}