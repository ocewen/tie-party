@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row justify-content-center">
		<div class="col-md-8">
			<div class="card">
				<div class="card-header">Servicios Management</div>

				<div class="card-body">
					@if (session('status'))
						<div class="alert alert-success">
							{{ session('status') }}
							}
						</div>
					@endif
					
					<h1>Estás en la pantalla de Servicios</h1>
					<form method="POST" action="{{ route('registerservice') }}">
						{{ csrf_field() }}
						<input type="hidden" name="id_usuario">
						<input type="text" placeholder="Introduzca el nombre del servicio" size="50" name="nombre">
						<br><br>
						<input type="text" placeholder="Introduzca el tipo de servicio" size="50" name="tipo">
						<br><br>
						<input type="number" placeholder="Nº de personas" name="numero_personas">
						<br><br>
						<input type="hidden" name="id_usuario" value="{{ auth()->user()->id }}">
						<input type="submit" value="Enviar">
					</form>
				</div>
				
			</div>
			<br>
			@if( Auth::user()->tipo == 'admin' )<div class="card">
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
									<th>Usuario Responsable</th>
									<th>Editar</th>
									<th>Borrar</th>
								</tr>
						@foreach($valor as $servicio)
								<tr>
									<td>{{$id = $servicio['id']}}</td>
									<td>{{$servicio['nombre']}}</td>
									<td>{{$servicio['tipo']}}</td>
									<td>{{$servicio['numero_personas']}}</td>
									<td>{{$servicio['nombre_user']}}</td>
									<td><a href="{{ route('editservice', compact('id')) }}">Editar<a></td>
									<td><a href="{{ route('deleteservice', compact('id')) }}">Borrar</a></td>
								</tr>
							
						@endforeach
					</table>
					@else
						"No hay resultados"
					@endif
				</div>
			</div> @endif
		</div>
	</div>
</div>
@endsection