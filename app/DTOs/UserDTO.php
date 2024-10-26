<?php

namespace App\DTOs;

class UserDTO
{
    public function __construct(
        public string $email,
        public string $password,
        public string $gender,
    )
    {
    }
}
