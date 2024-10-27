<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
use App\Services\UserService;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function __construct(protected readonly UserService $userService)
    {
    }

    public function show(Request $request)
    {
        return $request->user()
            ? UserResource::make($request->user())
            : response(['message' => "Unauthenticated."],401);
    }
}
