<?php
namespace Apiology;

require_once 'Classes/httpStatusCodesClass.php';
use Apiology\Classes\{HTTP};

class Init extends HTTP
{

	private $http_response = array();
	private $http_status_code;
	private $request_uri;
	private $file;
	private $resource;
	private $sub_resource = array();

	public function __construct(){
		$this->request_uri = $_SERVER['REQUEST_URI'];
		if($this->request_uri === '/')
		{
			$this->http_status_code = 406;
			
			$this->http_response['status_code'] = $this->http_status_code;
			$this->http_response['response'] = 'No Resource found, please enter a resource';

			parent::setHeader($this->http_status_code);
			print(json_encode($this->http_response, JSONPRETTY_PRINT));
		}
		else
		{
			self::getResource(self::getURI($this->request_uri));
		}
	}

	private function getURI($_uri){
		return explode('/', filter_var(trim($_uri, '/'), FILTER_SANITIZE_URL));
	}

	private function getResource($_resource){
		$this->file = RESOURCES . $_resource[0] . '.php';
		if(file_exists($this->file))
		{
			require $this->file;
			$this->resource = ucfirst($_resource[0]);
			$this->resource = "Apiology\\Resources\\{$this->resource}";
			$this->resource = new $this->resource();

			if(count($_resource) === 1)
			{
				$this->resource->main();
			}
			else
			{
				if(count($_resource) > 1)
				{
					if(method_exists($this->resource, $_resource[1]) && is_callable($_resource[1], true, $method))
					{
						if(count($_resource) > 3)
						{
							$this->resource->$method(self::get_subresources($_resource));
						} 
						else
						{
							$this->resource->$method();
						}
					}
				} else {
					$this->http_response['status_code'] = 404;
					$this->http_response['response'] = 'No Resource found, METHOD';
					parent::setHeader($this->http_response['status_code']);
					print(json_encode($this->http_response, JSON_PRETTY_PRINT));
				}
			}
		}
		else
		{
			$this->http_response['status_code'] = 404;
			$this->http_response['response'] = 'No Resource found, METHOD';
			parent::setHeader($this->http_response['status_code']);
			print(json_encode($this->http_response, JSON_PRETTY_PRINT));
		}
	}

	private function get_subresources($_subresources)
	{
		$this->sub_resource = array_splice($_subresources, 2);

		return $this->sub_resource;
	}

}