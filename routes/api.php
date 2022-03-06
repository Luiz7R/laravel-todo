<?php

use App\Http\Controllers\api\UsersController;

use Illuminate\Support\Facades\Route;

Route::apiResource('users', UsersController::class);