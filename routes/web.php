<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\ProviderController;
use App\Http\Controllers\PriceController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\WarehouseController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\Cliente\ProductApiController;
use App\Http\Controllers\Cliente\OrderApiController;
use App\Http\Controllers\Cliente\UserApiController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return redirect()->route('login');
});

Auth::routes();

Route::group(['middleware' => ['role:superadministrador']], function () {
    Route::get('/home',[IndexController::class,'index' ]);
    Route::get('/admin',[IndexController::class,'index' ]);
    Route::resource('admin/categorias', CategoryController::class);
    Route::resource('admin/departamentos', DepartmentController::class);
    Route::resource('admin/proveedores', ProviderController::class);
    Route::resource('admin/precios', PriceController::class);
    Route::resource('admin/productos', ProductController::class);
    Route::put('admin/productos/{idPrice}/edit', [ProductController::class,'updatePrice'])->name("productos.updatePrice");
    Route::resource('admin/almacenes', WarehouseController::class);
    Route::resource('admin/clientes', ClientController::class);
    Route::resource('admin/pedidos', OrderController::class);
    Route::get('admin/pedidos-dercargarPedido/{id}', [OrderController::class,'descargarPedido'])->name("descargarPedido");
});

Route::group(['middleware' => ['role:cliente']], function () {
    Route::get('/cliente',  function () {
        return view('cliente.index');
    });
    Route::resource('cliente/apiproductos', ProductApiController::class);
    Route::resource('cliente/apipedidos', OrderApiController::class);
    Route::get('cliente/apipedidos-agregarproductos/{id}', [OrderApiController::class,'agregarproductos'])->name("agregarproductos");
    Route::resource('cliente/apiusers', UserApiController::class);
    Route::post('cliente/agregarproductospedido/', [OrderApiController::class,'agregarproductospedido'])->name("agregarproductospedido");
    Route::get('cliente/apipedidos-terminarpedido/{id}', [OrderApiController::class,'terminarpedido'])->name("terminarpedido");
    Route::get('cliente/apipedidos-quitarProducto/{idPedido}/{idProducto}', [OrderApiController::class,'quitarProducto'])->name("quitarProducto");
    Route::get('cliente/apiproducto-show/{id}',[ProductApiController::class,'show'])->name("productoapi.show");
});
