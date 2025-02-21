<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\ProductoController;



Route::controller(CategoriaController::class)->group(function ()
{
    Route::get('/crearCategoria', 'create');
    Route::post('/insertarCategoria', 'store')->name('categoria.store');
});

Route::controller(ProductoController::class)->group(function ()
{
    Route::get('/crearProducto', 'create');
    Route::post('/insertarProducto', 'store')->name('producto.store');
});


Route::get('/', function () {
    return view('PaginaPrincipal');
})->name('principalAdmin');