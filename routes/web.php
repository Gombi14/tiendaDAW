<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\ProductoController;



Route::controller(CategoriaController::class)->group(function ()
{
    Route::get('/crearCategoria', 'create')->name('categoria.create');
    Route::get('/editarCategoria/{id}', 'edit')->name('categoria.edit');
    Route::get('/mostrarCategorias', 'index');
    Route::post('/insertarCategoria', 'store')->name('categoria.store');
    Route::post('/updateCategoria', 'update')->name('categoria.update');
    Route::post('/desactivarCategoria', 'deactivate')->name('categoria.deactivate');

});

Route::controller(ProductoController::class)->group(function ()
{
    Route::get('/crearProducto', 'create')->name('producto.create');
    Route::get('/editarProducto/{id}', 'edit')->name('producto.edit');
    Route::get('/mostrarProductos', 'index');
    Route::post('/insertarProducto', 'store')->name('producto.store');
    Route::post('/updateProducto', 'update')->name('producto.update');
    Route::post('/desactivarProducto', 'deactivate')->name('producto.deactivate');
});


Route::get('/', function () {
    return view('PaginaPrincipalAdmin');
})->name('principalAdmin');