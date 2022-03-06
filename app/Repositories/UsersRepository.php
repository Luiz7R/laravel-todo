<?php

namespace App\Repositories;

use App\Http\Requests\CreateAccountRequest;
use App\Http\Requests\LoginRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UsersRepository
{
    private $model;

    public function __construct()
    {
        $this->model = new User();
    }

    public function register (array $data): bool
    {
             $user = $this->model->create([
                'name' => $data['name'],
                'email' => $data['email'],
                'sex' => $data['sex'],
                'email_verified_at' => now(),
                'password' => Hash::make($data['password']),
             ]); 

             Auth::login($user);

             return true;
    }
}