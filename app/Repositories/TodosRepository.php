<?php

namespace App\Repositories;

use App\Models\Todos;
use App\Models\User;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Date;

class TodosRepository
{
    private $model;

    public function __construct()
    {
        $this->model = new Todos(); 
    }

    public function create(array $data): bool
    {

        $deadline = Date::createFromFormat('d/m/Y', $data['deadline'])->format('Y-m-d');
        $endedAt = Date::createFromFormat('d/m/Y', $data['ended_at'])->format('Y-m-d');

        $this->model->create([
            'user_id' => Auth::user()->id,
            'name' => $data['name'],
            'description' => $data['description'],
            'deadline' => $deadline,
            'ended_at' => $endedAt,
        ]);

        return true;
    }

    public function getTodo($todoId)
    {
        if ( empty(Auth::user()->id) )
        {
             return abort(404); 
        }

        $todo = $this->model->where('user_id', Auth::user()->id)->findOrfail($todoId);
    
        return $todo;
    }

    public function getTodos()
    {

        if ( empty(Auth::user()->id) )
        {
             return abort(404); 
        }

        $user = User::find(Auth::user()->id);
        $todos = $user->todos;

        return $todos;
    }

    public function updateTodo(Request $request, $todoId)
    {

        if ( empty(Auth::user()->id) )
        {
             return abort(404); 
        }

        $deadline = DateTime::createFromFormat('d/m/Y', $request->deadlineTodo);
        $endedAt = DateTime::createFromFormat('d/m/Y', $request->ended_atTodo);
        
        $todo = $this->model->where('user_id', Auth::user()->id)->findOrfail($todoId);

        $todo->name = $request->nameTodo;
        $todo->description = $request->descriptionTodo;
        $todo->deadline = $deadline->format('Y-m-d');
        $todo->ended_at = $endedAt->format('Y-m-d');
        $todo->save();

        return true;
    }

    public function deleteTodo($todoId): bool
    {

        if ( empty(Auth::user()->id) )
        {
             return abort(404); 
        }
        
        $todo = $this->model->where('user_id', Auth::user()->id)->findOrfail($todoId);

        $todo->delete();

        return true;
    }
}