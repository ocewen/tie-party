@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row justify-content-center">
		<div class="col-md-8">
			<div class="card">
				<div class="card-header">Mis amigos</div>
				<div class="card-body">
					<strong>Buscar amigos</strong>&nbsp;
					<input type="text" placeholder="Email del contacto">
					<br><br>
					@if($amigos)
					<table border="1" style="text-align: center;">
								<tr>
									<th>Id Relacion</th>
									<th>Nombre Amigo 1</th>
									<th>Nombre Amigo 2</th>
									<th>Estado</th>
									<th>Borrar</th>
								</tr>
						@foreach($amigos as $amigo)
								<tr>
									<td>{{$id = $amigo['id']}}</td>
									<td>{{$amigo['email_user1']}}</td>
									<td>{{$ami2 = $amigo['email_user2']}}</td>
									<td>{{$amigo['estado']}}</td>
									<td><a href="{{ route('chat', compact('ami2')) }}">Chat</a></td>
									<td><a href="{{ route('deletefiesta', compact('id')) }}">Borrar</a></td>
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