<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\UserController;
use App\Models\Article;
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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });
Route::post('register', [RegisterController::class, '__invoke']);
Route::post('login', [LoginController::class, '__invoke']);
Route::post('logout', [LogoutController::class, '__invoke']);

Route::middleware(['auth:api'])->group(function () {
    Route::get('user', [UserController::class, '__invoke']);
    Route::post('article', [ArticleController::class, 'store']);
    Route::put('article/{article}', [ArticleController::class, 'update']);
    Route::delete('article/{article}', [ArticleController::class, 'destroy']);
});

Route::get('article', [ArticleController::class, 'index']);
Route::get('article/{article}', [ArticleController::class, 'show']);
