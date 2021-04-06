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

	public function __construct()
	{

		if($_SERVER['REQUEST_URI'] == "/")
		{
			parent::get_header(200, true, "No Resource found, please enter a resource");
		}
		else
		{
			self::get_resource(self::get_uri($_SERVER['REQUEST_URI']));
		}
		
	}

	private function get_uri($_uri)
	{
		return explode('/', filter_var(trim($_uri, '/'), FILTER_SANITIZE_URL));
	}

	private function get_resource($_resource)
	{
		$this->file = APIOLOGY . RESOURCES . $_resource[2] . '.php';
		if(file_exists($this->file))
		{
			require $this->file;
			$this->resource = ucfirst($_resource[2]);
			$this->resource = "Apiology\\Resource\\{$this->resource}";
			$this->resource = new $this->resource();

			if(count($_resource) == 3)
			{
				$this->resource->main();
			}
			else
			{
				if(count($_resource) > 3)
				{
					if(method_exists($this->resource, $_resource[3]) && is_callable($_resource[3], true, $method))
					{
						if(count($_resource) > 4)
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
						parent::get_header(404, true, "No Resource found");
					}
				}
			}
		}
		else
		{
			parent::get_header(404, true, "No Resource found");
		}
	}


	private function get_subresources($_subresources)
	{
		$this->sub_resource = array_splice($_subresources, 2);

		return $this->sub_resource;
	}

}