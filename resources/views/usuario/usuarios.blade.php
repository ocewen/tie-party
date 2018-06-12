@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row justify-content-center">
		<div class="col-md-8">
			<div class="card">
				<div class="card-header">Usuarios Management</div>

				<div class="card-body">
					@if (session('status'))
						<div class="alert alert-success">
							{{ session('status') }}
							}
						</div>
					@endif
					
					<h1>Estás en la pantalla de Usuarios</h1>
					<form method="POST" action="{{ route('registerherramienta') }}">
						{{ csrf_field() }}
						<input type="text" placeholder="Introduzca el nombre de la usuario" size="50" name="nombre_herramienta">
						<br><br>
						<input type="textarea" placeholder="Introduzca la descripcion" size="50" name="descripcion">
						<br><br>
						<input type="submit" value="Enviar">
					</form>
				</div>
				
			</div>
			<br>
			<div class="card">
				<div class="card-header">Lista Usuarios</div>
				<div class="card-body">
					<h1>Registro de Usuarios</h1>
					@if($usuarios)
					<table border="1" style="text-align: center;">
								<tr>
									<th>Id Usuario</th>
									<th>email Usuario</th>
									<th>Nombre Usuario</th>
									<th>Apellidos Usuario</th>
									<th>Tipo Usuario</th>
									<th>Editar</th>
									<th>Borrar</th>
								</tr>
						@foreach($usuarios as $usuario)
								<tr>
									<td>{{$id = $usuario['id']}}</td>									
									<td>{{$email = $usuario['email']}}</td>
									<td>{{$nombre = $usuario['nombre']}}</td>
									<td>{{$apellidos = $usuario['apellidos']}}</td>
									<td>{{$tipo = $usuario['tipo']}}</td>
									<td><a href="{{ route('editusuario', compact('id')) }}">Editar<a></td>
									<td><a href="{{ route('deleteusuario', compact('id')) }}">Borrar</a></td>
								</tr>
							
						@endforeach
					</table>
					@else
						{{'No hay resultados'}}
					@endif
				</div>
			</div>
		</div>
	</div>
</div>
@endsection