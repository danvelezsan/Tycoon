@extends('layouts.app')

@section('content')
<br>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
        	
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
		            <table class="table table-hover">
		  				<thead class="thead-light">
		    				<tr>
						      	<th scope="col" style="text-align:center">Id</th>
						      	<th scope="col" style="text-align:center">Nombre</th>
						      	<th scope="col" style="text-align:center">Apellidos</th>
						      	<th scope="col" style="text-align:center">Fecha de nacimiento</th>
						      	<th scope="col" style="text-align:center">Género</th>
						      	<th scope="col" style="text-align:center"></th>
		    				</tr>
				  		</thead>
				  		<tbody>
				  			@foreach($citas as $cita)
				  				<tr>
				  					<th style="text-align:center">{{ $cita -> id }}</th>
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
