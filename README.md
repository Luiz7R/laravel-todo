<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

# Projeto Todo-Auth

## Ideia: Criar uma API Restfull de uma Todo List.
<br>

* SOLID Aplicado [x]

## Rotas:

| Method    | URI                   | Name          | Action                                          | Middleware |
|-----------|-----------------------|---------------|-------------------------------------------------|------------|
| GET\|HEAD | /                     |               | Closure                                         | web        |
| GET\|HEAD | api/users             | users.index   | App\Http\Controllers\UsersController@index      | api        |
| POST      | api/users             | users.store   | App\Http\Controllers\UsersController@store      | api        |
| GET\|HEAD | api/users/{user}      | users.show    | App\Http\Controllers\UsersController@show       | api        |
| PUT\|PATCH | api/users/{user}      | users.update  | App\Http\Controllers\UsersController@update     | api        |
| DELETE    | api/users/{user}      | users.destroy | App\Http\Controllers\UsersController@destroy    | api        |
| POST      | auth/login            | login         | App\Http\Controllers\UsersController@login      | web        |
| POST      | auth/register         | register      | App\Http\Controllers\UsersController@register   | web        |
| DELETE    | delete/todos/{todoId} | deleteTodo    | App\Http\Controllers\TodosController@deleteTodo | web        |
| GET\|HEAD | login                 | loginPage     | Illuminate\Routing\ViewController               | web        |
| GET\|HEAD | register              |               | Illuminate\Routing\ViewController               | web        |
| GET\|HEAD | todo/{todoId}         | getTodo       | App\Http\Controllers\TodosController@getTodo    | web        |
| GET\|HEAD | todos                 | homeTodo      | App\Http\Controllers\TodosController@getTodos   | web        |
| POST      | todos                 | todo          | App\Http\Controllers\TodosController@todos      | web        |
| GET\|HEAD | u/logout              | logout        | App\Http\Controllers\UsersController@logout     | web        |
| PUT       | up/todos/{todoId}     | updateTodo    | App\Http\Controllers\TodosController@updateTodo | web        |

* POST - /auth/register - Registra um usuário [X]

* POST - /auth/login - Autentica um usuário [X]

* GET - /todos - Retorna uma lista/view de todos os afazeres do usuário [x]

* POST - /todos - Cria um TODO para o usuário autenticado [x]

* GET - /todo/{todoId} - Retorna um array/view com o todo selecionado do usuário (precisa pertencer ao mesmo) [x]

* PUT - /up/todos/{todoId} - Atualiza um TODO de um usuário autenticado [x]

* DELETE - /delete/todos/{todoId} - Deleta um TODO de um usuário autenticado [x]


## Migrations:

### table: users

* id: int (usar id padrão)
* name: string
* email: string unique
* password: string
* table: todos

* id: int (usar id padrão)
* user_id: int references id on users
* name: string
* description: string
* deadline: date
* ended_at: date nullable

</p>