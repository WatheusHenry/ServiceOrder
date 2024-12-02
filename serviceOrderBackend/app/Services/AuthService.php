<?php

namespace App\Services;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class AuthService
{
    private $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    public function login(array $credentials)
    {
        if (!Auth::attempt($credentials)) {
            throw ValidationException::withMessages([
                'email' => ['Credenciais inválidas.'],
            ]);
        }

        $user = Auth::user();
        $token = $user->createToken('auth_token',)->plainTextToken;

        return [
            'token' => $token,
        ];
    }

    public function logout(User $user)
    {
        $user->tokens()->delete();
    }

    public function register(array $data)
    {
        return $this->userService->createUser($data);
    }
}
