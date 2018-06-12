@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row justify-content-center">
		<div class="col-md-8">
			<div class="card">
				<div class="card-header">Herramientas Management</div>

				<div class="card-body">
					@if (session('status'))
						<div class="alert alert-success">
							{{ session('status') }}
							}
						</div>
					@endif
					<h1>Estás en la pantalla de Herramientas</h1>
					<form method="POST" action="{{ route('herramientadoedit') }}">
						{{ csrf_field() }}
						<input type="hidden" name="id" value="{{$s[0]['id']}}">
						<input value="{{$s[0]['nombre_herramienta']}}" type="text" placeholder="Introduzca el nombre del servicio" size="50" name="nombre_herramienta">
						<br><br>
						<input value="{{$s[0]['descripcion']}}" type="text" placeholder="Introduzca el tipo de servicio" size="50" name="descripcion">
						<br><br>
						<input type="submit" value="Enviar">
					</form>
				</div>
				</div>
	</div>
</div>
@endsection