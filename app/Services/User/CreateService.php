<?php

namespace App\Services\User;

use App\Models\User;

class CreateService
{
    public function execute($data): User
    {
        $user = User::create($data)->refresh();

        return $user;
    }
}
