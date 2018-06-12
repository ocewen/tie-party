@include('layouts.headerTieSingle', array('body_valor' => ''))
        <section id="single-content">
            <!-- Sidebar -->
            @include('layouts.singleEmpresaSidebar')
               <!-- Fin sidebar -->
            <div class="single-content-right">
                @include('layouts.singleEmpresaNavBar')
                <div class="single-list">
				<div id="interno">
					<form class="servicio-form" action="{{ route('serviciodoedit') }}" method="POST">
					@csrf
						<input type="hidden" name="id" value="{{$s[0]['id']}}">
						<h2>Edita este Servicio</h2>
						<label for="name">¿Que nombre le darás ahora a este servicio?</label>
						<input value="{{$s[0]['nombre']}}" type="text" placeholder="Introduzca el nombre del servicio" size="50" name="nombre">
						<textarea value="{{$s[0]['descripcion']}}" type="text" placeholder="Introduzca la descripcion del servicio" name="descripcion"></textarea>
						<span>Elige el tipo de ocasión que vas a organizar:</span>
						<input type="radio" id="fiesta" name="tipo" value="Catering" checked> <label class="radio-label" for="Catering">Catering</label>
						<input type="radio" id="musica" name="tipo" value="Música"> <label class="radio-label" for="Música">Música</label>
						<input type="radio" id="deportes" name="tipo" value="Productos"> <label class="radio-label" for="Productos">Productos</label>
						<input type="radio" id="erotico" name="tipo" value="Local"> <label class="radio-label" for="Local">Local</label><br>
						<span><label for="name">¿Para cuántas personas es el servicio?</label></span>
						<input value="{{$s[0]['numero_personas']}}" type="number" placeholder="Nº de personas" name="numero_personas">
						<input type="submit" class="enviar-white" value="Actualizar Servicio">
					</form>

					<form class="servicio-form" method="POST" action="{{ route('subirfotoservicio') }}" enctype="multipart/form-data">
					@csrf
						<h2>Sube o actualiza la imagen de tu servicio</h2>
						<input type="hidden" value="{{$s[0]['id']}}" name="fIpM">
						<input type="file" name="foto"><small>5MB Máx.<small>
						<input type="submit" class="enviar-white" value="Subir Foto">
					</form>
            </div>
            @include('layouts.modalCrearServicio')
            
        </section>
        <footer>
                <div id="foot-5">
                    <p>Copiright 2018 © Todos los derechos reservados a la empresa Tie-party Company</p>
                </div>
            </div>
        </footer>
        <script type="text/javascript" src="{{ asset('js/recursos/jquery.js') }}"></script>
    </body>
</html>