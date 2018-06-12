@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row justify-content-center">
		<div class="col-md-8">
			<div class="card">
				<div class="card-header">Fiesta Management</div>

				<div class="card-body">
					@if (session('status'))
						<div class="alert alert-success">
							{{ session('status') }}
							}
						</div>
					@endif
					<h1>Estás en la pantalla de Fiesta</h1>
					<form method="POST" action="{{ route('fiestadoedit') }}">
						{{ csrf_field() }}
						<input type="hidden" name="id" value="{{$s[0]['id']}}">
						<input value="{{$s[0]['nombre']}}" type="text" placeholder="Introduzca el nombre de la fiesta" size="50" name="nombre">
						<br><br>
						<input value="{{$s[0]['direccion']}}" type="text" placeholder="Introduzca la direccion" size="50" name="direccion">
						<br><br>
						<input value="{{$s[0]['fecha']}}" type="text" placeholder="Introduzca la fecha" size="50" name="fecha">
						<br><br>
						<input value="{{$s[0]['hora']}}" type="text" placeholder="Introduzca la hora" size="50" name="hora">
						<br><br>
						<input value="{{$s[0]['tipo']}}" type="text" placeholder="Introduzca el tipo" size="50" name="tipo">
						<br><br>
						<select name="privada">
							<option value="S" <?php if($s[0]['privada'] == 'S'): echo 'selected="selected"'; endif;?>>Si</option>
							<option value="N" <?php if($s[0]['privada'] == 'N'): echo 'selected="selected"'; endif;?>>No</option>
						</select>
						<br><br>
						<input type="submit" value="Enviar">
					</form>
				</div>
				</div>
	</div>
</div>
@endsection