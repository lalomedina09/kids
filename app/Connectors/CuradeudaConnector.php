<?php

namespace App\Connectors;

class CuradeudaConnector extends Connector {

    private $config;

    /**
     * Create a new resource instance
     *
     * @return void
     */
    public function __construct() {
        parent::__construct(config('services.curadeuda.api_url'));
        $this->config = config('services.curadeuda');
    }

    /**
     * Send a lead
     *
     * @param array $params
     * @return array
     */
    public function sendLead($params) {
        $this->resource = 'leads';
        $this->method = 'POST';
        $this->options = [
            'headers' => [
                'Content-Type' => 'application/json',
                'Authorization' => "Bearer {$this->config['api_token']}"
            ],
            'json' => [
                'related_campaign' => $this->config['related_campaign'],
                'nombre' => "{$params['name']} {$params['lastname']}",
                'celular' => $params['phone'],
                'telefono' => $params['phone'],
                'email' => $params['email'],
                'total_deuda' => $params['range']
            ]
        ];

        $response = $this->dispatch();
        if (!$response) {
            return false;
        }
        return ($response->getStatusCode() == 200);
    }
}
