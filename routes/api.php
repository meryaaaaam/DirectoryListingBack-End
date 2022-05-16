<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\user\PasswordController;
use App\Http\Controllers\user\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group([
    'middleware' => 'api',
    'prefix' => 'auth'
], function ($router) {
    Route::post('/login', [AuthController::class, 'login']);
    Route::post('/register', [AuthController::class, 'register']);
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::post('/refresh', [AuthController::class, 'refresh']);
    Route::get('/user-profile', [AuthController::class, 'userProfile']);
    Route::get('/roles', [AuthController::class, 'getRoles']);
    Route::post('/new_pass', [PasswordController::class, 'store']);
    Route::put('users/active', [UserController::class, 'ActiveUser']);
    Route::put('/upload-image', [UserController::class, 'uploadimage']);


});


Route::apiResource("users", UserController::class);


