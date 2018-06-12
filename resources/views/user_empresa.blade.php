@include('layouts.headerTieSingle', array('body_valor' => ''))
        <section id="single-content">
            <!-- Sidebar -->
            @include('layouts.singleEmpresaSidebar')
               <!-- Fin sidebar -->
            <div class="single-content-right">
                @include('layouts.singleEmpresaNavBar')
                <div class="single-list">
                @foreach($servicios as $servicio)
                        <div class="single-list-item {{$servicio['tipo']}}-type">
                        <div class="image-box single-list-image">
                            <a href="servicio/edit?IdEsQvAeA={{$servicio['id']}}">
                            @if (file_exists(public_path().'/images/servicios/'.$servicio['id']))
                            <img src="{{URL::asset('/images/servicios/'.$servicio['id'])}}" alt="Imagen de ejemplo">
                            @else
                            <img src="{{URL::asset('/images/public_images/fiesta2.jpg')}}" alt="foto ejemplo">
                            @endif
                                
                            </a>
                        </div>
                        <div class="single-list-text">
                            <a href="#"><span>{{$servicio['nombre']}}</span></a>
                            <div class="party-options">
                                <a title="Dejar servicio" href="/servicio/delete?id={{$servicio['id']}}"><i class="fa fa-times"></i></a>    
                            </div>                            
                        </div>
                        </div>
                @endforeach
                </div>
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