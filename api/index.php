<?php
header("Access-Control-Allow-Origin: https://actcontadores.cl");
header("Access-Control-Allow-Headers: X-API-KEY, Origin, X-Requested-With, Content-Type, Accept, Access-Control-Request-Method");
header("Access-Control-Allow-Methods: GET, POST");
header("Allow: GET, POST");

header('Content-Type: application/json');

$method = $_SERVER['REQUEST_METHOD'];

include_once './App/vendor/autoload.php';
require_once 'App/init.php';

define("APIOLOGY", "App/");
define("RESOURCES", "App/Resources/");

new Apiology\Init();
