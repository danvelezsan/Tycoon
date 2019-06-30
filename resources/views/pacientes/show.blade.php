@extends('layouts.app')

@section('content')
<br>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-11">
        	<div class="card">
	        	<div class="card-header" style="background: #353942;">
	        		<br>
	        		<div class="container">
		        		<div class="row">
			        		<div class="col-sm-9">
			        			<h4 style="color:white;">Listar Pacientes</h4>
				       		</div>
			        		<div class="col-sm-3">
			        			<div class="float-right">
			        				<button onclick="window.location='/pacientes/registrarPaciente'" type="button" class="btn btn-secondary">Registrar Paciente</button>
			        			</div>
			        		</div>
		        		</div>
	        		</div>
	        		<p></p>
	        	</div>
	        	<div class="card-body">
		            <table class="table table-hover">
		  				<thead class="thead-light">
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
    </div>
</div>
@endsection
