<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\ProductoController;

Route::get('/crearCategoria', [CategoriaController::class, 'create']);

Route::post('/insertarCategoria', [CategoriaController::class, 'store']);

Route::get('/crearProducto', [ProductoController::class, 'create']);


Route::get('/', function () {
    return view('PaginaPrincipal');
});