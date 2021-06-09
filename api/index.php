<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: X-API-KEY, Origin, X-Requested-With, Content-Type, Accept, Access-Control-Request-Method");
header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE");
header("Allow: GET, POST, PUT, DELETE");
header('Content-Type: application/json');

include_once 'vendor/autoload.php';
require_once 'App/init.php';

// Namespace Constants
define("APIOLOGY", "App/");
define("CLASSES", "App/Classes/");
define("RESOURCES", "App/Resources/");

new Apiology\Init();
