@include('layouts.headerTieSingle', array('body_valor' => ''))
		<section id="single-content">
			<!-- Sidebar -->
			@include('layouts.singleSidebar')
			   <!-- Fin sidebar -->
			<div class="single-content-right">
				@include('layouts.singleNavBar', array('$total' => 'fiestas'))
				@if (session('status'))
		            <div class="modal modal-aviso">
		                <div id="interno" class="alert alert-success">
		                    <i class="fa fa-times"></i>
		                    <span>{{ session('status') }}</span>
		                </div>
		            </div>
		        @endif
				<div class="single-list">
					<!-- Single list item -->
					@if($fiestas)
					@foreach($fiestas as $fiesta)
						<div class="single-list-item {{$fiesta['tipo']}}-type"  pp="{{$fiesta['id']}}">
							<i class="fa fa-crown"></i>
							<div class="image-box single-list-image">
								<a href="/fiesta/fiesta?fiesta={{$fiesta['id']}}">
								@if (file_exists(public_path().'/images/fiestas/'.$fiesta['id']))
								<img src="{{URL::asset('/images/fiestas/'.$fiesta['id'])}}" alt="foto ejemplo">
								@else
								<img src="{{URL::asset('/images/public_images/fiesta2.jpg')}}" alt="Imagen de ejemplo">
								@endif
								</a>
							</div>
							<div class="single-list-text">
								<a href="#"><span>{{$fiesta['nombre']}}</span></a>
								<div class="party-options">
									<a title="Editar fiesta" href="/fiesta/fiesta?fiesta={{$fiesta['id']}}"><i class="fa fa-edit"></i></a>
									<a title="Borrar fiesta" href="/fiesta/delete?id={{$fiesta['id']}}"><i class="fa fa-trash"></i></a>
								</div>
							</div>
						</div>
					@endforeach
					@endif

					@if($part)
					@foreach($part as $fiesta)
						<div class="single-list-item {{$fiesta['tipo']}}-type">
						<div class="image-box single-list-image">
							<a href="#" class="view-datos-fiesta" fIpM="{{$fiesta['id']}}">
								<img src="{{$fiesta['foto']}}" alt="Imagen de ejemplo">
							</a>
						</div>
						<div class="single-list-text">
							<a href="#"><span>{{$fiesta['nombre_fiesta']}}</span></a>
							<div class="party-options">
								<a title="Dejar fiesta" href="/fiesta/salir?fUyEi={{$fiesta['id']}}"><i class="fa fa-door-open"></i></a>    
							</div>                            
						</div>
						</div>
					@endforeach
					@endif
					<!-- Fin Single list item -->
				</div>
			</div>
			@include('layouts.modalCrearFiesta')

			@include('layouts.modalBuscarAmigos')

			@include('layouts.modalBuscarFiesta')

			@include('layouts.modalInvitarFiesta ')
			
			@include('layouts.modalDatosFiesta ')
			
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