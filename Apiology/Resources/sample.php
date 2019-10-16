<?php
namespace Apiology\Resource;

use Apiology\Classes\{Headers};

 class Sample extends Headers
 {

 	private $header;

 	public function main()
 	{
 		echo parent::success_200();

 	}

 	public function sample_method($_args)
 	{

 		parent::success_200();
 		echo $_POST['post_key'] . ' and ' . $_args[0];
 	}
 }