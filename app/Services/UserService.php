<?php

namespace App\Services;

use App\Models\User;

class UserService
{
    public function store(array $userDetails): User
    {
        $user = User::create([
            'name' => $userDetails['name'],
            'email' => $userDetails['email'],
            'password' => bcrypt($userDetails['password']),
        ]);

        return $user;
    }
}
