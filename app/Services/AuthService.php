<?php

namespace App\Services;

use App\Http\Resources\UserResource;
use App\Models\User;

class AuthService
{
    /** @throws \Exception */

    public function register($validate)
    {
        $user = User::query()->create([
            'email' => $validate['email'],
            'password' => bcrypt($validate['password']),
            'gender' => $validate['gender'],
        ]);
        $token = $user->createToken('auth_token')->plainTextToken;

        return [
            'user' => new UserResource($user),
            'access_token' => $token,
        ];
    }
}
