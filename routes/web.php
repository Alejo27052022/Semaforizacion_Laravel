<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\ChartController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('index', function(){
    return view('index');
});

Route::get('home', function(){
    return view('home');
})->name('home');

Route::get('/', function () {
    return view('index');
})->name('index');

Route::get('indexprofile', function(){
    return view('indexprofile');
})->name('indexprofile');

Route::get('loguser', function(){
    return view('loguser');
})->name('loguser');

Route::get('regisuser', function(){
    return view('regisuser');
})->name('regisuser');

Route::get('log_user', function(){
    return view('log_user');
})->name('log_user');

Route::get('log_out', function(){
    return view('log_out');
})->name('log_out');

Route::get('info', function(){
    return view('usuario.info');
})->name('info');

Route::get('denuncias_user', function(){
    return view('usuario.denun');
})->name('denuncias_user');

Route::get('solicitud', function(){
    return view('usuario.solicitud');
})->name('solicitud');

Route::get('denuncia_soli', function(){
    return view('denuncium.index');
})->name('denuncia_soli');

Route::get('register', function(){
    return view('register');
});

Route::get('usuario', function(){
    return view('usuario.show');
})->name('usuario');

Route::get('denuncia_user', function(){
    return view('denuncium.show');
})->name('denuncia_user');

Route::get('asistente_user', function(){
    return view('asistente.show');
})->name('asistente_user');

Route::get('estadisticas', function(){
    return view('denuncium.estadisticas');
});

Route::get('mapa_casos', function(){
    return view('maps.maps');
})->name('mapa_casos');


Route::get('/usuarios', [UsuarioController::class, 'index']);

Auth::routes();

Route::resource('casos', App\Http\Controllers\CasoController::class)->middleware('auth');
Route::resource('usuarios', App\Http\Controllers\UsuarioController::class)->middleware('auth');
Route::resource('denuncia', App\Http\Controllers\DenunciumController::class)->middleware('auth');
Route::resource('asistentes', App\Http\Controllers\AsistenteController::class)->middleware('auth');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::delete('asistentes/{asistente}', 'AsistenteController@destroy')->name('asistentes.destroy');
