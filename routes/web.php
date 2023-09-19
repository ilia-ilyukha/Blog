<?php

use App\Http\Controllers\admin\HomeController;
use Illuminate\Support\Facades\Route;
use Symfony\Component\Routing\RouteCompiler;

use App\Http\Controllers\admin\OrderController;

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
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware(['role:admin'])->prefix('admin_panel')->group(function () {

    Route::get('/', [App\Http\Controllers\admin\HomeController::class, 'index']);

    Route::resource('orders', OrderController::class);
});

