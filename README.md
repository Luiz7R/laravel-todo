<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## About Laravel

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel takes the pain out of development by easing common tasks used in many web projects, such as:

- [Simple, fast routing engine](https://laravel.com/docs/routing).
- [Powerful dependency injection container](https://laravel.com/docs/container).
- Multiple back-ends for [session](https://laravel.com/docs/session) and [cache](https://laravel.com/docs/cache) storage.
- Expressive, intuitive [database ORM](https://laravel.com/docs/eloquent).
- Database agnostic [schema migrations](https://laravel.com/docs/migrations).
- [Robust background job processing](https://laravel.com/docs/queues).
- [Real-time event broadcasting](https://laravel.com/docs/broadcasting).

Laravel is accessible, powerful, and provides tools required for large, robust applications.

Projeto Todo-Auth
Ideia: Criar uma Todo List com integração de Usuários Fullstack ou Rest: A decidir.

SOLID Aplicado [x]

Rotas:

POST - /auth/register - Registra um usuário [X]

POST - /auth/login - Autentica um usuário [X]

GET - /todos - Retorna uma lista/view de todos os afazeres do usuário [x]

POST - /todos - Cria um TODO para o usuário autenticado [x]

GET - /todo/{todoId} - Retorna um array/view com o todo selecionado do usuário (precisa pertencer ao mesmo) [x]

PUT - /up/todos/{todoId} - Atualiza um TODO de um usuário autenticado [x]

DELETE - /delete/todos/{todoId} - Deleta um TODO de um usuário autenticado [x]



Migrations:

table: users

id: int (usar id padrão)
name: string
email: string unique
password: string
table: todos

id: int (usar id padrão)
user_id: int references id on users
name: string
description: string
deadline: date
ended_at: date nullable