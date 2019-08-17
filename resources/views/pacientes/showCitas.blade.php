@extends('layouts.app')

@section('content')
<br>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
        	@if (session()->has('agendada'))
			<div class="container">
				<div class="alert alert-success alert-block">
					<button type="button" class="close" data-dismiss="alert">×</button>	
	        		<span class="glyphicon glyphicon-ok"><strong>¡La cita ha sido agendada correctamente!</strong>
				</div>
			</div>
			@endif
			@if (session()->has('cancelada'))
			<div class="container">
				<div class="alert alert-success alert-block">
					<button type="button" class="close" data-dismiss="alert">×</button>	
	        		<span class="glyphicon glyphicon-ok"><strong>¡La cita ha  sido cancelada correctamente!</strong>
				</div>
			</div>
			@endif
        	<div class="card">
	        	<div class="card-header" style="background: #353942;">
	        		<p></p>
	        		<div class="container">
		        		<div class="row">
			        		<div class="col-sm-9">
			        			<h4 style="color:white;">Consultar Citas</h4>
				       		</div>
			        		<div class="col-sm-3">
			        			<div class="float-right">
			        				<button onclick="window.location='#'" type="button" class="btn btn-secondary">Agendar Cita</button>
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
		    					<th scope="col" style="text-align:center">Id</th>
		    					<th scope="col" style="text-align:center">Cédula médico</th>
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
				  					<th style="text-align:center">{{ $cita -> cedulaMedico }}</th>
				  					<td style="text-align:center">{{ \Carbon\Carbon::parse($cita->fecha)->format('d/m/Y') }}</td>
				  					<td style="text-align:center">{{ \Carbon\Carbon::parse($cita->hora)->format('H:i:s') }}</td>
				  					<td style="text-align:center">
				  						<form action="{{ route('pacientes.edit', $cita->id)}}" method="post">
               						 		@csrf
                  							<button class="btn btn-outline-info" type="submit">Modificar</button>
                					   </form>
				  					</td>
				  					<td style="text-align:center">
				  						<form action="{{ route('citas.destroy', $citas->id)}}" method="post">
               						 		@csrf
                  							@method('DELETE')
                  							<button class="btn btn-outline-danger" type="submit">Cancelar</button>
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
