<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateAccountRequest;
use App\Http\Requests\LoginRequest;
use App\Repositories\UsersRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UsersController extends Controller
{    
        public $repository;  

        public function __construct(UsersRepository $repository)
        {
               $this->repository = $repository;
        }

        public function register (CreateAccountRequest $request)
        {
               $data = $request->validated();

               $this->repository->register($data);

               return redirect()->route('homeTodo');
        }

        public function login(LoginRequest $request)
        {
                $data = $request->validated();
                
                if ( Auth::attempt(['email' => $data['email'], 'password' => $data['password']]) )
                {
                    return redirect()->route('homeTodo');
                }
                else
                {
                    return response()->json(['error' => 'Email ou Senha, Incorretas'], 401);
                }               
        }

        public function logout(Request $request)
        {
             Auth::logout();

             $request->session()->invalidate();

             $request->session()->regenerateToken();

             return redirect()->route('loginPage');
        }
        
}
