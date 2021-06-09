<?php

namespace Apiology\Resources;

// Headers Class
use Apiology\Classes\{HTTP};

// Resource / Class
class Sample extends HTTP
{

	public function test($r)
	{
		parent::httpJsonResponse(200, "Welcome to Sample Resource - Test Method!", $r);
	}
}
