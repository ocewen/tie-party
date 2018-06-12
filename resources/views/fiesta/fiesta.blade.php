@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row justify-content-center">
		<div class="col-md-8">
			<div class="card">
				<div class="card-header">Fiestas Management</div>
				@if(auth()->user()->tipo != "user")
				<div class="card-body">
					@if (session('status'))
						<div class="alert alert-success">
							{{ session('status') }}
							}
						</div>
					@endif
					
					<h1>Estás en la pantalla de Fiesta</h1>
					<form method="POST" action="{{ route('registerfiesta') }}">
						{{ csrf_field() }}
						<input type="text" placeholder="Introduzca el nombre de la fiesta" size="50" name="nombre">
						<br><br>
						<input type="text" placeholder="Direccion" size="50" name="direccion">
						<br><br>
						<input type="date" placeholder="Fecha" size="50" name="fecha">
						<br><br>
						<input type="time" placeholder="Hora" step="1" min="00:00:00" max="23:59:59" name="hora">
						<br><br>
						<input type="text" placeholder="tipo" name="tipo">
						<br><br>
						<select name="privada">
							<option selected disabled>Privada</option>
							<option>Si</option>
							<option>No</option>
						</select>
						<br><br>
						<input type="hidden" name="id_usuario" value="{{ auth()->user()->id }}">
						<input type="submit" value="Enviar">
					</form>
				</div>
				@endif
			</div>
			<br>
			<div class="card">
				<div class="card-header">Lista Fiestas</div>
				<div class="card-body">
					<h1>Registro de Fiestas</h1>
					@if($fiestas)
					<table border="1" style="text-align: center;">
								<tr>
									<th>Id Fiesta</th>
									<th>Nombre Fiesta</th>
									<th>Direccion</th>
									<th>Fecha</th>
									<th>Hora</th>
									<th>Id usuario</th>
									<th>Tipo</th>
									<th>Privada</th>
									<th>Creado</th>
									<th>Ultima actualización</th>
									@if(auth()->user()->tipo != "user")<th>Editar</th>
									<th>Borrar</th>@endif
									@if(auth()->user()->tipo == "user")
									<th>Participar</th>
									@endif
								</tr>
						@foreach($fiestas as $fiesta)
								<tr>
									<td>{{$id = $fiesta['id']}}</td>
									<td>{{$fiesta['nombre']}}</td>
									<td>{{$fiesta['direccion']}}</td>
									<td>{{$fiesta['fecha']}}</td>
									<td>{{$fiesta['hora']}}</td>
									<td>{{$fiesta['id_usuario']}}</td>
									<td>{{$fiesta['tipo']}}</td>
									<td>{{$fiesta['privada']}}</td>
									<td>{{$fiesta['created_at']}}</td>
									<td>{{$fiesta['updated_at']}}</td>
									@if(auth()->user()->tipo != "user")<td><a href="{{ route('editfiesta', compact('id')) }}">Editar<a></td>
									<td><a href="{{ route('deletefiesta', compact('id')) }}">Borrar</a></td>
									@endif
									@if(auth()->user()->tipo == "user")
									<td><a href="{{ route('unirse', compact('id')) }}">Unirse</a></td>
									@endif
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