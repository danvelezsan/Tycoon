@extends('layouts.app')

@section('content')
<br>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
        	<div class="card">
	        	<div class="card-header" style="background: #353942;">
	        		<p></p>
	        		<div class="container">
		        		<div class="row">
			        		<div class="col-sm-8">
			        			<h4 style="color:white;">Listar Médicos Especialistas</h4>
				       		</div>
			        		<div class="col-sm-4">
			        			<div class="float-right">
			        				<button onclick="window.location='/medicosEspecialistas/registrarMedicoEspecialista'" type="button" class="btn btn-secondary">Registrar Médico Especialista</button>
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
						      	<th scope="col" style="text-align:center">Nro. tarjeta profesional</th>
						      	<th scope="col" style="text-align:center">Título profesional</th>
						      	<th scope="col" style="text-align:center">Especialidad</th>
						      	<th scope="col" style="text-align:center">Dirección de consultorio</th>
						      	<th scope="col" style="text-align:center"></th>
		    				</tr>
				  		</thead>
				  		<tbody>
				  			@foreach($medicosEspecialistas as $medico)
				  				<tr>
				  					<th style="text-align:center">{{ $medico -> cedula }}</th>
				  					<td style="text-align:center">{{ $medico -> nombre }}</td>
				  					<td style="text-align:center">{{ $medico -> apellidos }}</td>
				  					<td style="text-align:center">{{ \Carbon\Carbon::parse($medico->fecha_nacimiento)->format('d/m/Y') }}</td>
				  					<td style="text-align:center">{{ $medico -> genero }}</td>
				  					<td style="text-align:center">{{ $medico -> tarjeta_profesional }}</td>
				  					<td style="text-align:center">{{ $medico -> titulo }}</td>
				  					<td style="text-align:center">{{ $medico -> especialidad }}</td>
				  					<td style="text-align:center">{{ $medico -> dirConsultorio }}</td>
				  					<td style="text-align:center">
										<form action="{{ route('medicosEspecialistas.destroy', $medico->cedula)}}" method="post">
               						 		@csrf
                  							@method('DELETE')
                  							<button class="btn btn-outline-danger" type="submit">Eliminar</button>
                					   </form>
				  					</td>
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
