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
    if (Auth::check()) {
        return redirect('/home');
    }
    else {      
        return view('/auth/login');
    }
});


Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');


Route::get('/administrador/index', 'AdministradorController@index')->middleware('auth', 'role:Administrador');
Route::resource('administrador', 'AdministradorController')->middleware('auth', 'role:Administrador');


Route::get('/pacientes/index', 'PacienteController@index')->middleware('auth', 'role:Paciente');
Route::get('/pacientes/agenda', 'PacienteController@agenda')->middleware('auth', 'role:Paciente');
Route::get('/pacientes/agendarCitaGeneral', 'PacienteController@agendarCitaGeneral')->middleware('auth', 'role:Paciente');
Route::post('/pacientes/agendarCitaEspecialista/{id}', 'PacienteController@agendarCitaEspecialista')->name("pacientes.agendarCitaEspecialista")->middleware('auth', 'role:Paciente');
Route::post('/pacientes/storeCitaGeneral', 'PacienteController@storeCitaGeneral')->name("pacientes.storeCitaGeneral")->middleware('auth', 'role:Paciente');
Route::post('/pacientes/storeCitaEspecialista', 'PacienteController@storeCitaEspecialista')->name("pacientes.storeCitaEspecialista")->middleware('auth', 'role:Paciente');
Route::post('/pacientes/editCita/{id}', 'PacienteController@editCita')->name("pacientes.editCita")->middleware('auth', 'role:Paciente');
Route::post('/pacientes/updateCita', 'PacienteController@updateCita')->name("pacientes.updateCita")->middleware('auth', 'role:Paciente');
Route::delete('/pacientes/destroyCita/{id}', 'PacienteController@destroyCita')->name("pacientes.destroyCita")->middleware('auth', 'role:Paciente');
Route::get('/pacientes/ordenes', 'PacienteController@ordenes')->middleware('auth', 'role:Paciente');
Route::get('/pacientes/registrarPaciente', 'PacienteController@create')->middleware('auth', 'role:Administrador');
Route::get('/pacientes/listarPacientes', 'PacienteController@show')->middleware('auth', 'role:Administrador');
Route::delete('/pacientes/eliminarPaciente/{id}', 'PacienteController@destroy')->middleware('auth', 'role:Administrador');


Route::get('/medicosGenerales/index', 'MedicoGeneralController@index')->middleware('auth', 'role:MedicoGeneral');
Route::get('/medicosGenerales/agenda', 'MedicoGeneralController@agenda')->middleware('auth', 'role:MedicoGeneral');
Route::post('/medicosGenerales/generarOrden/{id}', 'MedicoGeneralController@generarOrden')->name("medicosGenerales.generarOrden")->middleware('auth', 'role:MedicoGeneral');
Route::post('/medicosGenerales/storeOrden', 'MedicoGeneralController@storeOrden')->name("medicosGenerales.storeOrden")->middleware('auth', 'role:MedicoGeneral');
Route::delete('/medicosGenerales/destroyCita/{id}', 'MedicoGeneralController@destroyCita')->name("medicosGenerales.destroyCita")->middleware('auth', 'role:MedicoGeneral');
Route::get('/medicosGenerales/registrarMedicoGeneral', 'MedicoGeneralController@create')->middleware('auth', 'role:Administrador');
Route::get('/medicosGenerales/listarMedicosGenerales', 'MedicoGeneralController@show')->middleware('auth', 'role:Administrador');
Route::delete('/medicosGenerales/eliminarMedicoGeneral/{id}', 'MedicoGeneralController@destroy')->middleware('auth', 'role:Administrador');


Route::get('/medicosEspecialistas/index', 'MedicoEspecialistaController@index')->middleware('auth', 'role:MedicoEspecialista');
Route::get('/medicosEspecialistas/agenda', 'MedicoEspecialistaController@agenda')->middleware('auth', 'role:MedicoEspecialista');
Route::post('/medicosEspecialistas/generarOrden/{id}', 'MedicoEspecialistaController@generarOrden')->name("medicosEspecialistas.generarOrden")->middleware('auth', 'role:MedicoEspecialista');
Route::post('/medicosEspecialistas/storeOrden', 'MedicoEspecialistaController@storeOrden')->name("medicosEspecialistas.storeOrden")->middleware('auth', 'role:MedicoEspecialista');
Route::delete('/medicosEspecialistas/destroyCita/{id}', 'MedicoEspecialistaController@destroyCita')->name("medicosEspecialistas.destroyCita")->middleware('auth', 'role:MedicoEspecialista');
Route::get('/medicosEspecialistas/registrarMedicoEspecialista', 'MedicoEspecialistaController@create')->middleware('auth', 'role:Administrador');
Route::get('/medicosEspecialistas/listarMedicosEspecialistas', 'MedicoEspecialistaController@show')->middleware('auth', 'role:Administrador');
Route::delete('/medicosEspecialistas/eliminarMedicoEspecialista/{id}', 'MedicoEspecialistaController@destroy')->middleware('auth', 'role:Administrador');











Route::resource('pacientes', 'PacienteController')->middleware('auth', 'role:Paciente,Administrador');
Route::resource('medicosGenerales', 'MedicoGeneralController')->middleware('auth', 'role:Administrador,MedicoGeneral');
Route::resource('medicosEspecialistas', 'MedicoEspecialistaController')->middleware('auth', 'role:Administrador,MedicoEspecialista');
Route::resource('citas', 'CitaController')->middleware('auth', 'role:Paciente');