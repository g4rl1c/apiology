<?php
namespace Apiology\Resource;

use Apiology\Classes\{Headers};

 class Sample extends Headers
 {

 	private $header;

 	public function main()
 	{
 		if($_SERVER['REQUEST_METHOD'] == 'GET')
 		{
 			parent::get_header(200, false, null);
 			$this->http_response["status"] = "OK YES";
 			echo json_encode($this->http_response, JSON_PRETTY_PRINT);
 		}
 	}

 	public function sample_method_one()
 	{

 		parent::get_header(200, false, null);
		$this->http_response["status_code"] = 200;
		$this->http_response["message"] = "JSON Method Message";
		echo json_encode($this->http_response, JSON_PRETTY_PRINT);
 	}

 	public function sample_method_two()
 	{

 		if(func_num_args() < 1)
 		{
 			parent::get_header(400, true, "I don't really know what you are asking me for");
 		}
 		else
 		{
 			parent::get_header(200, false, null);

			$this->http_response["status_code"] = 200;
			$this->http_response["message"] = "JSON Method Message";

			foreach (func_get_args() as $value) {
 				$this->http_response["parameters"]= $value; 
 			}

			echo json_encode($this->http_response, JSON_PRETTY_PRINT);
 		}

 	}
 }