@include('layouts.headerTieSingle', array('body_valor' => $arr[0]['tipo']))
        @if (session('status'))
            <div class="modal modal-aviso">
                <div id="interno" class="alert alert-success">
                    <i class="fa fa-times"></i>
                    <span>{{ session('status') }}</span>
                </div>
            </div>
        @endif
        <section id="single-content" mm="{{$arr[0]['id']}}">
            <!-- Sidebar -->
            @include('layouts.fiestaSidebar', array('arr' => $arr))
               <!-- Fin sidebar -->
            <div class="single-content-right">
            @include('layouts.singlefiestaNavBar')
                <div class="single-list">
                    <!-- Single list item -->
                    <div class="single-list-item party-type clickable lista_invitados">
                        <div class="image-box single-list-image">
                            <img src="{{URL::asset('/images/public_images/Invitados.jpg')}}" alt="Imagen de ejemplo">
                        </div>
                        <div class="single-list-text">
                            <span>Invitados</span>
                        </div>
                    </div>
                    <!-- Fin Single list item -->
                    <!-- Single list item -->
                    <div class="single-list-item party-type serv_cont clickable">
                        <div class="image-box single-list-image">
                            <img src="{{URL::asset('/images/public_images/Servicios.jpg')}}" alt="Imagen de ejemplo">
                        </div>
                        <div class="single-list-text">
                            <span>Servicios</span>
                        </div>
                    </div>
                    <!-- Fin Single list item -->
                    <!-- Single list item -->
                    <div class="single-list-item party-type lista-herramientas clickable">
                        <div class="image-box single-list-image">
                            <img src="{{URL::asset('/images/public_images/Herramientas.jpg')}}" alt="Imagen de ejemplo">
                        </div>
                        <div class="single-list-text">
                            <span>Lista de Herramientas (Incorporadas por Tie-Party)</span>
                        </div>
                    </div>
                    <!-- Fin Single list item -->
                    <!-- Single list item -->
                    <div class="single-list-item party-type clickable" id="inv-single">
                        <div class="image-box single-list-image">
                            <img src="{{URL::asset('/images/public_images/EnviarInvitaciones.jpg')}}" alt="Imagen de ejemplo">
                        </div>
                        <div class="single-list-text">
                            <span>Enviar invitaciones</span>
                        </div>
                    </div>
                    <!-- Fin Single list item -->
                </div>
            </div>
        </section>

         @include('layouts.modalCrearFiesta')

        @include('layouts.modalBuscarAmigos')

        @include('layouts.modalBuscarFiesta')

        @include('layouts.modalInvitarFiesta ')

        @include('layouts.modalBuscarServicio ')

        @include('layouts.modalProgramarFiesta ', array('arr' => $arr))

        @include('layouts.modalDatosFiesta ', array('arr' => $arr))
        
        @if (session('status'))
            <div class="modal modal-aviso">
                <div id="interno" class="alert alert-success">
                    <i class="fa fa-times"></i>
                    <span>{{ session('status') }}</span>
                </div>
            </div>
        @endif
        
        <footer>
                <div id="foot-5">
                    <p>Copiright 2018 © Todos los derechos reservados a la empresa Tie-party Company</p>
                </div>
            </div>
        </footer>
        <script type="text/javascript" src="{{ asset('js/recursos/jquery.js') }}"></script>
    </body>
</html>