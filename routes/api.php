<?php

use App\Http\Controllers\PagoController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/index', [PagoController::class, 'index']);
Route::get('/index/{id}', [PagoController::class, 'show']);