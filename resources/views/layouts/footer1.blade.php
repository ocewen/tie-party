<footer>
            <div class="row">
                <div id="foot-1">
                    <div class="adorno adorno-fuegos-4"></div>
                    <h4>Contacto</h4>
                    <ul>
                        <li>
                            <a href="/quienes">Quienes Somos</a>
                        </li>
                        <li>
                            <a href="/contacto">Contacto</a>
                        </li>
                    </ul>
                    <h4>Dirección:</h4>
                    <p>Calle al Andalus, 2</p>
                    <p>cp: 29313</p>
                    <p>Villanueva del Trabuco, Málaga</p>
                    <p>958 205 236 / 666555888</p>
                    <p>info@tieparty.com</p>
                </div>
                <div id="foot-2">
                    <h4>Páginas legales:</h4>
                    <ul>
                        <li>Aviso legal</li>
                        <li>Política de Cookies</li>
                        <li>Política de privacidad</li>
                    </ul>
                </div>
                <div id="foot-3">
                    <!-- Formulario registro empresa -->
                    <form method="POST" action="{{ route('regemp') }}">
                    @csrf
                        <h4>Registro empresa: </h4>
                        <input type="text" name="nombre" placeholder="Nombre de la empresa">
                        <input type="text" name="apellidos" placeholder="Distintivo de la empresa">
                        <input type="email" name="email" placeholder="Email">
                        <input type="password" name="password" placeholder="Contraseña">
                        <input type="password" name="password_confirmation" placeholder="Repetir contraseña">
                        <input class="enviar" type="submit" value="Registrarte">
                    </form>
                    <!-- fin formulario registro empresa -->
                </div>
                <div id="foot-4">
                    <!-- Formulario login empresa -->
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <h4>Login empresa: </h4>
                        <input type="email" name="email" placeholder="Email">
                        <input type="password" name="password" placeholder="Contraseña">
                        <button class="enviar-white" type="submit" value="Entrar">Entrar</button>
                    </form>
                    <!-- Fin formulario login empresa -->
                    <div class="adorno adorno-fuegos-3"></div>
                </div>
                <div id="foot-5">
                    <p>Copiright 2018 © Todos los derechos reservados a la empresa Tie-party Company</p>
                </div>
            </div>
            
        </footer>
        <script type="text/javascript" src="{{ asset('js/recursos/jquery.js') }}"></script>
    </body>
</html>