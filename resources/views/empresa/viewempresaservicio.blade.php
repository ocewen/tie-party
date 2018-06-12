@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row justify-content-center">
		<div class="col-md-8">
			<div class="card">
				<div class="card-header">Lista Servicios</div>
				<div class="card-body">
					<h1>Registro de servicios</h1>
					@if($valor)
					<table border="1" style="text-align: center;">
								<tr>
									<th>Id Servicio</th>
									<th>Nombre Servicio</th>
									<th>Tipo Servicio</th>
									<th>Numero de Personas</th>
									<th>Editar</th>
									<th>Borrar</th>
								</tr>
						@foreach($valor as $servicio)
								<tr>
									<td>{{$id = $servicio['id']}}</td>
									<td>{{$servicio['nombre']}}</td>
									<td>{{$servicio['tipo']}}</td>
									<td>{{$servicio['numero_personas']}}</td>
									<td><a href="{{ route('editservice', compact('id')) }}">Editar<a></td>
									<td><a href="{{ route('deleteservice', compact('id')) }}">Borrar</a></td>
								</tr>
							
						@endforeach
					</table>
					@else
						"No hay resultados"
					@endif
				</div>
			</div> 
		</div>
	</div>
</div>
@endsection