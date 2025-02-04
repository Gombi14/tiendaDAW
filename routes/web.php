<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoriaController;

Route::get('/crearCategoria', [CategoriaController::class, 'create']);

Route::get('storeCategoria', [CategoriaController::class, 'store']);
