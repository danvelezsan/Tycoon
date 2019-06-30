@extends('layouts.app')

@section('content')
<br>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-11">
        	<div class="container">
        		<div class="row">
	        		<div class="col-sm-9">
		        		<h4><b>Listar Pacientes</b></h4>
		       		</div>
	        		<div class="col-sm-3">
	        			<div class="float-right">
	        				<button onclick="window.location='/pacientes/registrarPaciente'" type="button" class="btn btn-outline-primary">Registrar Paciente</button>
	        			</div>
	        		</div>
        		</div>
        		<br>
        	</div>
        	<div class="table-wraper">
            <table class="table table-hover table-bordered">
  				<thead class="thead-dark">
    				<tr>
				      	<th scope="col" style="text-align:center">Cédula</th>
				      	<th scope="col" style="text-align:center">Nombre</th>
				      	<th scope="col" style="text-align:center">Apellidos</th>
				      	<th scope="col" style="text-align:center">Fecha de nacimiento</th>
				      	<th scope="col" style="text-align:center">Género</th>
    				</tr>
		  		</thead>
		  		<tbody>
		  			@foreach($pacientes as $paciente)
		  				<tr>
		  					<th style="text-align:center">{{ $paciente -> cedula }}</th>
		  					<td style="text-align:center">{{ $paciente -> nombre }}</td>
		  					<td style="text-align:center">{{ $paciente -> apellidos }}</td>
		  					<td style="text-align:center">{{ \Carbon\Carbon::parse($paciente->fecha_nacimiento)->format('d/m/Y') }}</td>
		  					<td style="text-align:center">{{ $paciente -> genero }}</td>
		  				</tr>
		  			@endforeach
  				</tbody>
			</table>
        </div>
    </div>
</div>
@endsection
