<?php
// Allow from any origin
if (isset($_SERVER['HTTP_ORIGIN'])) {
	header("Access-Control-Allow-Origin: *");
	header("Access-Control-Allow-Methods: GET, POST, OPTIONS");
	header("Access-Control-Allow-Headers: Origin, Authorization, X-Requested-With, Content-Type, Accept, X-Gtm-Api-Key");
	header('Access-Control-Allow-Credentials: true');
	header('Access-Control-Max-Age: 86400');    // cache for 1 day
}

// Access-Control headers are received during OPTIONS requests
if ($_SERVER['REQUEST_METHOD'] == 'OPTIONS') {

	if (isset($_SERVER['HTTP_ACCESS_CONTROL_REQUEST_METHOD']))
		// may also be using PUT, PATCH, HEAD etc
		header("Access-Control-Allow-Methods: GET, POST, PTIONS");

	if (isset($_SERVER['HTTP_ACCESS_CONTROL_REQUEST_HEADERS']))
		header("Access-Control-Allow-Headers: Origin, Authorization, X-Requested-With, Content-Type, Accept, X-Gtm-Api-Key");

	exit(0);
}

include_once 'vendor/autoload.php';
require_once 'App/init.php';

// Namespace Constants
define("APIOLOGY", "App/");
define("CLASSES", "App/Classes/");
define("RESOURCES", "App/Resources/");

new Apiology\Init();
