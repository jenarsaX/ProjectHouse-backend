<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\PagoController;
use App\Http\Controllers\TenantController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::post('login', [AuthController::class, 'login']);


Route::middleware('auth:sanctum')->group(function(){
    Route::get('users', [AuthController::class, 'index']); //mostrar todos los usuarios
    Route::post('register', [AuthController::class, 'register']); //registrar todos los usuarios
    Route::get('find/{id}', [AuthController::class, 'show']); //buscar un usuario 
    Route::delete('destroy/{id}', [AuthController::class, 'destroy']); //eliminar un usuario
    Route::put('update/{id}', [AuthController::class, 'update']); //actualizar un usuario
    Route::get('user', [AuthController::class, 'user']); //obtener al usuario que inicio sesión
    Route::get('/pagos', [PagoController::class, 'index']); //mostrar todos los pagos
    Route::post('/pagos', [PagoController::class, 'store']); //creacion de una renta
    Route::get('/pagos/{id}', [PagoController::class, 'show']); //buscar un pago por id
    Route::put('/pagos/{id}', [PagoController::class, 'update']); //actualizar un pago por id
    Route::post('/pagos/{id}', [PagoController::class, 'destroy']); //eliminar un pago por id
    Route::post('logout', [AuthController::class, 'logout']);  //cerrar sesión
    Route::get('department', [DepartmentController::class, 'index']); //mostrar todos los departamentos
    Route::post('department', [DepartmentController::class, 'store']); //crear un departamento
    Route::get('department/{id}', [DepartmentController::class, 'show']); //buscar un departamento
    Route::put('department/{id}', [DepartmentController::class, 'update']); //actualizar un departamento
    Route::delete('department/{id}', [DepartmentController::class, 'destroy']); //actualizar un departamento
    Route::get('tenant', [TenantController::class, 'index']); //mostrar todos los inquilinos
    Route::post('tenant', [TenantController::class, 'store']); //registrar un inquilino
    Route::get('tenant/{id}', [TenantController::class, 'show']); //buscar un inquilino
    Route::put('tenant/{id}', [TenantController::class, 'update']); //actualizar un inquilino
    Route::delete('tenant/{id}', [TenantController::class, 'destroy']); //actualizar un inquilino
    
});