<?php

namespace App\Http\Controllers;

use App\Paciente;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Paciente;
use App\User;

class PacienteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        echo "Home berraco!";
    }

    public function registrarPaciente()
    {
        return view('/paciente/registrarPaciente');
    }

    public function listarPacientes()
    {
        return view('/paciente/listarPacientes');
    }

    /**
     * Show the form for creating a new resource.
     * MANDA AL MODELO LOS DATOS PARA CREAR EN LA BASE DE DATOS EL REGISTRO
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        echo "create pues!";
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $paciente = new Paciente([
            'cedula' => $request->get('id'),
            'nombre' => $request->get('nombre'),
            'apellidos' => $request->get('apellidos'),
            'fecha_nacimiento' => $request->get('fecha_nacimiento'),
            'genero' => $request->get('genero'),
        ]);
        $paciente->save();
        $user = new User([
            'cedula' => $request->get('id'),
            'name' => $request->get('nombre'),
            'password' =>  Hash::make("12345678"),
        ]);
        $user->save();
        return redirect('/')->with('success', 'Paciente Registrado Exitosamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Paciente  $paciente
     * @return \Illuminate\Http\Response
     */
    public function show(Paciente $paciente)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Paciente  $paciente
     * @return \Illuminate\Http\Response
     */
    public function edit(Paciente $paciente)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Paciente  $paciente
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Paciente $paciente)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Paciente  $paciente
     * @return \Illuminate\Http\Response
     */
    public function destroy(Paciente $paciente)
    {
        //
    }
}
