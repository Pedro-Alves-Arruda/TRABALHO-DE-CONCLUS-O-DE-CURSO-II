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

Route::group(['middleware' => ['web']], function () {
    // Rotas protegidas com autenticação
    
    Route::get('/', function () {
        return view('login' , ["NomesInputs"=>array("Email", "Senha")]);
    })->name('loginGet');
    
    
    Route::post('/login', [ \App\Http\Controllers\login::class, 'Login' ])->name("login");
    
    
    Route::get('/welcome', function () {return view('welcome');})->name('welcome')->middleware('auth');
    
    
    Route::get('/Listarjson', [ \App\Http\Controllers\NotaGsm::class, 'listarJson' ])->name('listarjson')->middleware('auth');
    
    Route::get('/Listar', [ \App\Http\Controllers\NotaGsm::class, 'listar' ])->name('listar')->middleware('auth');
    
    Route::get('/ExibirTelaCadastro', [ \App\Http\Controllers\NotaGsm::class, 'ExibirTelaCadastro' ])->name('ExibirTelaCadastro')->middleware('auth');
    
    Route::post('/Cadastrar', [ \App\Http\Controllers\NotaGsm::class, 'cadastrar' ])->name('Cadastrar')->middleware('auth');
    
    
    
    Route::apiResource("produto", "App\Http\Controllers\Usuario");

});    


