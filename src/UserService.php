<?php

namespace Services;

use Services\ApiService;

class UserService extends ApiService
{
    public function __construct()
    {
        $this->endpoint = env('USER_MS') . '/api';
    }
}