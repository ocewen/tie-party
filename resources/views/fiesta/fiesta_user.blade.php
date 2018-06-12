@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row justify-content-center">
		<div class="col-md-8">
			<div class="card">
				<div class="card-header">Fiestas Management</div>

				<div class="card-body">
					@if (session('status'))
						<div class="alert alert-success">
							{{ session('status') }}
							}
						</div>
					@endif
					
					<h1>Estás en la pantalla de Fiesta, {{auth()->user()->nombre}}</h1>
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
				
			</div>
			<br>
		</div>
	</div>
</div>
@endsection