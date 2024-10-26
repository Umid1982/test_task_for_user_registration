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
        $user = $request->user();

        if ($user) {
            return UserResource::make($user);
        }
        return response([
            'message' => "No such user,something went wrong, check Logs!",
            'success' => false
        ]);
    }
}
