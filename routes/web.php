<?php

use App\Http\Controllers\CarroController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
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
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::resource('users', UserController::class);
Auth::routes();

// CONTAS
Route::get('/index-carro', [CarroController::class, 'index'])->name('carro.index');
Route::get('/create-carro', [CarroController::class, 'create'])->name('carro.create');
Route::post('/store-carro', [CarroController::class, 'store'])->name('carro.store');
Route::get('/show-carro/{carro}', [CarroController::class, 'show'])->name('carro.show');
Route::get('/edit-carro/{carro}', [CarroController::class, 'edit'])->name('carro.edit');
Route::put('/update-carro/{carro}', [CarroController::class, 'update'])->name('carro.update');
Route::delete('/destroy-carro/{carro}', [CarroController::class, 'destroy'])->name('carro.destroy');
Route::get('/change-estado-carro/{carro}', [CarroController::class, 'changeEstado'])->name('carro.change-estado');

Route::get('/gerar-pdf-carro', [CarroController::class, 'gerarPdf'])->name('carro.gerar-pdf');

// Clientes
Route::get('/index-cliente', [ClienteController::class, 'index'])->name('cliente.index');
Route::get('/create-cliente', [ClienteController::class, 'create'])->name('cliente.create');
Route::post('/store-cliente', [ClienteController::class, 'store'])->name('cliente.store');
Route::get('/show-cliente/{cliente}', [ClienteController::class, 'show'])->name('cliente.show');
Route::get('/edit-cliente/{cliente}', [ClienteController::class, 'edit'])->name('cliente.edit');
Route::put('/update-cliente/{cliente}', [ClienteController::class, 'update'])->name('cliente.update');
Route::delete('/destroy-cliente/{cliente}', [ClienteController::class, 'destroy'])->name('cliente.destroy');
Route::get('/change-estado-cliente/{cliente}', [ClienteController::class, 'changeEstado'])->name('cliente.change-estado');

Route::get('/gerar-pdf-cliente', [ClienteController::class, 'gerarPdf'])->name('cliente.gerar-pdf');