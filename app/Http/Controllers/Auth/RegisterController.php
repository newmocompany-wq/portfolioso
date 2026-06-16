<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\UserRequest;
use App\Models\User;

class RegisterController extends Controller
{
    public function register(UserRequest $request)
    {
        $data = $request->validated();

        $user = User::create($data);

        $token = $user->createToken('admin_token', [], now()->addMinutes(60))->plainTextToken;

        return apiResponce(201, 'Success Registration', ['token' => $token]);
    }
}
