<?php

namespace App\Http\Controllers\Api\User;

use App\Console\Constants\UserResponseEnum;
use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
use App\Services\UserProfileService;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    protected $userProfile;

    public function __construct(UserProfileService $userProfile)
    {
        $this->userProfile = $userProfile;
    }

    public function __invoke(Request $request)
    {
        $data = $this->userProfile->show($request);
        return response([
            'data' => UserResource::make($data),
            'message' => UserResponseEnum::USER_SHOW,
            'success' => true,
        ]);
    }
}
