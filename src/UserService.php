<?php

namespace Services;

use Services\ApiService;

class UserService extends ApiService
{
    public function __construct()
    {
        $usersMsUrl = env('USERS_MS');
        
        if (!is_string($usersMsUrl) || trim($usersMsUrl) === '') {
            throw new \RuntimeException('USERS_MS is not configured');
        }

        $this->endpoint = rtrim($usersMsUrl, '/') . '/api';
    }
}