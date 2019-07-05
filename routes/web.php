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
    return view('/auth/login');
});
Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');

Route::get('/administrador/inicio', 'AdministradorController@index');
Route::resource('administrador', 'AdministradorController');

Route::get('/pacientes/registrarPaciente', 'PacienteController@create');
Route::get('/pacientes/inicio', 'PacienteController@index');
Route::get('/pacientes/listarPacientes', 'PacienteController@show');
Route::delete('/pacientes/eliminarPaciente/{id}', 'PacienteController@destroy');
Route::resource('pacientes', 'PacienteController');

Route::get('/medicosGenerales/registrarMedicoGeneral', 'MedicoGeneralController@create');
Route::get('/medicosGenerales/listarMedicosGenerales', 'MedicoGeneralController@show');
Route::delete('/medicosGenerales/eliminarMedicoGeneral/{id}', 'MedicoGeneralController@destroy');
Route::resource('medicosGenerales', 'MedicoGeneralController');

Route::get('/medicosEspecialistas/registrarMedicoEspecialista', 'MedicoEspecialistaController@create');
Route::get('/medicosEspecialistas/listarMedicosEspecialistas', 'MedicoEspecialistaController@show');
Route::delete('/medicosEspecialistas/eliminarMedicoEspecialista/{id}', 'MedicoEspecialistaController@destroy');
Route::resource('medicosEspecialistas', 'MedicoEspecialistaController');




