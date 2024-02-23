<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
Route::get('/comprar-productos', function () {
    return view('products.comprar_productos');
})->name('comprar_productos');

Route::get('/pago/mostrar-formulario', function () {
    return view('pago.formulario_pago');
})->name('pago.mostrar_formulario');

Route::get('/pago/exito', 'PagoController@exito')->name('pago.exito');
