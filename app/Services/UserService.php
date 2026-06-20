<?php

namespace App\Services;

use App\Repository\UserRepository;
use App\Utils\ImageManager;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Hash;

class UserService
{
    public function __construct(
        protected UserRepository $userRepository,
        protected ImageManager $imageManager
    ) {}

    public function login($data)
    {
        $user = $this->userRepository->getUserByEmail($data);

        if (! $user || ! Hash::check($data['password'], $user->password)) {
            return false;
        }

        return $user->createToken('admin_token', [], now()->addMinutes(60))->plainTextToken;
    }

    public function logout()
    {
        $user = $this->getUserAuth();

        return $this->userRepository->deleteUserToken($user);
    }

    public function getUserAuth()
    {
        $user = request()->user();
        if (! $user) {
            return false;
        }

        return $user;
    }

    public function getUserData()
    {
        return $this->userRepository->getUserData();
    }

    public function update($data)
    {
        $user = $this->getUserAuth();

        if (! $user) {
            return false;
        }

        if (isset($data['avatar']) && $data['avatar'] instanceof UploadedFile) {
            $data['avatar'] = $this->imageManager->uploadSingleImage(
                $data['avatar'],
                'users',
                'public',
                $user->avatar
            );

            if (! $data['avatar']) {
                return false;
            }
        }

        if (isset($data['cv']) && $data['cv'] instanceof UploadedFile) {
            $data['cv'] = $this->imageManager->uploadCv(
                $data['cv'],
                'cvs',
                'public',
                $user->cv
            );

            if (! $data['cv']) {
                return false;
            }
        }

        if (array_key_exists('password', $data) && ! $data['password']) {
            unset($data['password']);
        }

        if (! $this->userRepository->update($user, $data)) {
            return false;
        }

        return $user->fresh();
    }
}
