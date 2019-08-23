@extends('layouts.app')

@section('content')
<br>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
			@if (session()->has('cancelada'))
			<div class="container">
				<div class="alert alert-success alert-block">
					<button type="button" class="close" data-dismiss="alert">×</button>	
	        		<span class="glyphicon glyphicon-ok"><strong>¡La cita ha sido cancelada correctamente!</strong>
				</div>
			</div>
			@endif
			@if (session()->has('generada'))
			<div class="container">
				<div class="alert alert-success alert-block">
					<button type="button" class="close" data-dismiss="alert">×</button>	
	        		<span class="glyphicon glyphicon-ok"><strong>¡La orden ha sido generada correctamente!</strong>
				</div>
			</div>
			@endif
        	<div class="card">
	        	<div class="card-header" style="background: #353942;">
	        		<p></p>
	        		<div class="container">
		        		<div class="row">
			        		<div class="col-sm-9">
			        			<h4 style="color:white;">Agenda</h4>
				       		</div>
			        		<div class="col-sm-3">
			        			<div class="float-right">
			        				<button onclick="window.location='#'" type="button" class="btn btn-secondary">My button</button>
			        			</div>
			        		</div>
		        		</div>
	        		</div>
	        		<p></p>
	        	</div>
	        	<div class="card-body">
	        		@if ($citas->isEmpty())
    					<div class="alert alert-secondary">	
							<strong>No hay citas agendadas</strong>
						</div>
					@else
			            <table class="table table-hover">
			  				<thead class="thead-light">
			    				<tr>
			    					<th scope="col" style="text-align:center">Id</th>
			    					<th scope="col" style="text-align:center">Nombre paciente</th>
			    					<th scope="col" style="text-align:center">Cédula paciente</th>
							      	<th scope="col" style="text-align:center">Fecha</th>
							      	<th scope="col" style="text-align:center">Hora</th>
							      	<th scope="col" style="text-align:center"></th>
							      	<th scope="col" style="text-align:center"></th>
			    				</tr>
					  		</thead>
					  		<tbody>
					  			@foreach($citas as $cita)
					  				<tr>
					  					<th style="text-align:center">{{ $cita -> id }}</th>
					  					<td style="text-align:center">{{ $cita -> nombrePaciente }}</td>
					  					<td style="text-align:center">{{ $cita -> cedulaPaciente }}</td>
					  					<td style="text-align:center">{{ \Carbon\Carbon::parse($cita->fechaHora)->format('d/m/Y') }}</td>
					  					<td style="text-align:center">{{ \Carbon\Carbon::parse($cita->fechaHora)->format('H:i:s') }}</td>
					  					<td style="text-align:center">
					  						<form action="{{ route('medicosEspecialistas.generarOrden', $cita->id)}}" method="post">
	               						 		@csrf
	                  							<button class="btn btn-outline-info" type="submit">Generar orden</button>
	                					   </form>
					  					</td>
					  					<td style="text-align:center">
					  						<form action="{{ route('medicosEspecialistas.destroyCita', $cita->id)}}" method="post">
	               						 		@csrf
	                  							@method('DELETE')
	                  							<button class="btn btn-outline-danger" type="submit">Cancelar cita</button>
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
