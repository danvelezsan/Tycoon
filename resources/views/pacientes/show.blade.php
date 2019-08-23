@extends('layouts.app')

@section('content')
<br>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
        	@if (session()->has('registrado'))
			<div class="container">
				<div class="alert alert-success alert-block">
					<button type="button" class="close" data-dismiss="alert">×</button>	
	        		<span class="glyphicon glyphicon-ok"><strong>¡El paciente ha sido registrado correctamente!</strong>
				</div>
			</div>
			@endif
			@if (session()->has('eliminado'))
			<div class="container">
				<div class="alert alert-success alert-block">
					<button type="button" class="close" data-dismiss="alert">×</button>	
	        		<span class="glyphicon glyphicon-ok"><strong>¡El paciente ha sido eliminado correctamente!</strong>
				</div>
			</div>
			@endif
        	<div class="card">
	        	<div class="card-header" style="background: #353942;">
	        		<p></p>
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
	        		@if ($pacientes->isEmpty())
    					<div class="alert alert-secondary">	
							<strong>No hay pacientes registrados</strong>
						</div>
					@else
			            <table class="table table-hover">
			  				<thead class="thead-light">
			    				<tr>
							      	<th scope="col" style="text-align:center">Cédula</th>
							      	<th scope="col" style="text-align:center">Nombre</th>
							      	<th scope="col" style="text-align:center">Apellidos</th>
							      	<th scope="col" style="text-align:center">Fecha de nacimiento</th>
							      	<th scope="col" style="text-align:center">Género</th>
							      	<th scope="col" style="text-align:center"></th>
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
					  					<td style="text-align:center">
					  						<form action="{{ route('pacientes.destroy', $paciente->cedula)}}" method="post">
	               						 		@csrf
	                  							@method('DELETE')
	                  							<button class="btn btn-outline-danger" type="submit">Eliminar</button>
	                					   </form>
					  					</td>
					  				</tr>
					  			@endforeach
			  				</tbody>
						</table>
					@endif
				</div>
			</div>
        </div>
    </div>
</div>
@endsection
