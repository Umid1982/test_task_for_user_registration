<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\StoreRequest;
use App\Http\Resources\UserResource;
use App\Services\UserService;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function __construct(protected readonly UserService $userService)
    {
    }

    public function __invoke(StoreRequest $storeRequest)
    {
        $data = $this->userService->register($storeRequest->toDTO());

        return response([
            'user' => UserResource::make($data['user']),
            'access_token' => $data['access_token'],
        ]);
    }
}
