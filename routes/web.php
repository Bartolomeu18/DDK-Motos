<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\AgenteController;
use  App\Http\Controllers\MotoqueiroController;
Route::get('/', function () {
    return view('welcome');
});
Route::get('/login',[LoginController::class,'index'])->name('login');
Route::post('/login attempting',[LoginController::class,'Attempt'])->name('login-Attempt');
Route::get('/Tela cadastro de Usuário',[LoginController::class,'cadastrar'])->name('tela-cadastro');
Route::post('/Cadastrar-Usuário',[LoginController::class,'store'])->name('cadastrar-usuário');


Route::middleware(['auth'])->group(function () {

    //Agents route list
Route::get('/dashboard', [AgenteController::class, 'index'])->name('dashboard');
Route::get('/logout',[AgenteController::class,'logout'])->name('logout');
Route::get('/gestão de motoqueiros',[AgenteController::class,'motoqueiros'])->name('gestão-motoqueiro');
    // Motoqueiros
Route::get('/motoqueiros/create', [MotoqueiroController::class, 'create'])->name('motoqueiros.create');
Route::post('/motoqueiros/store', [MotoqueiroController::class, 'store'])->name('motoqueiros.store');
Route::get('/motoqueiros/{user}/edit', [MotoqueiroController::class, 'edit'])->name('editar-motoqueiro');
Route::put('/motoqueiros/{user}/update', [MotoqueiroController::class, 'update'])->name('atualizar-motoqueiro');
Route::delete('/motoqueiros/{user}/delete', [MotoqueiroController::class, 'destroy'])->name('excluir-motoqueiro');

Route::get('/motoqueiros/rua', [MotoqueiroController::class, 'rua'])->name('motoqueiros.rua');

    // Motos
    Route::get('/motos/create', [MotoController::class, 'create'])->name('motos.create');
    Route::get('/motos/receber', [MotoController::class, 'receber'])->name('motos.receber');

    // Relatórios
    Route::get('/relatorios/diario', [RelatorioController::class, 'diario'])->name('relatorios.diario');
});