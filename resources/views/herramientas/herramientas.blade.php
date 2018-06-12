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
					<form method="POST" action="{{ route('registerherramienta') }}">
						{{ csrf_field() }}
						<input type="text" placeholder="Introduzca el nombre de la herramienta" size="50" name="nombre_herramienta">
						<br><br>
						<input type="textarea" placeholder="Introduzca la descripcion" size="50" name="descripcion">
						<br><br>
						<input type="submit" value="Enviar">
					</form>
				</div>
				
			</div>
			<br>
			<div class="card">
				<div class="card-header">Lista Herramientas</div>
				<div class="card-body">
					<h1>Registro de Herramientas</h1>
					@if($valor)
					<table border="1" style="text-align: center;">
								<tr>
									<th>Id Herramienta</th>
									<th>Nombre Herramienta</th>
									<th>Descripcion Herramienta</th>
									<th>Editar</th>
									<th>Borrar</th>
								</tr>
						@foreach($valor as $herramienta)
								<tr>
									<td>{{$id = $herramienta['id']}}</td>
									<td>{{$herramienta['nombre_herramienta']}}</td>
									<td>{{$herramienta['descripcion']}}</td>
									<td><a href="{{ route('editherramienta', compact('id')) }}">Editar<a></td>
									<td><a href="{{ route('deleteherramienta', compact('id')) }}">Borrar</a></td>
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