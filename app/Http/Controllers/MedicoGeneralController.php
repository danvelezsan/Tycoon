<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use App\MedicoGeneral;
use App\Universidad;
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
        $universidades = Universidad::all();
        return view('medicosgenerales.create')->with('universidades', $universidades);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $message=([
            'cedula.unique' => 'Especialista Ya Existente',
            'tarjeta_profesional.unique' => 'Tarjeta Profesional Ya Registrada',
            'cedula.numeric' => 'Datos Incorrectos',
            'nombre.string' => 'Datos Incorrectos',
            'apellidos.string' => 'Datos Incorrectos',
            'fecha_nacimiento.date' => 'Datos Incorrectos',
            'genero.string' => 'Datos Incorrectos',
            'genero.in' => 'Datos Incorrectos',
            'tarjeta_profesional.numeric' => 'Datos Incorrectos',
            'universidad.string' => 'Datos Incorrectos',
        ]);

        $request->validate([
            'cedula' => 'required|unique:users|numeric',
            'nombre' => 'required|string',
            'apellidos' => 'required|string',
            'fecha_nacimiento' => 'required|date',
            'genero' => 'required|string',
            'tarjeta_profesional' => 'required|unique:medicogenerals|unique:medicoespecialistas|numeric',
            'universidad' => 'required|string',
            'contrasena' => 'required|string|confirmed',
        ],$message);

        $user = new User([
            'id' => $request->get('cedula'),
            'name' => $request->get('nombre'),
            'password' => Hash::make($request->get('contrasena')),
        ]);
        $user->save();

        DB::table('role_user')->insert(
            ['role_id' => 2, 'user_id' => $request->get('cedula')]
        );

        $medicoGeneral = new medicoGeneral([
            'cedula' => $request->get('cedula'),
            'nombre' => $request->get('nombre'),
            'apellidos' => $request->get('apellidos'),
            'fecha_nacimiento' => $request->get('fecha_nacimiento'),
            'genero' => $request->get('genero'),
            'tarjeta_profesional' => $request->get('tarjeta_profesional'),
            'universidad' => $request->get('universidad'),
        ]);
        $medicoGeneral->save();

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

        session()->flash('eliminado', 'El médico general se ha eliminado correctamente');

        return redirect('/medicosGenerales/listarMédicosGenerales')->with('success');
    }
}
