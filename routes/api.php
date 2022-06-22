<?php

use App\Http\Controllers\AdvancedSearchController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Category\CategoryController;
use App\Http\Controllers\Category\ServiceController;
use App\Http\Controllers\Category\SubCategoryController;
use App\Http\Controllers\ProviceController;
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
    Route::get('/profile', [AuthController::class, 'userProfilewithAdr']);

    Route::get('/roles', [AuthController::class, 'getRoles']);
    Route::post('/new_pass', [PasswordController::class, 'store']);
    Route::put('users/active', [UserController::class, 'ActiveUser']);
     Route::get("search/{label}", [CategoryController::class, 'search']);
   // Route::get("search_categories", [CategoryController::class, 'search2']);
    Route::get("search-services/{label}", [ServiceController::class, 'search']);

    Route::post('/upload-image/{user}', [UserController::class, 'uploadimage']);


});


Route::apiResource("users", UserController::class);
Route::apiResource("categories", CategoryController::class);
Route::apiResource("sub-category", SubCategoryController::class);
Route::apiResource("services", ServiceController::class);
Route::apiResource("userservices", UserServiceController::class);

Route::get("list/users", [UserController::class, 'getAllusers']);
Route::get("list/users/actifs", [UserController::class, 'getAllActifUsers']);
Route::get("list/users/preding", [UserController::class, 'getAllPredingUsers']);

Route::get("test", [UserServiceController::class, 'userservice']);
Route::get("SearchByLabel", [CategoryController::class, 'SearchByLabel']);

Route::get("search-now", [SearchController::class, 'search_now']);
Route::get("search-user-pro", [SearchController::class, 'pro']);
Route::get("search-user-company", [SearchController::class, 'company']);
Route::get("search-advanced", [SearchController::class, 'advanced']);
Route::get("search-word", [SearchController::class, 'word']);






Route::get("search-user", [SearchController::class, 'pro']);
Route::put("isActive/{user}", [UserController::class, 'isActive']);
Route::put('userss/isActive/{user}', [UserController::class, 'ActiveUser']);


Route::apiResource("provinces", ProviceController::class);

Route::put('userss/update/{user}', [UserController::class, 'update2']);

Route::post('userss/update/{user}', [UserController::class, 'updateImage']);

Route::post('userss/updateCV/{user}', [UserController::class, 'updateCV']);

Route::get('users/adress/{user}', [UserController::class, 'getAdress']);

Route::get("UserByIDCat/{label}", [CategoryController::class, 'SearchUserByLabel']);

Route::get("UserByCat/{id}", [CategoryController::class, 'SearchUserByLabelID']);


Route::get("searchAll", [AdvancedSearchController::class, 'Search']);
Route::get("searchByLabel", [AdvancedSearchController::class, 'searchByLabel']);

Route::get("all/search", [AdvancedSearchController::class, 'Search22']);
//Route::get("Search/AllItem", [AdvancedSearchController::class, 'advsearch']);

Route::get("Search/AllItem/{label}", [AdvancedSearchController::class, 'advsearch']);
Route::get("Search/AllItem/{label}/{location}", [AdvancedSearchController::class, 'advsearch2']);


Route::get('allusers/pro', [UserController::class, 'getAllPro']);
Route::get('allusers/company', [UserController::class, 'getAllCompany']);
Route::put('note/{id}', [UserController::class, 'note']);


Route::get("users/send-mail/{id}", [UserController::class, 'ActiveUser']);
