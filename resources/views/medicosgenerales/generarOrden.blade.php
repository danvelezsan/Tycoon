@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    {{ __('Generar Orden') }}
                    <button type="button" onclick="window.location='/medicosGenerales/agenda'" class="btn btn-outline-primary float-right">Cancelar</button>
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route('medicosGenerales.storeOrden') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="especialidad" class="col-md-4 col-form-label text-md-right">{{ __('Especialidad médica') }}</label>

                            <div class=" col-md-6">
                                <select name="especialidad" required id="especialidad" class="form-control">
                                @foreach($especialidades as $especialidad)
                                        <option value="{{ $especialidad -> especialidad }}">{{ $especialidad -> especialidad }}</option>
                                @endforeach
                                </select>
                            </div>
                        </div>
                        
                        <input id="cedulaPaciente" type="hidden" value='{{$cedulaPaciente}}' name="cedulaPaciente">

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Generar') }}
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
