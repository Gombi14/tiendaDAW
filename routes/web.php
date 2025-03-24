<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\PedidoController;



Route::controller(CategoriaController::class)->group(function ()
{
    Route::get('/tienda', 'tienda')->name('categoria.tienda');
    Route::get('/crearCategoria', 'create')->name('categoria.create');
    Route::get('/editarCategoria/{id}', 'edit')->name('categoria.edit');
    Route::get('/mostrarCategorias', 'index')->name('categoria.index');
    Route::get('/mostrarCategoriasDesactivadas', 'showDeactivated')->name('categoria.showDeactivated');
    Route::post('/insertarCategoria', 'store')->name('categoria.store');
    Route::post('/updateCategoria/{id}', 'update')->name('categoria.update');
    Route::post('/desactivarCategoria{id}', 'deactivate')->name('categoria.deactivate');
    Route::post('/activarCategoria{id}', 'activate')->name('categoria.activate');

});

Route::controller(ProductoController::class)->group(function ()
{
    Route::post('/getProductos', 'getAll')->name('producto.getAll');
    Route::get('/crearProducto', 'create')->name('producto.create');
    Route::get('/editarProducto/{id}', 'edit')->name('producto.edit');
    Route::get('/mostrarProductos', 'index')->name('producto.index');
    Route::get('/mostrarProductosDesactivados', 'showDeactivated')->name('producto.showDeactivated');
    Route::post('/insertarProducto', 'store')->name('producto.store');
    Route::post('/updateProducto/{id}', 'update')->name('producto.update');
    Route::post('/desactivarProducto/{id}', 'deactivate')->name('producto.deactivate');
    Route::post('/activarProducto/{id}', 'activate')->name('producto.activate');
    Route::get('/', 'showPrincipal')->name('producto.showPrincipal');
    Route::get('/paintImg', 'paintImg')->name('producto.paint');
    Route::post('/updateImg', 'updateImg')->name('producto.updateImg');
    Route::get('/mostrarGraficos', 'mostrarGraficos');
    

});

Route::controller(PedidoController::class)->group(function()
    {
    Route::get('/mostrarPedidos', 'index')->name('pedido.index');
    Route::get('/cambiarEstadoPedido/{id}', 'changeStatus')->name('pedido.changeStatus');
    Route::get('/facturaPDF/{id}', 'generarPDF')->name('pedido.generarPDF');
});


Route::get('/dashboard', function () {
    return view('pages.dashboard');
})->name('principal-admin');

// route::get('/tienda', function(){
//     return view('pages.productos');
// })->name('tienda');
