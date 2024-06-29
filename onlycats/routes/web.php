<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\Middleware;


Route::get('/', [UserController::class, 'index']) -> name('/');

Route::get('/login', [UserController::class, 'login']) -> name('login');
Route::post('/loging', [UserController::class, 'loging']) -> name('loging');
Route::get('/logout', [UserController::class, 'logout']) -> middleware(Middleware::class) -> name('logout') ;

Route::get('/register', [UserController::class, 'register']) -> name('register');
Route::post('/registing', [UserController::class, 'registerPost']) -> name('registering');

Route::post('/producto/sort', [ProductoController::class, 'sortby']) -> name('producto.sortby'); //lista de elementos
Route::get('/producto', [ProductoController::class, 'index']) -> name('producto'); //lista de elementos
Route::get('/producto/list', [ProductoController::class, 'list'])->middleware(Middleware::class) -> name('producto.list'); //lista de elementos
Route::post('/producto/search', [ProductoController::class, 'search']) -> name('producto.search'); //lista de elementos
Route::post('/producto/substract', [ProductoController::class, 'sustractstock']) -> name('producto.substract'); //lista de elementos
Route::get('/producto/create', [ProductoController::class, 'create'])->middleware(Middleware::class) -> name('producto.create'); // vista editar formulario
Route::post('/producto/store', [ProductoController::class, 'store'])->middleware(Middleware::class) -> name('producto.store'); // ruta guardar
Route::post('/producto/update', [ProductoController::class, 'update'])->middleware(Middleware::class) -> name('producto.update'); // ruta actualizar
Route::delete('/producto/delete', [ProductoController::class, 'delete'])->middleware(Middleware::class) -> name('producto.delete'); // ruta eliminar

Route::get('/categoria', [CategoriaController::class, 'index']) -> name('category'); //lista de elementos

Route::get('/categoria/list', [CategoriaController::class, 'list'])->middleware(Middleware::class) -> name('category.list'); //lista de elementos
Route::get('/categoria/create', [CategoriaController::class, 'create'])->middleware(Middleware::class) -> name('category.create'); // vista editar formulario
Route::post('/categoria/store', [CategoriaController::class, 'store'])->middleware(Middleware::class) -> name('category.store'); // ruta guardar
Route::post('/categoria/update', [CategoriaController::class, 'update'])->middleware(Middleware::class) -> name('category.update'); // ruta actualizar
Route::delete('/categoria/delete', [CategoriaController::class, 'delete'])->middleware(Middleware::class) -> name('category.delete'); // ruta eliminar


