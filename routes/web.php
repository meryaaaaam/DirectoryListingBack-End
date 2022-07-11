<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\user\UserController;
use App\Http\Controllers\User\UserExportController;
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
    return view('welcome');
});

Route::get('users/export', [UserExportController::class, 'export']);

//Route::get('users/send-mail/{id}', [UserController::class, 'ActiveUser']);
