@include('layouts.headerTieSingle', array('body_valor' => ''))
        <section id="single-content">
            <!-- Sidebar -->
            @if(auth()->user()->tipo != 'empresa')
                @include('layouts.singleSidebar')   
            @else
                @include('layouts.singleEmpresaSidebar')
            @endif
            <!-- Fin sidebar -->
            <div class="single-content-right">
            @if(auth()->user()->tipo != 'empresa')
                @include('layouts.singleNavBar')
            @else
                @include('layouts.singleEmpresaNavBar')
            @endif
                <div class="single-list">
                    <form method="POST" action="/user/name">
                        @csrf
                        <h2>Cambia tus datos</h2>
                        <br>
                        <label for="nombre">Nombre: </label>
                        <input type="text" name="nombre" placeholder="{{$user[0]['nombre']}}">
                        <br>
                        <label for="apellidos">Apellidos: </label>
                        <input type="text" name="apellidos" placeholder="{{$user[0]['apellidos']}}">
                        <br>
                        <input type="submit" class="enviar-white" value="Enviar">
                    </form>

                    <form method="POST" action="/user/password">
                        @csrf
                        <h2>Cambiar la contraseña</h2>
                        <br>
                        <label for="prev-password">Contraseña Actual: </label>
                        <input type="password" name="prev-password" placeholder="Contraseña actual">
                        <br>
                        <label for="new-password">Nueva Contraseña: </label>
                        <input type="password" name="new-password" placeholder="Contraseña nueva">
                        <br>
                        <label for="rep-password">Nueva Contraseña: </label>
                        <input type="password" name="rep-password" placeholder="Repita la contraseña nueva">
                        <br>
                        <input type="submit"  class="enviar-white" value="Enviar">
                    </form>

                    <form method="POST" action="{{ route('subirfoto') }}" enctype="multipart/form-data">
						<h2>Sube o actualiza la imagen de perfil...</h2>
						<input type="file" name="foto">
						<input type="submit" class="enviar-white" value="Subir Foto">
					</form>
                </div>
            </div>
            @include('layouts.modalCrearFiesta')

            @include('layouts.modalBuscarAmigos')

            @include('layouts.modalBuscarFiesta')
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