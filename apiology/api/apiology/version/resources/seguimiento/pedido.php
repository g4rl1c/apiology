<?php

namespace Apiology\Apiology\Version\Resources\Seguimiento;

use Apiology\Apiology\classes\core\http as HTTP;

class Pedido
{

    private $json;
    private $args;
    private $order;
    private $response;

    public function __construct()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $this->json = json_decode(file_get_contents('php://input'), true);
            $this->json = $this->json['pedido_numero'];
            return self::order($this->json);
        } else {
            return false;
        }
    }

    private function order($_order)
    {
        $this->json = json_decode(file_get_contents(__DIR__ . '/pedidos.json'), true);

        for ($i = 0; $i < count($this->json['pedidos']); $i++) {
            if ($this->json['pedidos'][$i]['id'] == $_order) {
                $this->resource = $this->json['pedidos'][$i];
            }
        }

        $this->response = $this->resource['agency'] == 'inhouse' ? $this->resource['status'] : self::starken($this->resource['order']);

        return $this->response;
    }

    private function starken($_order)
    {
        $this->json = curl_init();
        curl_setopt($this->json, CURLOPT_URL, "https://gateway.starken.cl/tracking/orden-flete/of/" . $_order);
        curl_setopt($this->json, CURLOPT_HEADER, 0);
        curl_setopt($this->json, CURLOPT_RETURNTRANSFER, true);

        $this->order = curl_exec($this->json);
        curl_close($this->json);

        $this->order = json_decode($this->order, TRUE);

        return $this->order['status'];
    }
}
