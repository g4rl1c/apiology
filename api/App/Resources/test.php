<?php
namespace Apiology\Resources;

// Headers Class
use Apiology\Classes\{HTTP};

// Resource / Class
class Test extends HTTP {

	private $http_response = array();
	private $http_status_code;

	// default resource, acts as a constructor
	// responds to: domain.com/test
	public function main()
	{
		// Condition as Request Method
		if($_SERVER['REQUEST_METHOD'] == 'GET')
		{
			// Message in JSON
			parent::jsonResponse(200, 'This test resource exists!');
		}
	}

	// Child resource
	// responds to: domain.com/test/sample
	public function sample(){
		// Message in JSON
		parent::jsonResponse(200, 'This test/sample resource exists!');
	}

	// Child resource with arguments
	// responds to: domain.com/test/sample-two/param1/param2/param3
	public function sample_two()
	{

			foreach(func_get_args() as $value){
				$v = $value;
			}

			// Message in JSON
			$this->http_response["parameters"] = $v;
			parent::jsonResponse(200, $this->http_response);
	}
}