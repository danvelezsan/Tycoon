<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
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
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pacientes.create');
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
            'cedula' => $request->get('cedula'),
            'nombre' => $request->get('nombre'),
            'apellidos' => $request->get('apellidos'),
            'fecha_nacimiento' => $request->get('fecha_nacimiento'),
            'genero' => $request->get('genero'),
        ]);
        $paciente->save();
        $user = new User([
            'id' => $request->get('cedula'),
            'name' => $request->get('nombre'),
            'password' => Hash::make($request->get('contrasena')),
            'role' => "Paciente",
        ]);
        $user->save();

        session()->flash('registrado', 'El paciente se ha creado correctamente');

        return redirect('/pacientes/listarPacientes')->with('success');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $pacientes = Paciente::orderBy('cedula', 'DESC')->get();
        return view('pacientes.show')->with('pacientes', $pacientes);
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
        $paciente = Paciente::where('cedula', $id);

        $user->delete();
        $paciente->delete();

        if ($user->delete()) {
            Session::flash('message', '¡Usuario eliminado correctamente!');
            Session::flash('class', 'success');
        } else {
            Session::flash('message', '¡Ha ocurrido un error!');
            Session::flash('class', 'danger');
        }

        if ($paciente->delete()) {
            Session::flash('message', '¡Paciente eliminado correctamente!');
            Session::flash('class', 'success');
        } else {
            Session::flash('message', '¡Ha ocurrido un error!');
            Session::flash('class', 'danger');
        }

        session()->flash('eliminado', 'El paciente se ha eliminado correctamente');

        return redirect('/pacientes/listarPacientes')->with('success','heee heeeee');
    }

     /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'contrasena' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }
}
