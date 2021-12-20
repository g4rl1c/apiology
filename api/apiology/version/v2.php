<?php

namespace Apiology\Apiology\Version;

// Headers Class
use Apiology\Apiology\classes\core\http as HTTP;

// Resource / Class
class V2
{

    private $response = array();

    public function __construct()
    {
        return true;
    }

    public function sample($_data)
    {
        $this->http_response = new HTTP();
        // temp variable "$function" remove in production
        // true => simple algorithm inside the function with a http message in return
        // false => calls module -> class -> function
        $function = false;
        if ($function) {

            $this->status_code = 200;
            $this->response['message'] = "Welcome to the version => 2, resource => sample";

            $this->http_response->httpJsonResponse(
                $this->status_code,
                $this->response
            );
        } else {
            $file = "apiology/version/resources/sample.php";
            if (file_exists($file)) {
                require $file;
                $module = "Apiology\\Apiology\\version\\resources\\Sample";
                $module = new $module();
                $module->sample($_data);
            }
        }
    }
}
