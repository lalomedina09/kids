<?php

namespace App\Connectors;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;
use GuzzleHttp\Psr7;

abstract class Connector {

    private $api;

    protected $body;
    protected $method;
    protected $options;
    protected $query_string;
    protected $resource;
    protected $response;

    /**
     * Create a new instance of the resource
     *
     * @param string $api
     * @return void
     */
    public function __construct($api) {
        $this->api = $api;
        $this->body = [];
        $this->options = [];
        $this->query_string = [];
    }

    /**
     * Build and return the endpoint where the request
     * will be sent according the needed action
     *
     * @return string
     */
    private function getEndpoint() {
        $query_string = http_build_query($this->query_string);
        return ($query_string) ? implode('?', [$this->resource, $query_string]) : $this->resource;
    }

    /**
     * Send the request to the specified API endpoint
     *
     * @return \GuzzleHttp\Psr7\Response
     */
    protected function dispatch() {
        $endpoint = $this->getEndpoint();

        try {
            $client = new Client(['base_uri' => $this->api]);
            $this->response = $client->request($this->method, $endpoint, $this->options);
            $this->logResponse();
        } catch (RequestException $e) {
            $this->logException($e);
        }

        return $this->response;
    }


    /**
     * Log request response
     *
     * @return void
     */
    private function logResponse() {
        $endpoint = $this->getEndpoint();
        $class_name = get_class($this);
        $response_body = (string) $this->response->getBody();
        logger("{$class_name}@{$endpoint}: {$response_body}");
    }

    /**
     * Log request exception
     *
     * @param \GuzzleHttp\Exception\RequestException $exception
     * @return \GuzzleHttp\Psr7\Response
     */
    private function logException($exception) {
        $has_response = $exception->hasResponse();

        $request = Psr7\str($exception->getRequest());
        $response = ($has_response) ? $exception->getResponse() : null;
        $status_code = ($has_response) ? $response->getStatusCode() : '';
        $response_body = ($has_response) ? (string) $response->getBody() : '';

        $message = "\nStatus Code: {$status_code} \nRequest: {$request}\nResponse: {$response_body}";
        $class_name = get_class($this);
        $endpoint = $this->getEndpoint();

        logger()->error("{$class_name}@{$endpoint}: {$message}");

        $this->response = $response;
    }
}
