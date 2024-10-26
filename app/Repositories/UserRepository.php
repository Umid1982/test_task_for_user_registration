<?php

namespace App\Repositories;

use App\DTOs\UserDTO;
use App\Models\User;

class UserRepository
{
    public function create(UserDTO $userDTO)
    {
        return User::query()->create([
            'email' => $userDTO->email,
            'password' => bcrypt($userDTO->password),
            'gender' => $userDTO->gender,
        ]);
    }
}
