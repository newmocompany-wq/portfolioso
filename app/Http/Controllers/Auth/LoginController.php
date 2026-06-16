<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Services\UserService;

class LoginController extends Controller
{
    public function __construct(protected UserService $userService) {}

    public function login(LoginRequest $request)
    {
        $data = $request->validated();
        $token = $this->userService->login($data);

        if (! $token) {
            return apiResponce(401, 'Invalid Credentials');
        }

        return apiResponce(200, 'Success', ['token' => $token]);
    }

    public function logout()
    {
        $this->userService->logout();

        return apiResponce(200, 'Success');
    }
}
