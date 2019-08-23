<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Paciente;
use App\MedicoGeneral;
use App\MedicoEspecialista;
use App\User;
use App\Orden;
use App\Cita;
use Carbon\Carbon;

class PacienteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pacientes.index');
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

    public function agenda()
    {
        $citas = Cita::select('id', 'idOrden', 'cedulaPaciente', 'nombrePaciente', 'cedulaMedico', 'nombreMedico', 'fechaHora')->where([['cedulaPaciente', '=', Auth::user()->cedula],['fechaHora', '>=', date("Y-m-d H:i:s")]])->get();
        return view('pacientes.agenda')->with('citas', $citas);
    }

    public function agendarCitaGeneral()
    {
        $medicos = MedicoGeneral::select('cedula', 'nombre')->get();
        return view('pacientes.agendarCitaGeneral')->with('medicos', $medicos);
    }

    public function agendarCitaEspecialista($id)
    {
        $idOrden = Orden::find($id);
        $especialidad = $idOrden->especialidad;
        $idOrden = $idOrden->id;
        $medicos = MedicoEspecialista::select('cedula', 'nombre')->where('especialidad', '=', $especialidad)->get();
        return view('pacientes.agendarCitaEspecialista', compact('medicos', 'idOrden', 'especialidad'));
    }

    public function storeCitaGeneral(Request $request)
    {
        $message=([
            'fecha.date' => 'Datos Incorrectos',
            'fecha.after' => 'Datos Incorrectos',
            'hora.regex' => 'Datos Incorrectos',
        ]);

        $request->validate([
            'fecha' => 'required|date|after:yesterday',
            'hora' => array('required', 'regex:/^(0[0-9]|1[0-9]|2[0-3]|[0-9]):(0[0-9]|3[0-9])$/')
        ],$message);

        $timestamp = $request->get('fecha') . ' ' . $request->get('hora');

        $citasPaciente = Cita::select('id', 'fechaHora')->where([['fechaHora', '=', $timestamp], ['cedulaPaciente', '=', Auth::user()->cedula]])->get();

        if ($citasPaciente->isEmpty()) {
            $citas = DB::table('citas')->select('cedulaMedico')->where('fechaHora', '=', $timestamp);
            $medico = DB::table('medico_generals')->whereNotIn('cedula', $citas)->get()->toArray();    
            if (count($medico)==0) {
                $medicos = MedicoGeneral::select('cedula', 'nombre')->get();
                session()->flash('no', 'No hay citas a disponibles a esa fecha y hora');
                return view('pacientes.agendarCitaGeneral')->with('medicos', $medicos);
            }
            else {
                $medico = $medico[array_rand($medico)];
                $nombrePaciente = Paciente::select('nombre')->where('cedula', '=', Auth::user()->cedula)->get();
                $nombrePaciente = $nombrePaciente[0] -> nombre;
                $nombreMedico = $medico -> nombre;
    
    
                $cita = new Cita([
                    'idOrden' => NULL,
                    'cedulaPaciente' => Auth::user()->cedula,
                    'nombrePaciente' => $nombrePaciente,
                    'cedulaMedico' => $medico -> cedula,
                    'nombreMedico' => $nombreMedico,
                    'fechaHora' => $timestamp,
                ]);
                $cita->save();
    
                session()->flash('agendada', 'La cita ha sido agendada correctamente');
    
                return redirect('/pacientes/agenda')->with('success');
            }

        }else{
            $medicos = MedicoGeneral::select('cedula', 'nombre')->get();
            session()->flash('cita', 'Ya tienes una cita agendada a esa fecha y hora');

            return view('pacientes.agendarCitaGeneral')->with('medicos', $medicos);
        }

       
    }

    public function storeCitaEspecialista(Request $request)
    {
        $message=([
            'fecha.date' => 'Datos Incorrectos',
            'fecha.after' => 'Datos Incorrectos',
            'hora.regex' => 'Datos Incorrectos',
        ]);

        $request->validate([
            'fecha' => 'required|date|after:yesterday',
            'hora' => array('required', 'regex:/^(0[0-9]|1[0-9]|2[0-3]|[0-9]):(0[0-9]|3[0-9])$/')
        ],$message);

        $timestamp = $request->get('fecha') . ' ' . $request->get('hora');

        $citasPaciente = Cita::select('id', 'fechaHora')->where([['fechaHora', '=', $timestamp], ['cedulaPaciente', '=', Auth::user()->cedula]])->get();

        if ($citasPaciente->isEmpty()) {
            $citas = DB::table('citas')->select('cedulaMedico')->where('fechaHora', '=', $timestamp);
            $medico = DB::table('medico_especialistas')->where('especialidad', '=', $request ->get('especialidad'))->whereNotIn('cedula', $citas)->get()->toArray();
            if (count($medico)==0) {
                $medicos = MedicoGeneral::select('cedula', 'nombre')->get();
                session()->flash('no', 'No hay citas a disponibles a esa fecha y hora');
                return view('pacientes.agendarCitaGeneral')->with('medicos', $medicos);
            }

            else {
                $medico = $medico[array_rand($medico)];
                $nombrePaciente = Paciente::select('nombre')->where('cedula', '=', Auth::user()->cedula)->get();
                $nombrePaciente = $nombrePaciente[0] -> nombre;
                $nombreMedico = $medico -> nombre;
    
                $cita = new Cita([
                    'idOrden' => $request->get('idOrden'),
                    'cedulaPaciente' => Auth::user()->cedula,
                    'nombrePaciente' => $nombrePaciente,
                    'cedulaMedico' => $medico -> cedula,
                    'nombreMedico' => $nombreMedico,
                    'fechaHora' => $timestamp,
                ]);
    
                Orden::find($request->get('idOrden'))->update(['verificacionUsada' => true]);
    
                $cita->save();
    
                session()->flash('agendada', 'La cita ha sido agendada correctamente');
    
                return redirect('/pacientes/agenda')->with('success');

            }

        }else{
            $idOrden = $request->get('idOrden');
            $especialidad = $request->get('especialidad');
            $medicos = $request->get('medicos');

            session()->flash('cita', 'Ya tienes una cita agendada a esa fecha y hora');
            return view('pacientes.agendarCitaEspecialista', compact('medicos', 'idOrden', 'especialidad'));
        }

    }

    public function editCita($id)
    {
        return view('pacientes.editarCita')->with('id', $id);
    }

    public function updateCita(Request $request)
    {
        $message=([
            'fecha.date' => 'Datos Incorrectos',
            'fecha.after' => 'Datos Incorrectos',
            'hora.regex' => 'Datos Incorrectos',
        ]);

        $request->validate([
            'fecha' => 'required|date|after:yesterday',
            'hora' => array('required', 'regex:/^(0[0-9]|1[0-9]|2[0-3]|[0-9]):(0[0-9]|3[0-9])$/')
        ],$message);

        $timestamp = $request->get('fecha') . ' ' . $request->get('hora');

        $orden = Cita::select('idOrden')->where([['fechaHora', '=', $timestamp], ['cedulaPaciente', '=', Auth::user()->cedula]])->get();
        if ($orden == null){
            $citasPaciente = Cita::select('id', 'fechaHora')->where([['fechaHora', '=', $timestamp], ['cedulaPaciente', '=', Auth::user()->cedula]])->get();

                $citas = DB::table('citas')->select('cedulaMedico')->where('fechaHora', '=', $timestamp);
                $medico = DB::table('medico_generals')->whereNotIn('cedula', $citas)->get()->toArray();    
                if (count($medico)==0) {
                    $medicos = MedicoGeneral::select('cedula', 'nombre')->get();
                    session()->flash('no', 'No hay citas a disponibles a esa fecha y hora');
                    return view('pacientes.agendarCitaGeneral')->with('medicos', $medicos);
                }
                else {
                    $medico = $medico[array_rand($medico)];
                    $nombrePaciente = Paciente::select('nombre')->where('cedula', '=', Auth::user()->cedula)->get();
                    $nombrePaciente = $nombrePaciente[0] -> nombre;
                    $nombreMedico = $medico -> nombre;
        
                    Cita::find($request->get('id'))->update(['cedulaPaciente' => Auth::user()->cedula,'nombrePaciente' => $nombrePaciente,'cedulaMedico' => $medico -> cedula,'nombreMedico' => $nombreMedico,'fechaHora' => $timestamp]);
        
                    session()->flash('editada', 'La cita ha sido editada correctamente');
        
                    return redirect('/pacientes/agenda')->with('success');
                }
    
        }
        else{
            $citasPaciente = Cita::select('id', 'fechaHora')->where([['fechaHora', '=', $timestamp], ['cedulaPaciente', '=', Auth::user()->cedula]])->get();

                $citas = DB::table('citas')->select('cedulaMedico')->where('fechaHora', '=', $timestamp);
                $medico = DB::table('medico_especialistas')->where('especialidad', '=', $request ->get('especialidad'))->whereNotIn('cedula', $citas)->get()->toArray();
                if (count($medico)==0) {
                    $medicos = MedicoGeneral::select('cedula', 'nombre')->get();
                    session()->flash('no', 'No hay citas a disponibles a esa fecha y hora');
                    return view('pacientes.agendarCitaGeneral')->with('medicos', $medicos);
                }
    
                else {
                    $medico = $medico[array_rand($medico)];
                    $nombrePaciente = Paciente::select('nombre')->where('cedula', '=', Auth::user()->cedula)->get();
                    $nombrePaciente = $nombrePaciente[0] -> nombre;
                    $nombreMedico = $medico -> nombre;
        
                    Cita::find($request->get('id'))->update(['cedulaPaciente' => Auth::user()->cedula,'nombrePaciente' => $nombrePaciente,'cedulaMedico' => $medico -> cedula,'nombreMedico' => $nombreMedico,'fechaHora' => $timestamp]);
        
                    session()->flash('editada', 'La cita ha sido editada correctamente');
        
                    return redirect('/pacientes/agenda')->with('success');
    
                }

        }
        Cita::find($request->get('id'))->update(['fechaHora' => $timestamp]);
        session()->flash('editada', 'La cita ha sido editada correctamente');
        return redirect('/pacientes/agenda')->with('success');
    }

    public function destroyCita($id)
    {
        $cita = Cita::find($id);
        $cita->delete();

        session()->flash('cancelada', 'La cita se ha cancelado correctamente');

        return redirect('/pacientes/agenda')->with('success','heee heeeee');
    }

    public function ordenes()
    {
        $ordenes = Orden::select('id', 'verificacionUsada', 'fecha', 'especialidad', 'cedulaPaciente', 'cedulaMedico')->where('cedulaPaciente', '=', Auth::user()->cedula)->where('verificacionUsada', '=', false)->get();
        return view('pacientes.ordenes')->with('ordenes', $ordenes);
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
            'cedula.unique' => 'Paciente Ya Existente',
            'cedula.integer' => 'Datos Incorrectos',
            'cedula.gt' => 'Datos Incorrectos',
            'nombre.string' => 'Datos Incorrectos',
            'apellidos.string' => 'Datos Incorrectos',
            'fecha_nacimiento.date' => 'Datos Incorrectos',
            'fecha_nacimiento.before' => 'Datos Incorrectos',
            'fecha_nacimiento.after' => 'Datos Incorrectos',
            'genero.string' => 'Datos Incorrectos',
            'genero.in' => 'Datos Incorrectos',
            'contrasena.min' => 'Datos Incorrectos',
        ]);

        $request->validate([
            'cedula' => 'required|unique:users,cedula|integer|gt:0',
            'nombre' => 'required|string',
            'apellidos' => 'required|string',
            'fecha_nacimiento' => 'required|date|before:tomorrow|after:01/01/1900',
            'genero' => 'required|string|in:Masculino, Femenino',
            'contrasena' => 'required|string|confirmed|min:8',
        ],$message);

        $user = new User([
            'cedula' => $request->get('cedula'),
            'nombre' => $request->get('nombre'),
            'password' => Hash::make($request->get('contrasena')),
        ]);
        $user->save();
        
        DB::table('role_user')->insert(
            ['role_id' => 4 , 'user_id' => DB::table('users')->where('cedula', '=', $request->get('cedula'))->value('id')]
        );

        $paciente = new Paciente([
            'cedula' => $request->get('cedula'),
            'nombre' => $request->get('nombre'),
            'apellidos' => $request->get('apellidos'),
            'fecha_nacimiento' => $request->get('fecha_nacimiento'),
            'genero' => $request->get('genero'),
        ]);
        $paciente->save();

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
        DB::table('role_user')->where('user_id', $id)->delete();

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
