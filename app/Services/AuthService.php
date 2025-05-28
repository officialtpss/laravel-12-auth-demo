<?php

namespace App\Services;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Laravel\Sanctum\PersonalAccessTokenResult;

class AuthService
{
    public function register(array $data): User
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
    }

    public function login(array $credentials): ?PersonalAccessTokenResult
    {
        if (!Auth::attempt($credentials)) {
            return null;
        }

        $user = Auth::user();
        return $user->createToken('auth-token');
    }

    public function logout(User $user): void
    {
        $user->tokens()->delete();
    }
} 