<?php

use App\Http\Controllers\admin\CategoryController;
use App\Http\Controllers\admin\HomeController;
use Illuminate\Support\Facades\Route;
use Symfony\Component\Routing\RouteCompiler;

use App\Http\Controllers\admin\OrderController;
use App\Http\Controllers\admin\PostController;
use App\Http\Controllers\admin\QuestionController;
use App\Http\Controllers\admin\TaskController;
use App\Http\Controllers\admin\UserController;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware(['role:admin'])->prefix('admin_panel')->group(function () {

    Route::get('/', [App\Http\Controllers\admin\HomeController::class, 'index']);

    Route::resource('orders', OrderController::class);
    Route::resource('posts', PostController::class);
    Route::resource('questions', QuestionController::class);
    Route::resource('category', CategoryController::class);
    Route::resource('users', UserController::class);
    Route::resource('tasks', TaskController::class);    
    
});

//Router for vue.js
Route::view('{any}', 'welcome')
    ->where('any', '.*');

