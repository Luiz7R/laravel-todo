<?php

use App\Http\Controllers\TodosController;
use App\Http\Controllers\UsersController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('login');
});

Route::post('/auth/register', [UsersController::class, 'register'])->name('register');
Route::post('/auth/login', [UsersController::class, 'login'])->name('login');
Route::get('/u/logout', [UsersController::class, 'logout'])->name('logout');

Route::get('/todos',[TodosController::class, 'getTodos'])->name('homeTodo');
Route::get('/todo/{todoId}',[TodosController::class, 'getTodo'])->name('getTodo');
Route::post('/todos', [TodosController::class, 'todos'])->name('todo');
Route::put('/up/todos/{todoId}', [TodosController::class, 'updateTodo'])->name('updateTodo');
Route::delete('/delete/todos/{todoId}', [TodosController::class, 'deleteTodo'])->name('deleteTodo');

Route::view('/register', 'register');
Route::view('/login', 'login')->name('loginPage');
