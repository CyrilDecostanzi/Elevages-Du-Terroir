<?php

namespace App\Services;

use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserService
{
    public function createUser(string $name, string $email, string $password): User
    {
        try {
            // Create user
            $user = User::create([
                'name' => $name,
                'email' => $email,
                'password' => Hash::make($password),
            ]);

            return $user;
        } catch (\Exception $e) {
            return $e;
        }
    }
}
