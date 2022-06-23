<?php

namespace App\Integrations\Demio;

use App\Contracts\Integrations\WebinarConnector;
use App\Models\User;

use Exception;

class DemioConnector implements WebinarConnector
{

    private $client;

    /**
     * Create a new resource instance
     *
     * @return void
     */
    public function __construct()
    {
        $this->client = app()->make('DemioClient');
    }

    /**
     * Register a user to a webinar
     *
     * @param  App\Models\User  $user
     * @param  array  $params
     * @return string
     * @throws Exception
     */
    public function registerToWebinar(User $user, array $params)
    {
        $webinar_url = $params['webinar_url'];

        $register = $this->client->events->register([
            'ref_url' => $webinar_url,
            'name' => $user->present()->name,
            'last_name' => $user->present()->last_name,
            'email' => $user->email
        ]);

        if (!$register->isSuccess()) {
            $errors = $register->implodeMessages(', ');
            throw new Exception("Demio registration error: [$errors]");

        }

        $results = $register->results();
        if (!isset($results->join_link)) {
            $errors = $register->implodeMessages(', ');
            throw new Exception("Demio registration error: [$errors]");
        }

        return $results->join_link;
    }

}
