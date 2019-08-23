<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\MedicoEspecialista;
use App\Especialidad;
use App\Universidad;
use App\User;
use App\Orden;
use App\Cita;

class MedicoEspecialistaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('medicosespecialistas.index');
    }

    public function agenda()
    {
        $citas = $citas = Cita::select('id', 'idOrden', 'cedulaPaciente', 'nombrePaciente', 'cedulaMedico', 'nombreMedico', 'fechaHora')->where([['cedulaMedico', '=', Auth::user()->cedula],['fechaHora', '>=', date("Y-m-d H:i:s")]])->get();
        return view('medicosespecialistas.agenda')->with('citas', $citas);;
    }

    public function generarOrden($id)
    {
        $cita = Cita::find($id);
        $cedulaPaciente = $cita -> cedulaPaciente;
        $especialidades = MedicoEspecialista::select('especialidad')->distinct('especialidad')->get();
        return view('medicosespecialistas.generarOrden', compact('especialidades', 'cedulaPaciente'));
    }

    public function  storeOrden(Request $request)
    {
        $orden = new Orden([
            'verificacionUsada' => FALSE,
            'fecha' => date("Y-m-d"),
            'especialidad' => $request->get('especialidad'),
            'cedulaPaciente' => $request->get('cedulaPaciente'),
            'cedulaMedico' => Auth::user()->cedula,
        ]);

        $orden->save();

        session()->flash('generada', 'La orden ha sido generada correctamente');

        return redirect('/medicosEspecialistas/agenda')->with('success');
    }

    public function destroyCita($id)
    {
        $cita = Cita::find($id);
        $cedulaPaciente = $cita->cedulaPaciente;
        $cita->delete();

        $especialista = MedicoEspecialista::where('cedula', '=', Auth::user()->cedula);

        $orden = new Orden([
            'verificacionUsada' => FALSE,
            'fecha' => date("Y-m-d"),
            'especialidad' => $especialista->first()->especialidad,
            'cedulaPaciente' => $cedulaPaciente,
            'cedulaMedico' => Auth::user()->cedula,
        ]);

        $orden->save();

        session()->flash('cancelada', 'La cita se ha cancelado correctamente');

        return redirect('/medicosEspecialistas/agenda')->with('success','heee heeeee');
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
            'cedula.integer' => 'Datos Incorrectos',
            'cedula.gt' => 'Datos Incorrectos',
            'nombre.string' => 'Datos Incorrectos',
            'apellidos.string' => 'Datos Incorrectos',
            'fecha_nacimiento.date' => 'Datos Incorrectos',
            'fecha_nacimiento.before' => 'Datos Incorrectos',
            'fecha_nacimiento.after' => 'Datos Incorrectos',
            'genero.string' => 'Datos Incorrectos',
            'genero.in' => 'Datos Incorrectos',
            'tarjeta_profesional.integer' => 'Datos Incorrectos',
            'universidad.string' => 'Datos Incorrectos',
            'dirConsultorio.string' => 'Datos Incorrectos',
            'especialidad.string' => 'Datos Incorrectos',
            'contrasena.min' => 'Datos Incorrectos',
        ]);

        $request->validate([
            'cedula' => 'required|unique:users,cedula|integer|gt:0',
            'nombre' => 'required|string',
            'apellidos' => 'required|string',
            'fecha_nacimiento' => 'required|date|before:tomorrow|after:01/01/1900',
            'genero' => 'required|string|in:Masculino, Femenino',
            'tarjeta_profesional' => 'required|unique:medico_generals|unique:medico_especialistas|integer',
            'universidad' => 'required|string',
            'dirConsultorio' => 'required|unique:medico_especialistas|string',
            'especialidad' => 'required|string',
            'contrasena' => 'required|string|confirmed|min:8',
        ],$message);

        $user = new User([
            'cedula' => $request->get('cedula'),
            'nombre' => $request->get('nombre'),
            'password' => Hash::make($request->get('contrasena')),
        ]);
        $user->save();

        DB::table('role_user')->insert(
            ['role_id' => 3 , 'user_id' => DB::table('users')->where('cedula', '=', $request->get('cedula'))->value('id')]
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
        $user = User::where('cedula', $id);
        $medico = MedicoEspecialista::where('cedula', $id);

        DB::table('role_user')->where('user_id', $id)->delete();
        $user->delete();
        $medico->delete();
        

        session()->flash('eliminado', 'El médico especialista se ha eliminado correctamente');

        return redirect('/medicosEspecialistas/listarMedicosEspecialistas')->with('success');
    }
}
