<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\CarroController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\FuncionarioController;
use App\Http\Controllers\OrcamentoController;
use App\Http\Controllers\OrdenServicoController;
use App\Http\Controllers\ServicoController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Gate;
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

/*Route::get('/', function () {
    return view('index');
});*/

Route::get('/dashboard', [ProfileController::class,'index'])->name('dashboard');
Route::resource('servicos', ServicoController::class);
Route::get('/logout', [ProfileController::class,'logout'])
                ->name('logout');
Route::get('/', [ProfileController::class,'index'])
                ->name('/');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    /*Rotas */
    Route::middleware('accessUser')->group(function () {
    Route::resource('users', UserController::class);
    Route::resource('clientes', ClienteController::class);
    Route::resource('funcionarios', FuncionarioController::class);
    Route::resource('orcamentos', OrcamentoController::class);
    Route::resource('ordenServicos', OrdenServicoController::class);
    Route::get('gerar-pdf-funcionario', [FuncionarioController::class,'gerarPdf']);
    });
    

    // Carros
Route::get('/index-carro', [CarroController::class, 'index'])->name('carro.index')->middleware('accessUser');

Route::get('/create-carro', [CarroController::class, 'create'])->name('carro.create');
Route::post('/store-carro', [CarroController::class, 'store'])->name('carro.store');
Route::get('/show-carro/{carro}', [CarroController::class, 'show'])->name('carro.show');
Route::get('/edit-carro/{carro}', [CarroController::class, 'edit'])->name('carro.edit');
Route::put('/update-carro/{carro}', [CarroController::class, 'update'])->name('carro.update');
Route::delete('/destroy-carro/{carro}', [CarroController::class, 'destroy'])->name('carro.destroy');
Route::get('/change-estado-carro/{carro}', [CarroController::class, 'changeEstado'])->name('carro.change-estado');
Route::get('/change-cliente/{cliente}', [CarroController::class, 'changeCliente'])->name('carro.change-cliente');

Route::get('/gerar-pdf-carro', [CarroController::class, 'gerarPdf'])->name('carro.gerar-pdf');
});

require __DIR__.'/auth.php';
