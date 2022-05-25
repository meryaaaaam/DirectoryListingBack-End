<?php

use App\Http\Controllers\AdvancedSearchController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProviceController;
use App\Http\Controllers\Category\CategoryController;
use App\Http\Controllers\Category\ServiceController;
use App\Http\Controllers\Category\SubCategoryController;
use App\Http\Controllers\user\PasswordController;
use App\Http\Controllers\user\UserController;
use App\Http\Controllers\user\UserServiceController;
use App\Models\UserService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SearchController;

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
    Route::get('/user-profile2', [AuthController::class, 'userProfilewithAdr']);
    Route::get('/roles', [AuthController::class, 'getRoles']);
    Route::post('/new_pass', [PasswordController::class, 'store']);
    Route::put('users/active', [UserController::class, 'ActiveUser']);
    Route::put('/upload-image', [UserController::class, 'uploadimage']);
    Route::get("search/{label}", [CategoryController::class, 'search']);
    Route::get("search_categories", [CategoryController::class, 'search2']);
    Route::get("search-services/{label}", [ServiceController::class, 'search']);


});


Route::apiResource("users", UserController::class);
Route::apiResource("categories", CategoryController::class);
Route::apiResource("sub-category", SubCategoryController::class);
Route::apiResource("services", ServiceController::class);
Route::apiResource("userservices", UserServiceController::class);

Route::get("test", [UserServiceController::class, 'userservice']);
Route::get("SearchByLabel", [CategoryController::class, 'SearchByLabel']);


Route::put("isActive/{user}", [UserController::class, 'isActive']);
Route::put('users/isActive/{user}', [UserController::class, 'ActiveUser']);


Route::apiResource("provinces", ProviceController::class);

Route::post('users/update/{user}', [UserController::class, 'update2']);

Route::get('users/adress/{user}', [UserController::class, 'getAdress']);

Route::get("UserByIDCat/{label}", [CategoryController::class, 'SearchUserByLabel']);

Route::get("UserByCat/{id}", [CategoryController::class, 'SearchUserByLabelID']);


Route::get("searchAll", [CategoryController::class, 'Search']);

Route::get("search/all", [AdvancedSearchController::class, 'Search2']);
