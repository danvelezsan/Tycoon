<?php

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

Route::get('/', function () {
    return view('/welcome');
});
Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');

Route::get('/pacientes/registrarPaciente', 'PacienteController@create')->middleware('auth', 'role:Administrador');
Route::get('/pacientes', 'PacienteController@index');
Route::get('/pacientes/listarPacientes', 'PacienteController@show')->middleware('auth', 'role:Administrador');
Route::delete('/pacientes/eliminarPaciente/{id}', 'PacienteController@destroy')->middleware('auth', 'role:Administrador');
Route::resource('pacientes', 'PacienteController')->middleware('auth', 'role:Administrador');

Route::get('/medicosGenerales/registrarMedicoGeneral', 'MedicoGeneralController@create')->middleware('auth', 'role:Administrador');
Route::get('/medicosGenerales/listarMedicosGenerales', 'MedicoGeneralController@show')->middleware('auth', 'role:Administrador');
Route::delete('/medicosGenerales/eliminarMedicoGeneral/{id}', 'MedicoGeneralController@destroy')->middleware('auth', 'role:Administrador');
Route::resource('medicosGenerales', 'MedicoGeneralController')->middleware('auth', 'role:Administrador');

Route::get('/medicosEspecialistas/registrarMedicoEspecialista', 'MedicoEspecialistaController@create')->middleware('auth', 'role:Administrador');
Route::get('/medicosEspecialistas/listarMedicosEspecialistas', 'MedicoEspecialistaController@show')->middleware('auth', 'role:Administrador');
Route::delete('/medicosEspecialistas/eliminarMedicoEspecialista/{id}', 'MedicoEspecialistaController@destroy')->middleware('auth', 'role:Administrador');
Route::resource('medicosEspecialistas', 'MedicoEspecialistaController')->middleware('auth', 'role:Administrador');




