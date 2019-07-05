<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {      
        if (Auth::user()->hasRole('Administrador')) {
            return view('administrador.index');
        }
        else if (Auth::user()->hasRole('Paciente')) {
            return view('pacientes.index');
        }
        else if (Auth::user()->hasRole('MedicoGeneral')) {
            return view('medicosgenerales.index');
        }
        else if (Auth::user()->hasRole('MedicoEspecialista')) {
            return view('medicosespecialistas.index');
        }
        else {
            return view('/auth/login');
        }
    }
}
