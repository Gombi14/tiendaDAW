<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\PedidoController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CarritoContoller;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\PayPalController;

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
    Route::get('/producto/{id}', 'show')->name('producto.show');
    Route::get('/paintImg', 'paintImg')->name('producto.paint');
    Route::post('/updateImg', 'updateImg')->name('producto.updateImg');
    Route::get('/mostrarGraficos', 'mostrarGraficos');
    

});

Route::controller(PedidoController::class)->group(function()
    {
    Route::get('/mostrarPedidos', 'index')->name('pedido.index');
    Route::get('/checkout', 'checkout')->name('pedido.checkout');
    Route::get('/cambiarEstadoPedido/{id}', 'changeStatus')->name('pedido.changeStatus');
    Route::get('/facturaPDF/{id}', 'generarPDF')->name('pedido.generarPDF');
});

Route::controller(AuthController::class)->group(function()
{
    Route::get('/login', 'showLoginForm')->name('login');
    Route::post('/login', 'login')->name('login.post');
    Route::get('/logout', 'logout')->name('logout');
});

Route::controller(CarritoContoller::class)->group(function()
{
    Route::get('/carrito', 'index')->name('showCarrito');
    Route::post('/addToCart', 'addToCart')->name('addToCart');
    Route::post('/update-cart', 'updateCart')->name('updateCart');
    Route::get('/delete-cart-item/{id}', 'deleteCartItem')->name('deleteCartItem');
});

Route::controller(UsuarioController::class)->group(function()
{
    Route::get('/register', 'showRegister')->name('showRegisterForm');
    Route::post('/register', 'store')->name('newUser');
});

Route::get('/dashboard', function () {
    return view('pages.dashboard');
})->name('principal-admin');



Route::get('/paypal/pay', [PayPalController::class, 'createPayment'])->name('paypal.pay');
Route::get('/paypal/success', [PayPalController::class, 'executePayment'])->name('paypal.success');
Route::get('/paypal/cancel', [PayPalController::class, 'cancelPayment'])->name('paypal.cancel');
