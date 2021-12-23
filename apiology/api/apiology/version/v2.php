<?php

namespace Apiology\Apiology\Version;

// Headers Class
use Apiology\Apiology\classes\core\http as HTTP;

// Resource / Class
class V2
{

    private $http_response;
    private $response = array();
    private $file;
    private $resource;
    private $status;

    public function __construct()
    {
        return true;
    }

    public function seguimiento($_subresources)
    {

        $this->http_response = new HTTP();
        $this->status = array();

        $this->file = "apiology/version/resources/seguimiento/$_subresources[0].php";

        if (file_exists($this->file)) {
            require $this->file;
            $this->resource = trim(ucfirst($_subresources[0]));
            $this->resource = "Apiology\\Apiology\\version\\resources\\seguimiento\\{$this->resource}";
            $this->resource = new $this->resource();
            $this->status['status'] = $this->resource->__construct(array_slice($_subresources, 1));
        }

        $this->http_response->httpJsonResponse(200, $this->status);

        // if (count($_subresources) == 2) {
        //     $this->file = "apiology/version/resources/seguimiento/$_subresources[0].php";
        //     if (file_exists($this->file)) {
        //     }
        // } else {
        //     $this->response['status'] = 400;
        //     $this->response['message'] = 'Sorry, you messed up, try again';
        // }

        // switch ($_subresources[0]) {
        //     case 'pedido':
        //         $this->file = "apiology/version/resources/seguimiento/$_subresources[0].php";
        //         if (file_exists($this->file)) {
        //             require $this->file;
        //             $this->resource = trim(ucfirst($_subresources[0]));
        //             $this->resource = "Apiology\\Apiology\\version\\resources\\seguimiento\\{$this->resource}";
        //             $this->resource = new $this->resource();
        //             $this->status = $this->resource->__construct(array_slice($_subresources, 1));
        //         } else {
        //             $this->status = false;
        //         }

        //         break;

        //     default:
        //         $this->status = false;
        //         break;
        // }
        // if (!$this->status) {
        //     $this->response['status'] = 400;
        //     $this->response['message'] = 'Sorry, you messed up, try again';
        // } else {
        //     $this->response['status'] = 200;
        //     $this->response['message'] = $this->resource;
        // }
        // $this->http_response->httpJsonResponse($this->response['status'], $this->response['message']);
    }
}
