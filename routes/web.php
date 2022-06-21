<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TodoController; 

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

Route::get('/', [TodoController::class, 'welcome'])->name('welcome'); 
Route::post('/store', [TodoController::class, 'store'])->name('store');
Auth::routes();
Route::get('/todo/{id}', [TodoController::class, 'show'])->name('show');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::post('todo/delete/{id}', [TodoController::class, 'delete'])->name('todo.delete');
Route::get('/todo/edit/{id}', [TodoController::class, 'edit'])->name('todo.edit');
Route::post('todo/edit/{id}', [TodoController::class, 'update'])->name('todo.update');