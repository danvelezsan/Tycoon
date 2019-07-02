<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use App\MedicoGeneral;
use App\User;

class MedicoGeneralController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('medicosGenerales.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $medicoGeneral = new medicoGeneral([
            'cedula' => $request->get('cedula'),
            'nombre' => $request->get('nombre'),
            'apellidos' => $request->get('apellidos'),
            'fecha_nacimiento' => $request->get('fecha_nacimiento'),
            'genero' => $request->get('genero'),
            'tarjeta_profesional' => $request->get('tarjeta_profesional'),
            'titulo' => $request->get('titulo'),
        ]);
        $medicoGeneral->save();
        $user = new User([
            'id' => $request->get('cedula'),
            'name' => $request->get('nombre'),
            'password' => Hash::make($request->get('contrasena')),
            'role' => "MedicoGeneral",
        ]);
        $user->save();

        session()->flash('registrado', 'El médico general se ha creado correctamente');

        return redirect('/medicosGenerales/listarMedicosGenerales')->with('success');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $medicosGenerales = MedicoGeneral::orderBy('cedula', 'DESC')->get();
        return view('medicosgenerales.show')->with('medicosGenerales', $medicosGenerales);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);
        $medico = MedicoGeneral::where('cedula', $id);

        $user->delete();
        $medico->delete();

        if ($user->delete()) {
            Session::flash('message', '¡Usuario eliminado correctamente!');
            Session::flash('class', 'success');
        } else {
            Session::flash('message', '¡Ha ocurrido un error!');
            Session::flash('class', 'danger');
        }

        if ($medico->delete()) {
            Session::flash('message', '¡Médico general eliminado correctamente!');
            Session::flash('class', 'success');
        } else {
            Session::flash('message', '¡Ha ocurrido un error!');
            Session::flash('class', 'danger');
        }

        session()->flash('eliminado', 'El médico general se ha eliminado correctamente');

        return redirect('/medicosGenerales/listarMédicosGenerales')->with('success');
    }
}
