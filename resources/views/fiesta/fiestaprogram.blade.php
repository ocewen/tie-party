@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row justify-content-center">
		<div class="col-md-8">
			<div class="card">
				<div class="card-header">Programa tu fiesta</div>

				<div class="card-body">
					@if (session('status'))
						<div class="alert alert-success">
							{{ session('status') }}
							}
						</div>
					@endif
					
				</div>
				<h3 id="fiesta_nombre" datos="{{$s[0]['id']}}">{{$s[0]['nombre']}}</h3>
				<div class="card-body">
					<h4>Añade servicios a tu fiesta</h4>
					<ul>
					@foreach($servicios as $servicio)
							<li><strong class="servicio_fiestas" datos="{{$servicio['id']}}" style="cursor: pointer;">{{$servicio['nombre']}}</strong></li>
					@endforeach
					</ul>
					<div class="card-body">
					<h4> - Servicios Añadidos</h4>
						<div class="mis-servicios-anadidos">
						<ul>
						@foreach ($contratos as $contrato)
							<li><strong class="anadido" datos="{{$contrato['id_servicio']}}" style="cursor: pointer;">{{$contrato['nombre_servicio']}}</strong></li>
						@endforeach
						</ul>
						</div>
				</div>
				</div>

				<div class="card-body">
					<h4>Añade herramientas a tu fiesta</h4>
					<ul>
					@foreach($herramientas as $herramienta)
							<li><strong class="herramienta_fiestas" datos="{{$herramienta['id']}}" style="cursor: pointer;">{{$herramienta['nombre_herramienta']}}</strong></li>
					@endforeach
					</ul>
					<div class="card-body">
					<h4> - Herramientas Añadidas</h4>
						<div class="mis-herramientas-anadidos">
						<ul>
						@foreach ($usos as $usar)
							<li><strong class="anadido-herramienta" datos="{{$usar['id_herramienta']}}" style="cursor: pointer;">{{$usar['nombre']}}</strong></li>
						@endforeach
						</ul>
						</div>
				</div>

				<div class="card-body">
					<h4>Lista de Asistentes</h4>
					<div class="mis-asistentes-anadidos">
						<ul>
						@foreach ($part as $user)
							<li><strong class="anadido-asistente" datos="{{$usar['id_herramienta']}}">{{$user['email']}}</strong></li>
						@endforeach
						</ul>
						</div>
				</div>

				</div>
	</div>
</div>
@endsection