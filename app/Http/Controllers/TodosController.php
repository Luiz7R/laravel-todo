<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateTodoRequest;
use Illuminate\Http\Request;
use App\Models\User;
use App\Repositories\TodosRepository;

class TodosController extends Controller
{
    public $repository;

    public function __construct(TodosRepository $repository)
    {   
           $this->repository = $repository;  
    }

    public function todos (CreateTodoRequest $request)
    {
            $data = $request->validated();

            $this->repository->create($data);

            return response()->json(['message' => 'Todo created'], 201);
    }

    public function getTodo($todoId)
    {
        $todo = $this->repository->getTodo($todoId);

        return $todo;
    }

    public function getTodos()
    {
        $todos = $this->repository->getTodos();

        return view('homeTodo', compact('todos') );
    }

    public function updateTodo(Request $request, $todoId)
    {
        $this->repository->updateTodo($request, $todoId);

        return response()->json(['msg' => 'Todo atualizado com Sucesso'], 200);
    }

    public function deleteTodo($todoId)
    {   
        $this->repository->deleteTodo($todoId);

        return response()->json(['msg' => 'Todo deletado com Sucesso'], 200);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
