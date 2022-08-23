<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AnunciosController;
use App\Http\Controllers\BasesDatosController;
use App\Http\Controllers\ComentariosController;
use App\Http\Controllers\ContactosController;
use App\Http\Controllers\ContratosController;
use App\Http\Controllers\DepartamentosController;
use App\Http\Controllers\EmpleadosController;
use App\Http\Controllers\EventosController;
use App\Http\Controllers\ModelosController;
use App\Http\Controllers\PreguntasController;
use App\Http\Controllers\RespuestasController;
use App\Http\Controllers\ProyectosController;
use App\Http\Controllers\RiesgosController;
use App\Http\Controllers\PerfilConfigController;

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


//Route::resource('configuracion', PerfilConfigController::class);



//Authenticated Routes
Route::middleware(['auth'])->group( function () {
    Route::get('/profile/edit', 'App\Http\Controllers\ProfileController@edit')->name('profile.edit');
    Route::get('/profile/change-password', 'App\Http\Controllers\ProfileController@change_password')->name('profile.change-password');
    Route::get('/profile', 'App\Http\Controllers\ProfileController@index')->name('profile.index');
    Route::patch('/profile', 'App\Http\Controllers\ProfileController@update')->name('profile.update');
    Route::post('respuestas/{id}', [RespuestasController::class, 'store'])->name('respuestas.store');

    Route::get('/', function () {
        return view('index');
    })->name('home');

//    Route::get('/users',[UserController::class,'index']);
    Route::get('/registro1/generatePDF', [AnunciosController::class, 'generatePDF'])->name('registro1.generatePDF');
    Route::resource('registro1', AnunciosController::class);

    Route::resource('registro3', BasesDatosController::class);
    Route::get('/registro3/generatePDF', [BasesDatosController::class, 'generatePDF'])->name('registro3.generatePDF');
    
    Route::resource('registro4', ComentariosController::class);
    Route::get('/registro4/generatePDF', [ComentariosController::class, 'generatePDF'])->name('registro4.generatePDF');
    
    Route::resource('contactos', ContactosController::class);
    Route::resource('registro6', ContratosController::class);
    Route::get('/registro6/generatePDF', [ContratosController::class, 'generatePDF'])->name('registro6.generatePDF');

    Route::resource('departamentos', DepartamentosController::class);
    Route::get('/registro5/generatePDF', [DepartamentosController::class, 'generatePDF'])->name('registro5.generatePDF');
    
    Route::resource('registro7', EventosController::class);
    Route::get('/registro7/generatePDF', [EventosController::class, 'generatePDF'])->name('registro7.generatePDF');
    
    Route::resource('empleados', EmpleadosController::class);
    Route::resource('registro2', ModelosController::class);
    Route::get('/registro2/generatePDF', [ModelosController::class, 'generatePDF'])->name('registro2.generatePDF');

    Route::resource('registro8', PreguntasController::class);
    Route::get('/registro8/generatePDF', [PreguntasController::class, 'generatePDF'])->name('registro8.generatePDF');
    
    // Route::resource('respuestas', RespuestasController::class);
    Route::resource('registro9', ProyectosController::class);
    Route::get('/registro9/generatePDF', [ProyectosController::class, 'generatePDF'])->name('registro9.generatePDF');

    Route::get('/registro10/generatePDF', [RiesgosController::class, 'generatePDF'])->name('registro10.generatePDF');
    Route::resource('registro10', RiesgosController::class);

});
