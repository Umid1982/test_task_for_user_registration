<?php

namespace App\Services;

use App\DTOs\UserDTO;
use App\Repositories\UserRepository;

class UserService
{
    public function __construct(protected readonly UserRepository $userRepository)
    {
    }

    /** @throws \Exception */

    public function register(UserDTO $userDTO)
    {
        $user = $this->userRepository->create($userDTO);

        $token = $user->createToken('auth_token')->plainTextToken;

        return [
            'user' => $user,
            'access_token' => $token,
        ];
    }
}
