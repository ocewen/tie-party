@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row justify-content-center">
		<div class="col-md-8">
			<div class="card">
				<div class="card-header">Perfil de {{ Auth::user()->nombre }}</div>
				<img src="{{URL::asset('/images/users/'.Auth::user()->id.'')}}" width="200" height="200"/>

				<div class="card-body">
					@if (session('status'))
						<div class="alert alert-success">
							{{ session('status') }}
							}
						</div>
					@endif
					<h1>Estás en la pantalla de Perfil</h1>
					<form method="POST" action="{{ route('modifyprofilenormal') }}">
						<input type="hidden" value="{{$usuario[0]['id']}}" name="id">
						<label for="email">Email</label>
						<input type="email" value="{{$usuario[0]['email']}}" placeholder="{{$usuario[0]['email']}}" name="email">
						<br>
						<label for="nombre">Nombre</label>
						<input type="text" value="{{$usuario[0]['nombre']}}" placeholder="{{$usuario[0]['nombre']}}" name="nombre">
						<br>
						<label for="apellidos">Apellidos</label>
						<input type="text" value="{{$usuario[0]['apellidos']}}" placeholder="{{$usuario[0]['apellidos']}}" name="apellidos">
						<br>
						<label for="password">Nueva Contraseña</label>
						<input type="password" placeholder="Nueva Contraseña" name="password">
						<br>
						<label for="password">Repita la Nueva Contraseña</label>
						<input type="password" placeholder="Repita la Contraseña" name="password2">
						<br>
						<input type="submit" value="Enviar">
					</form>

					<form method="POST" action="{{ route('subirfoto') }}" enctype="multipart/form-data">
						Sube o actualiza la imagen de perfil...
						<input type="file" name="foto">
						<input type="submit" value="Subir Foto">
					</form>

				</div>
				</div>
	</div>
</div>
@endsection