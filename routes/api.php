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
    Route::get('tasks', [\App\Http\Controllers\API\TaskController::class, 'index'])->name('tasks.api.index');
    Route::post('tasks/store', [\App\Http\Controllers\API\TaskController::class, 'store'])->name('tasks.api.store');
});

