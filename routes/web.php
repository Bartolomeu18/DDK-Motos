<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\AgenteController;
use  App\Http\Controllers\MotoqueiroController;
use App\Http\Controllers\MotoController;
use App\Http\Controllers\MotoqueiroNoCampoController;
use App\Http\Controllers\GaragemController;
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
    // Motos
Route::get('/gestão de motorizadas',[MotoController::class,'index'])->name('gestão-moto');  
Route::get('/motos/formulário', [MotoController::class, 'create'])->name('motos.create');
Route::post('/motos/create', [MotoController::class, 'store'])->name('motos.store');
Route::get('/moto/{id}/edit', [MotoController::class, 'edit'])->name('moto-editar');
Route::put('/moto/{id}/update', [MotoController::class, 'update'])->name('moto-atualizar');
Route::delete('/moto/{id}/delete', [MotoController::class, 'destroy'])->name('moto-excluir');
    //Motoqueiro no campo(nas ruas,tirar moto da garagem)
Route::get('/motoqueiros/rua', [MotoqueiroNoCampoController::class,'index'])->name('motoqueiros-index');
Route::get('/Adicionar motoqueiro ao campo/{id}',[MotoqueiroNoCampoController::class,'store'])->name('motoqueiros-campo');
    //tira motoqueiro do campo(meter moto na garagem)
Route::get('/Receber as motorizadas', [GaragemController::class, 'index'])->name('motos.garagem');


    // Relatórios
    Route::get('/relatorios/diario', [RelatorioController::class, 'diario'])->name('relatorios.diario');
});