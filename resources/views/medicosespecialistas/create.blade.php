@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    {{ __('Registrar Médico Especialista') }}
                    <button type="button" onclick="window.location='/medicosEspecialistas/listarMedicosEspecialistas'" class="btn btn-outline-primary float-right">Volver</button>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('medicosEspecialistas.store') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="cedula" class="col-md-4 col-form-label text-md-right">Cédula</label>

                            <div class="col-md-6">
                                <input id="cedula" type="number" class="form-control @error('cedula') is-invalid @enderror" name="cedula" value="{{ old('cedula') }}" required autocomplete="cedula" autofocus placeholder="Ingrese la cédula" min="0">

                                @error('cedula')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="contrasena" class="col-md-4 col-form-label text-md-right">{{ __('Contraseña') }}</label>

                            <div class="col-md-6">
                                <input id="contrasena" type="password" class="form-control @error('contrasena') is-invalid @enderror" name="contrasena" value="{{ old('contrasena') }}" required autocomplete="constrasena" autofocus min="0" placeholder="Ingrese la contraseña">

                                @error('contrasena')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="contrasena_confirmation" class="col-md-4 col-form-label text-md-right">{{ __('Confirmar contraseña') }}</label>

                            <div class="col-md-6">
                                <input id="contrasena_confirmation" type="password" class="form-control" name="contrasena_confirmation" required autocomplete="new_contrasena" placeholder="Confirme la constraseña">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="nombre" class="col-md-4 col-form-label text-md-right">{{ __('Nombre') }}</label>

                            <div class="col-md-6">
                                <input id="nombre" type="text" class="form-control @error('nombre') is-invalid @enderror" name="nombre" value="{{ old('nombre') }}" required autocomplete="nombre" autofocus placeholder="Ingrese el nombre">

                                @error('nombre')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="apellidos" class="col-md-4 col-form-label text-md-right">{{ __('Apellidos') }}</label>

                            <div class="col-md-6">
                                <input id="apellidos" type="text" class="form-control @error('apellidos') is-invalid @enderror" name="apellidos" value="{{ old('apellidos') }}" required autocomplete="apellidos" autofocus placeholder="Ingrese los apellidos">

                                @error('apellidos')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="fecha_nacimiento" class="col-md-4 col-form-label text-md-right">{{ __('Fecha de nacimiento') }}</label>

                            <div class="col-md-6">
                                <input id="fecha_nacimiento" type="date" min="1900-01-01" max={{ date('Y-m-d') }} class="form-control @error('fecha_nacimiento') is-invalid @enderror" name="fecha_nacimiento" value="{{ old('fecha_nacimiento') }}" required autocomplete="fecha_nacimiento" autofocus placeholder="Ingrese la fecha de nacimiento">

                                @error('fecha_nacimiento')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="genero" class="col-md-4 col-form-label text-md-right">{{ __('Género') }}</label>

                            <div class=" col-md-6">
                                <select name="genero" required id="genero" class="form-control">
                                    <option value="Masculino">Masculino</option>
                                    <option value="Femenino">Femenino</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="tarjeta_profesional" class="col-md-4 col-form-label text-md-right">Nro. tarjeta profesional</label>

                            <div class="col-md-6">
                                <input id="tarjeta_profesional" type="number" class="form-control @error('tarjeta_profesional') is-invalid @enderror" name="tarjeta_profesional" value="{{ old('tarjeta_profesional') }}" required autocomplete="tarjeta_profesional" autofocus placeholder="Ingrese nro. de tarjeta profesional" min="0">

                                @error('tarjeta_profesional')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="universidad" class="col-md-4 col-form-label text-md-right">{{ __('Universidad') }}</label>

                            <div class=" col-md-6">
                                <select name="universidad" required id="universidad" class="form-control ">
                                    @foreach($universidades as $universidad)
                                            <option value="{{ $universidad -> nombre }}">{{ $universidad -> nombre }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="especialidad" class="col-md-4 col-form-label text-md-right">{{ __('Especialidad médica') }}</label>

                            <div class=" col-md-6">
                                <select name="especialidad" required id="especialidad" class="form-control">
                                @foreach($especialidades as $especialidad)
                                        <option value="{{ $especialidad -> nombre }}">{{ $especialidad -> nombre }}</option>
                                @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="dirConsultorio" class="col-md-4 col-form-label text-md-right">{{ __('Dirección del consultorio') }}</label>

                            <div class="col-md-6">
                                <input id="dirConsultorio" type="text" class="form-control @error('dirConsultorio') is-invalid @enderror" name="dirConsultorio" value="{{ old('dirConsultorio') }}" required autocomplete="dirConsultorio" autofocus placeholder="Ingrese la dirección del consultorio">

                                @error('dirConsultorio')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Registrar') }}
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
