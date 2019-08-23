@extends('layouts.app')

@section('content')
<br>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
        	<div class="card">
	        	<div class="card-header" style="background: #353942;">
	        		<p></p>
	        		<div class="container">
		        		<div class="row">
			        		<div class="col-sm-9">
			        			<h4 style="color:white;">Ordenes</h4>
				       		</div>
			        		<div class="col-sm-3">
			        			<div class="float-right">
			        				<button onclick="window.location='/pacientes/agenda'" type="button" class="btn btn-secondary">Mi agenda</button>
			        			</div>
			        		</div>
		        		</div>
	        		</div>
	        		<p></p>
	        	</div>
	        	<div class="card-body">
	        		@if ($ordenes->isEmpty())
    					<div class="alert alert-secondary">	
							<strong>No hay ordenes registradas</strong>
						</div>
					@else
			            <table class="table table-hover">
			  				<thead class="thead-light">
			    				<tr>
			    					<th scope="col" style="text-align:center">Id</th>
			    					<th scope="col" style="text-align:center">Especialidad</th>
							      	<th scope="col" style="text-align:center">Fecha</th>
							      	<th scope="col" style="text-align:center"></th>
			    				</tr>
					  		</thead>
					  		<tbody>
					  			@foreach($ordenes as $orden)
					  				<tr>
					  					<th style="text-align:center">{{ $orden -> id }}</th>
					  					<td style="text-align:center">{{ $orden -> especialidad }}</td>
					  					<td style="text-align:center">{{ \Carbon\Carbon::parse($orden->fecha)->format('d/m/Y') }}</td>
					  					<td style="text-align:center">
					  						<form action="{{ route('pacientes.agendarCitaEspecialista', $orden->id)}}" method="post">
	               						 		@csrf
	                  							<button class="btn btn-outline-info" type="submit">Agendar cita con médico especialista</button>
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
