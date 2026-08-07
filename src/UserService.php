<?php

namespace Services;

use Services\ApiService;

class UserService extends ApiService
{
    public function __construct()
    {
        $userMsEnv = env('USERS_MS');

        if ($userMsEnv === '') {
            throw new \Exception('Value USERS_MS is not set');
        }

        $this->endpoint = $usersMsEnv . '/api';
    }
}