<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use App\MedicoEspecialista;
use App\Especialidad;
use App\Universidad;
use App\User;

class MedicoEspecialistaController extends Controller
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
        $especialidades = Especialidad::all();
        $universidades = Universidad::all();
        return view('medicosEspecialistas.create', compact('especialidades', 'universidades'));
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
            'dirConsultorio' => 'Direccion ya Registrada',
            'cedula.numeric' => 'Datos Incorrectos',
            'nombre.string' => 'Datos Incorrectos',
            'apellidos.string' => 'Datos Incorrectos',
            'fecha_nacimiento.date' => 'Datos Incorrectos',
            'genero.string' => 'Datos Incorrectos',
            'genero.in' => 'Datos Incorrectos',
            'tarjeta_profesional.numeric' => 'Datos Incorrectos',
            'universidad.string' => 'Datos Incorrectos',
            'dirConsultorio.string' => 'Datos Incorrectos',
            'especialidad.string' => 'Datos Incorrectos',
        ]);

        $request->validate([
            'cedula' => 'required|unique:users,id|numeric',
            'nombre' => 'required|string',
            'apellidos' => 'required|string',
            'fecha_nacimiento' => 'required|date',
            'genero' => 'required|string',
            'tarjeta_profesional' => 'required|unique:medico_generals|unique:medico_especialistas|numeric',
            'universidad' => 'required|string',
            'dirConsultorio' => 'required|unique:medico_especialistas|string',
            'especialidad' => 'required|string',
            'contrasena' => 'required|string',
        ],$message);

        $user = new User([
            'id' => $request->get('cedula'),
            'name' => $request->get('nombre'),
            'password' => Hash::make($request->get('contrasena')),
        ]);
        $user->save();

        
        DB::table('role_user')->insert(
            ['role_id' => 3 , 'user_id' => $request->get('cedula')]
        );

        $medicoEspecialista = new medicoEspecialista([
            'cedula' => $request->get('cedula'),
            'nombre' => $request->get('nombre'),
            'apellidos' => $request->get('apellidos'),
            'fecha_nacimiento' => $request->get('fecha_nacimiento'),
            'genero' => $request->get('genero'),
            'tarjeta_profesional' => $request->get('tarjeta_profesional'),
            'universidad' => $request->get('universidad'),
            'dirConsultorio' => $request->get('dirConsultorio'),
            'especialidad' => $request->get('especialidad'),
        ]);
        $medicoEspecialista->save();

        session()->flash('registrado', 'El médico especialista se ha creado correctamente');

        return redirect('/medicosEspecialistas/listarMedicosEspecialistas')->with('success');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $medicosEspecialistas = MedicoEspecialista::orderBy('cedula', 'DESC')->get();
        return view('medicosEspecialistas.show')->with('medicosEspecialistas', $medicosEspecialistas);
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
        $medico = MedicoEspecialista::where('cedula', $id);

        $user->delete();
        $medico->delete();
        DB::table('role_user')->where('user_id', $id)->delete();

        session()->flash('eliminado', 'El médico especialista se ha eliminado correctamente');

        return redirect('/medicosEspecialistas/listarMedicosEspecialistas')->with('success');
    }
}
