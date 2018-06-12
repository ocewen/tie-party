@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row justify-content-center">
		<div class="col-md-8">
			<div class="card">
							<div class="card-header">Lista Fiestas</div>
							<div class="card-body">
								<h1>Registro de Fiestas</h1>
								@if($fiestas)
								<table border="1" style="text-align: center;">
											<tr>
												<th>Nombre Fiesta</th>
												<th>Direccion</th>
												<th>Fecha</th>
												<th>Hora</th>
												<th>Tipo</th>
												<th>Privada</th>
											</tr>
									@foreach($fiestas as $fiesta)
											<tr>
												<!-- {{$id = $fiesta['id']}} -->
												<td>{{$fiesta['nombre']}}</td>
												<td>{{$fiesta['direccion']}}</td>
												<td>{{$fiesta['fecha']}}</td>
												<td>{{$fiesta['hora']}}</td>
												<td>{{$fiesta['tipo']}}</td>
												<td>{{$fiesta['privada']}}</td>
												<td><a href="{{ route('programfiesta', compact('id')) }}">Programar fiesta</a></td>
												<td><a href="{{ route('editfiesta', compact('id')) }}">Editar<a></td>
												<td><a href="{{ route('deletefiesta', compact('id')) }}">Cancelar</a></td>
											</tr>
										
									@endforeach
								</table>
								@else
									"No hay resultados"
								@endif
							</div>
						</div>

						<div class="card">
							<div class="card-header">Fiestas en las que participas</div>
							<div class="card-body">
								@if($part)
								<table border="1" style="text-align: center;">
											<tr>
												<th>Nombre Fiesta</th>
												<th>Direccion</th>
												<th>Fecha</th>
												<th>Hora</th>
												<th>Tipo</th>
												<th>Ultima actualización</th>
											</tr>
									@foreach($part as $fiesta)
											<tr>
												<td>{{$fiesta['nombre_fiesta']}}</td>
												<td>{{$fiesta['direccion']}}</td>
												<td>{{$fiesta['fecha']}}</td>
												<td>{{$fiesta['hora']}}</td>
												<td>{{$fiesta['tipo']}}</td>
												<td>{{$fiesta['updated_at']}}</td>
											</tr>
										
									@endforeach
								</table>
								@else
									"No hay resultados"
								@endif
							</div>
						</div>