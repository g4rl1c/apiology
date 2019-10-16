<?php
namespace Apiology;

require_once 'Classes/headersClass.php';
use Apiology\Classes\{Headers};

class Init extends Headers
{

	private $request_resource;
	private $header;
	private $file;
	private $resource;
	private $sub_resource = array();

	const HOME = 'home';

	function __construct()
	{

		// $this->header = new Headers();

		switch ($_SERVER['REQUEST_METHOD']) {
			case 'GET':
				$this->request_resource = empty($_GET) ? self::HOME : self::get_uri($_SERVER['REQUEST_URI']);
				break;

			case 'POST':
				$this->request_resource = empty($_POST) ? self::HOME : self::get_uri($_SERVER['REQUEST_URI']);
				break;

			case 'PUT':
				$this->request_resource = empty($_PUT) ? self::HOME : self::get_uri($_SERVER['REQUEST_URI']);
				break;

			case 'DELETE':
				$this->request_resource = empty($_DELETE) ? self::HOME : self::get_uri($_SERVER['REQUEST_URI']);
				break;
			
			default:
				$this->request_resource = parent::client_error_404();
				break;
		}

		self::get_resource($this->request_resource);
		
	}

	private function get_uri($_uri)
	{
		return explode('/', filter_var(trim($_uri, '/'), FILTER_SANITIZE_URL));
	}

	private function get_resource($_resource)
	{
		$this->file = APIOLOGY . RESOURCES . $_resource[0] . '.php';
		if(file_exists($this->file))
		{
			require $this->file;
			$this->resource = ucfirst($_resource[0]);
			$this->resource = "Apiology\\Resource\\{$this->resource}";
			$this->resource = new $this->resource();


			if(method_exists($this->resource, $_resource[1]) && is_callable($_resource[1], true, $method))
			{
				if(count($_resource) > 2)
				{
					$this->resource->$method(self::get_subresources($_resource));
				}
				else
				{
					$this->resource->$method();
				}
				
			}
			else
			{
				$this->resource->main();
			}
		}
		else
		{
			parent::client_error_404();
		}
	}


	private function get_subresources($_subresources)
	{
		$this->sub_resource = array_splice($_subresources, 2);

		return $this->sub_resource;
	}

}