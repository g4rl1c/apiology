<?php

namespace Apiology\Apiology\Classes\Core;

use Apiology\Apiology\classes\core\http as HTTP;

class Version
{
    public function getRequest($_request)
    {
        $this->http_response = new HTTP();
        $file = "apiology/version/" . trim(strtolower($_request[0])) . ".php";
        if (file_exists($file)) {
            require $file;
            $version = trim(ucfirst($_request[0]));
            $version = "Apiology\\Apiology\\version\\{$version}";
            $version = new $version();

            // $this->http_response->httpJsonResponse(404, $version->__construct());

            if ($version->__construct()) {
                if (method_exists($version, $_request[1]) && is_callable($_request[1], true, $method)) {
                    $resource = array_splice($_request, 2);
                    $version->$method($resource);
                } else {
                    $this->http_response->httpJsonResponse(404, "Sorry!. No resource found");
                }
            } else {
                $this->http_response->httpJsonResponse(404, "Sorry!. Version is deprecated");
            }
        } else {
            $this->http_response->httpJsonResponse(404, "Version Not Found");
        }
    }
}
