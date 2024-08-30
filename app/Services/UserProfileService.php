<?php

namespace App\Services;

use App\Http\Resources\UserResource;
use App\Models\User;

class UserProfileService
{
    /** @throws \Exception */

    public function show($request)
    {
        $user = $request->user();

        return $user;
    }
}
