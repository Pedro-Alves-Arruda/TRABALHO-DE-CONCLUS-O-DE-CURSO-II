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
    return view('login' , ["NomesInputs"=>array("Email", "Senha")]);
})->name('loginGet');

Route::get('/welcome', function () {
    return view('welcome');
})->name('welcome');

Route::post('/login', [ \App\Http\Controllers\login::class, 'Login' ])->name("login");


Route::middleware('Autenticacao')->prefix('v1/NotaGsm')->group(function(){

    Route::get('/Listarjson', [ \App\Http\Controllers\NotaGsm::class, 'listarJson' ])->name('listarjson');
    
    Route::get('/Listar', [ \App\Http\Controllers\NotaGsm::class, 'listar' ])->name('listar');
    
    Route::get('/ExibirTelaCadastro', [ \App\Http\Controllers\NotaGsm::class, 'ExibirTelaCadastro' ])->name('ExibirTelaCadastro');
    
    Route::post('/Cadastrar', [ \App\Http\Controllers\NotaGsm::class, 'cadastrar' ])->name('Cadastrar');
});


Route::apiResource("produto", "App\Http\Controllers\Usuario");


