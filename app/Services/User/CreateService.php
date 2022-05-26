<?php

namespace App\Services\User;

use App\Models\User;
use App\Http\Resources\UserResource;

class CreateService
{
    public function execute($data): UserResource
    {
        $user = User::create($data)->refresh();

        return new UserResource($user);
    }
}
