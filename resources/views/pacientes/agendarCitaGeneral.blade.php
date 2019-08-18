@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    {{ __('Agendar Cita con Médico General') }} 
                    <button type="button" onclick="window.location='/pacientes/agenda'" class="btn btn-outline-primary float-right">Volver</button>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('pacientes.storeCitaGeneral') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="cedulaMedico" class="col-md-4 col-form-label text-md-right">{{ __('Elija su médico') }}</label>

                            <div class=" col-md-6">
                                <select name="cedulaMedico" required id="cedulaMedico" class="form-control ">
                                    @foreach($medicos as $medico)
                                            <option value="{{ $medico -> cedula }}">{{ $medico -> nombre }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="fecha" class="col-md-4 col-form-label text-md-right">{{ __('Fecha de la cita') }}</label>

                            <div class="col-md-6">
                                <input id="fecha" type="date" class="form-control @error('fecha') is-invalid @enderror" name="fecha" value="{{ old('fecha') }}" required autocomplete="fecha" autofocus placeholder="Ingrese la fecha">

                                @error('fecha')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="hora" class="col-md-4 col-form-label text-md-right">{{ __('Hora de la cita') }}</label>

                            <div class="col-md-6">
                                <input id="hora" type="time" class="form-control @error('hora') is-invalid @enderror" name="hora" value="{{ old('hora') }}" required autocomplete="hora" autofocus placeholder="Ingrese la hora">

                                @error('hora')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Agendar') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
