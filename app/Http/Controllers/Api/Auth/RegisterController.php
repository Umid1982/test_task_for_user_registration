<?php

namespace App\Http\Controllers\Api\Auth;

use App\Console\Constants\UserResponseEnum;
use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterRequest;
use App\Services\AuthService;

class RegisterController extends Controller
{
    protected $authService;

    public function __construct(AuthService $authService)
    {
        $this->authService = $authService;
    }

    public function __invoke(RegisterRequest $registerRequest)
    {
        $data = $this->authService->register($registerRequest->validated());

        return response([
            'user' => $data['user'],
            'access_token' => $data['access_token'],
            'token_type' => 'Bearer',
            'message' => UserResponseEnum::USER_CREATE,
            'success' => true,
        ]);
    }
}
