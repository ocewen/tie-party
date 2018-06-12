@include('layouts.headerTie')
        @if (session('status'))
            <div class="modal modal-aviso">
                <div id="interno" class="alert alert-success">
                    <i class="fa fa-times"></i>
                    <span>{{ session('status') }}</span>
                </div>
            </div>
        @endif
        <section id="pant1">
            <div class="img-portada img-home-1"></div>
            <div class="img-portada img-home-2"></div>
            <div class="img-portada img-home-3"></div>
            <div class="register-box">
                <div class="adorno adorno-fuegos-1"></div>
                <div class="adorno adorno-fuegos-2"></div>
                <!-- Formulario Registro -->
                <form class="form-reg-home" method="POST" action="{{ route('register') }}">
                @csrf
                    <input type="hidden" id="CSRF_TOKEN" value="{{csrf_token()}}">
                    <h2>Crea tu cuenta:</h2>
                    <p>Y comienza a disfrutar con nosotros:</p>
                    <input type="text" name="nombre" id="nombre" placeholder="Nombre">
                    <input type="text" name="apellidos" id="apellidos" placeholder="Apellidos">
                    <input type="email" name="email" id="registerEmail" placeholder="Email">
                    <input type="password" name="password" placeholder="Contraseña">
                    <input type="password" name="password_confirmation" placeholder="Repetir contraseña">
                    <span>Al registrarte estás aceptando las políticas de privacidad, las políticas ventas y las políticas de cookies de la empresa Tie-party que te facilitaremos si te pones en contacto con nosotros. </span>
                    <button class="enviar" type="submit" value="Registrarte">Registrarte</button>
                </form>
                <!-- Fin formulario registro -->
            </div>
        </section>
        <section id="pant2">
            <div class="home-boxs row">
                <h2 class="home-h2">Ven a organizar tus fiestas con nosotros</h2>
                <div class="h-box">
                    <div class="img-box"><img src="{{URL::asset('/images/public_images/fiesta2.jpg')}}" alt="Foto fiesta"></div>
                    <div class="text-box">
                        <h3>Fiestas</h3>
                        <p>Esa fiesta casual que quieres organizar con el fin de pasarlo bien, y nada más!</p>
                    </div>
                </div>
                <div class="h-box">
                    <div class="img-box"><img src="{{URL::asset('/images/public_images/boda2.jpg')}}" alt="foto boda"></div>
                    <div class="text-box">
                        <h3>Bodas</h3>
                        <p>Organiza con nosotros ese día tan especial.</p>
                    </div>
                </div>
                <div class="h-box">
                    <div class="img-box"><img src="{{URL::asset('/images/public_images/celebracion2.jpg')}}" alt="foto celebracion"></div>
                    <div class="text-box">
                        <h3>Celebraciones</h3>
                        <p>te ayudamos a organizar esa celebración, sea cual sea.</p>
                    </div>
                </div>
                <div class="adorno adorno-fuegos-3"></div>
                <div class="adorno adorno-fuegos-4"></div>
            </div>
        </section>
        <section id="pant3">
            <div class="row">
                <h2 class="home-h2">Descubre el potencial de tu fiesta</h2>
                <div class="home-boxs-3">
                    <div class="h-box-3">
                        <div class="h-box-3-img img-box">
                            <img src="{{URL::asset('/images/public_images/fiesta3.jpg')}}" alt="foto fiesta">
                        </div>
                        <div class="h-box-3-text">
                            <h3>Fiesta</h3>
                            <p>¿Sabías que en una sencilla fiesta en tu casa puedes tener una barra de bebidas, a un camarero sirviendo o un dj pinchando? Ven a descubrirlo con nosotros.</p>
                        </div>
                        <div class="adorno adorno-fuegos-2 adorno-fuegos-2-1"></div>
                    </div>
                    <div class="h-box-3">
                        <div class="h-box-3-text">
                            <h3>Bodas</h3>
                            <p>Te ayudamos con cada detalle de ese día tan especial, desde buscar el local o el catering, hasta organizar a los invitados o buscar la decoración.</p>
                        </div>
                        <div class="h-box-3-img img-box">
                            <img src="{{URL::asset('/images/public_images/boda3.jpg')}}" alt="foto boda">
                        </div>
                        <div class="adorno adorno-fuegos-1"></div>
                    </div>
                    <div class="h-box-3">
                        <div class="h-box-3-img img-box">
                            <img src="{{URL::asset('/images/public_images/celebracion3.jpg')}}" alt="foto celebracion">
                        </div>
                        <div class="h-box-3-text">
                            <h3>Celebraciones</h3>
                            <p>¿Se acerca ese cumpleaños, graduación, o aniversario, y no sabes como celebrarlo? ¡Ven y déjanos que te mostremos cómo!</p>
                        </div>
                        <div class="adorno adorno-fuegos-2 adorno-fuegos-2-2"></div>
                    </div>
                </div>
            </div>
        </section>
        <section id="pant4">
            <div class="row">
                <div class="img-box">
                    <img class="cocktail-n" src="{{URL::asset('/images/public_images/cocktail-turq.jpg')}}" alt="foto de un cocktail">
                    <img class="cocktail-p" src="{{URL::asset('/images/public_images/cocktail-p.jpg')}}" alt="foto de un cocktail">
                </div>
                <div class="home-4-text">
                    <h2>¿Ofreces servicios para fiestas?</h2>
                    <p>Si tu campo de trabajo son las fiestas o celebraciones, ven a compartir este portal con nosotros. Este es tu sitio de anuncio. Nosotros te acercamos a tus clientes.</p>
                    <p>Ya sea que ofrezcas servicios, productos o establecimientos para fiestas, somos el lugar ideal para tu negocio.</p>
                    <div class="adorno adorno-fuegos-2"></div>
                </div>
            </div>            
        </section>
@include('layouts/footer1')