<?php

use Illuminate\Support\Facades\Route;

// COntrollers
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\AuthenticationController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\InvoicesController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great! create
|
*/

Route::get('/', function () {
    return redirect('login');
});

Route::get('productos', [ProductsController::class, 'index'])->name('list_products');
Route::get('productos/nuevo', [ProductsController::class, 'create'])->name('new_product');
Route::post('productos', [ProductsController::class, 'store'])->name('add_product');;
Route::post('productos/buy', [ProductsController::class, 'buy'])->name('buy');

Route::get('facturas', [InvoicesController::class, 'index'])->name('invoices');
Route::get('facturas/{id}', [InvoicesController::class, 'show'])->name('details');
Route::get('facturas/{id}/enviar', [InvoicesController::class, 'sendInvoice'])->name('send_invoice');

Route::get('signup', [AuthenticationController::class, 'showSignup'])->name('signup');
Route::post('signup', [AuthenticationController::class, 'signup'])->name('p_signup');
Route::get('login', [AuthenticationController::class, 'showLogin'])->name('login');
Route::post('login', [AuthenticationController::class, 'login'])->name('p_login');
Route::get('logout', [AuthenticationController::class, 'logout'])->name('logout');
