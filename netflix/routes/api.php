<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\TypeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\VideoController;
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

Route::resource('/users', UserController::class)->names('users');
Route::resource('/categories', CategoryController::class)->names('categories');
Route::resource('/users', UserController::class)->names('users');
Route::resource('/videos', VideoController::class)->names('videos');

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
