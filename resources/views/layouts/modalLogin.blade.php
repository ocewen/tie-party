<div style="display: none;" class="modal modal-login">
    <div id="interno">
        <i class="fa fa-times"></i>
        <i class="fa fa-sort-up"></i>
    @guest 
        <form method="POST" action="{{ route('login') }}">
            @csrf
            <h4>Accede a tu cuenta: </h4>
            <input type="email" id="email" name="email" placeholder="Email">
            <input type="password" name="password" id="password" placeholder="Contraseña">
            <label>
                <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> {{ __('Recordar') }}
            </label>
            <button class="enviar-white" type="submit">Entrar</button>
        </form>
        @else    
        <div class="login-options">		
            <a href="/fiesta/user"> Mi perfil </a>
            <a href="{{ route('cerrarsesion') }}">Logout</a>
        </div>
        @endif
    </div>
</div>