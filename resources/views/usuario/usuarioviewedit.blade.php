@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row justify-content-center">
		<div class="col-md-8">
			<div class="card">
				<div class="card-header">usuarios Management</div>

				<div class="card-body">
					@if (session('status'))
						<div class="alert alert-success">
							{{ session('status') }}
							}
						</div>
					@endif
					<h1>Estás en la pantalla de usuarios</h1>
					<form method="POST" action="{{ route('usuariodoedit') }}">
						{{ csrf_field() }}
						<input type="number" name="id"  value="{{$s[0]['id']}}" readonly>
						<input value="{{$s[0]['email']}}" type="text" placeholder="Introduzca el email del usuario" size="50" name="email">
						<br><br>
						<input value="{{$s[0]['nombre']}}" type="text" placeholder="Introduzca el nombre del usuario" size="50" name="nombre">
						<br><br>
						<input value="{{$s[0]['apellidos']}}" type="text" placeholder="Introduzca el apellidos del usuario" size="50" name="apellidos">
						<br><br>
						<input value="{{$s[0]['tipo']}}" type="text" placeholder="Introduzca el tipo de usuario" size="50" name="tipo">
						<br><br>
						<input type="submit" value="Enviar">
					</form>
				</div>
				</div>
	</div>
</div>
@endsection