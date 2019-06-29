@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('pacientes.store') }}">
                        @csrf

                        <div class="form-group">    
                            <label for="id">Cedula:</label>
                            <input type="number" class="form-control" name="id"/>
                        </div>

                        <div class="form-group">    
                            <label for="nombre">Nombre:</label>
                            <input type="text" class="form-control" name="nombre"/>
                        </div>

                        <div class="form-group">    
                            <label for="apellidos">Apellidos:</label>
                            <input type="text" class="form-control" name="apellidos"/>
                        </div>

                        <div class="form-group">    
                            <label for="fecha_nacimiento">Fecha de Nacimiento:</label>
                            <input type="date" class="form-control" name="fecha_nacimiento"/>
                        </div>

                        <div class="form-group">    
                            <label for="genero">Genero:</label>
                            <input type="text" class="form-control" name="genero"/>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
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
