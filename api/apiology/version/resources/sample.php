<?php

namespace Apiology\Apiology\Version\Resources;

// Headers Class
use Apiology\Apiology\classes\core\http as HTTP;

// Resource / Class
class Sample
{
    public function sample($_data)
    {
        $this->http_response = new HTTP();
        $array = array();
        $array['path'] = 'Sample/';
        $array['data'] = $_data;
        $this->http_response->httpJsonResponse(200, $array);
    }
}
