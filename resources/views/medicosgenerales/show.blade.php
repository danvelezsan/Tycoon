@extends('layouts.app')

@section('content')
<br>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-11">
        	@if (session()->has('registrado'))
			<div class="container">
				<div class="alert alert-success alert-block">
					<button type="button" class="close" data-dismiss="alert">×</button>	
	        		<span class="glyphicon glyphicon-ok"><strong>¡El médico general ha sido registrado correctamente!</strong>
				</div>
			</div>
			@endif
			@if (session()->has('eliminado'))
			<div class="container">
				<div class="alert alert-success alert-block">
					<button type="button" class="close" data-dismiss="alert">×</button>	
	        		<span class="glyphicon glyphicon-ok"><strong>¡El médico general ha sido eliminado correctamente!</strong>
				</div>
			</div>
			@endif
        	<div class="card">
	        	<div class="card-header" style="background: #353942;">
	        		<p></p>
	        		<div class="container">
		        		<div class="row">
			        		<div class="col-sm-9">
			        			<h4 style="color:white;">Listar Médicos Generales</h4>
				       		</div>
			        		<div class="col-sm-3">
			        			<div class="float-right">
			        				<button onclick="window.location='/medicosGenerales/registrarMedicoGeneral'" type="button" class="btn btn-secondary">Registrar Médico General</button>
			        			</div>
			        		</div>
		        		</div>
	        		</div>
	        		<p></p>
	        	</div>
	        	<div class="card-body">
	        		@if ($medicosGenerales->isEmpty())
    					<div class="alert alert-secondary">	
							<strong>No hay médicos generales registrados</strong>
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
							      	<th scope="col" style="text-align:center">Nro. tarjeta profesional</th>
							      	<th scope="col" style="text-align:center">Universidad</th>
							      	<th scope="col" style="text-align:center"></th>
			    				</tr>
					  		</thead>
					  		<tbody>
					  			@foreach($medicosGenerales as $medico)
					  				<tr>
					  					<th style="text-align:center">{{ $medico -> cedula }}</th>
					  					<td style="text-align:center">{{ $medico -> nombre }}</td>
					  					<td style="text-align:center">{{ $medico -> apellidos }}</td>
					  					<td style="text-align:center">{{ \Carbon\Carbon::parse($medico->fecha_nacimiento)->format('d/m/Y') }}</td>
					  					<td style="text-align:center">{{ $medico -> genero }}</td>
					  					<td style="text-align:center">{{ $medico -> tarjeta_profesional }}</td>
					  					<td style="text-align:center">{{ $medico -> universidad }}</td>
					  					<td style="text-align:center">
											<form action="{{ route('medicosGenerales.destroy', $medico->cedula)}}" method="post">
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
