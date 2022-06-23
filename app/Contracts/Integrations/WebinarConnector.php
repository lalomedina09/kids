<?php

namespace App\Contracts\Integrations;

use App\Models\User;

interface WebinarConnector
{

    /**
     * Register a user to a webinar
     *
     * @param  App\Models\User  $user
     * @param  array  $params
     * @return string
     * @throws Exception
     */
    public function registerToWebinar(User $user, array $params);

}
