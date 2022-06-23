<?php

namespace App\Connectors;

class ResuelveTuDeudaConnector extends Connector {

    private $config;

    /**
     * Create a new resource instance
     *
     * @return void
     */
    public function __construct() {
        parent::__construct(config('services.resuelvetudeuda.api_url'));
        $this->config = config('services.resuelvetudeuda');
    }

    /**
     * Send a lead
     *
     * @param array $params
     * @return array
     */
    public function sendLead($params) {
        $this->resource = 'api/records';
        $this->method = 'POST';
        $this->options = [
            'headers' => [
                'Content-Type' => 'application/json'
            ],
            'json' => [
                'record' => [
                    'data' => [
                        'system_id' => '1',
                        'user' => [
                            'names' => $params['names'],
                            'first_surname' => $params['first_surname'],
                            'email' => $params['email'],
                            'mobile' => $params['mobile'],
                            'country' => 'mx',
                            'terms_conditions' => true
                        ],
                        'debts' => [
                            [
                                'debt_amount' => $params['debt_amount']
                            ]
                        ],
                        'mkt' => $this->config['mkt']
                    ]
                ]
            ]
        ];

        $response = $this->dispatch();
        if (!$response) {
            return false;
        }
        return ($response->getStatusCode() == 200);
    }
}
