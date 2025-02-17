<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\PagoController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::post('login', [AuthController::class, 'login']);


Route::middleware('auth:sanctum')->group(function(){
    Route::get('users', [AuthController::class, 'index']);
    Route::post('register', [AuthController::class, 'register']);
    Route::get('find/{id}', [AuthController::class, 'show']);
    Route::delete('destroy/{id}', [AuthController::class, 'destroy']);
    Route::put('update/{id}', [AuthController::class, 'update']);
    Route::get('user', [AuthController::class, 'user']);
    Route::get('/index', [PagoController::class, 'index']);
    Route::get('/index/{id}', [PagoController::class, 'show']);
    Route::post('logout', [AuthController::class, 'logout']); 
});