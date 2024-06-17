<?php

use App\Http\Controllers\CarroController;
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
Auth::routes();

// CONTAS
Route::get('/index-carro', [CarroController::class, 'index'])->name('carro.index');
Route::get('/create-carro', [CarroController::class, 'create'])->name('carro.create');
Route::post('/store-carro', [CarroController::class, 'store'])->name('carro.store');
Route::get('/show-carro/{carro}', [CarroController::class, 'show'])->name('carro.show');
Route::get('/edit-carro/{carro}', [CarroController::class, 'edit'])->name('carro.edit');
Route::put('/update-carro/{carro}', [CarroController::class, 'update'])->name('carro.update');
Route::delete('/destroy-carro/{carro}', [CarroController::class, 'destroy'])->name('carro.destroy');
Route::get('/change-situation-carro/{carro}', [CarroController::class, 'changeSituation'])->name('carro.change-situation');

Route::get('/gerar-pdf-carro', [CarroController::class, 'gerarPdf'])->name('carro.gerar-pdf');

Route::get('/gerar-csv-carro', [CarroController::class, 'gerarCsv'])->name('carro.gerar-csv');