<?php

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

Route::post('/register', [\App\Http\Controllers\API\AuthController::class, 'register'])->name('register.api.store');

Route::post('/login', [\App\Http\Controllers\API\AuthController::class, 'login'])->name('login.api.store');

Route::middleware('auth:sanctum')->group(function () {
    Route::get('/myAccount', [\App\Http\Controllers\API\AuthController::class, 'myAccount'])->name('myAccount.api.show');
});
Route::get('/users', [\App\Http\Controllers\API\UserController::class, 'index'])->name('users.api.index');
Route::get('/priority', [\App\Http\Controllers\API\PriorityController::class, 'priority'])->name('priority.api.index');
Route::get('/status', [\App\Http\Controllers\API\StatusController::class, 'status'])->name('status.api.index');
