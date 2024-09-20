<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\CidadeController;
use App\Http\Controllers\RepresentanteController;


// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', function () {
    return redirect()->route('clientes.index');
});

// Rotas de clientes
Route::get('/clientes', [ClienteController::class, 'index'])->name('clientes.index');

// Criar cliente
Route::get('/clientes/create', [ClienteController::class, 'create'])->name('clientes.create');
Route::post('/clientes', [ClienteController::class, 'store'])->name('clientes.store');

// Atualizar cliente
Route::get('/clientes/{cliente}/edit', [ClienteController::class, 'edit'])->name('clientes.edit');
Route::put('/clientes/{cliente}', [ClienteController::class, 'update'])->name('clientes.update');

// Deletar cliente
Route::delete('/clientes/{id}', [ClienteController::class, 'destroy'])->name('clientes.destroy');
Route::get('/clientes/{id}/representantes', [ClienteController::class, 'representantes']);

// Mostrar cliente
Route::get('/cidades', [CidadeController::class, 'index']);
Route::get('/cidades/{id}', [CidadeController::class, 'show']);

// Representantes
Route::get('/representantes', [RepresentanteController::class, 'index']);

Route::get('/representantes/{id}', [RepresentanteController::class, 'show']);

Route::post('/representantes', [RepresentanteController::class, 'store']);

Route::put('/representantes/{id}', [RepresentanteController::class, 'update']);

Route::delete('/representantes/{id}', [RepresentanteController::class, 'destroy']);





