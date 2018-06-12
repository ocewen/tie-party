<div class="single-sidebar">
    <div class="single-sidebar-image">
        <i class="fa fa-user-alt toggle-icon toggle-icon-sidebar ti-white"></i>
        <i title="Usuario premium" class="fa fa-cogs icon-premium"></i>
        @if (file_exists(public_path().'/images/users/'.Auth::user()->id))
        <img src="{{URL::asset('/images/users/'.Auth::user()->id)}}" alt="foto ejemplo">
        @else
        <img src="{{URL::asset('/images/users/default.jpg')}}" alt="foto ejemplo">
        @endif
        
        <h2 id="tai-funct" tai="{{ Auth::user()->id }}">{{ Auth::user()->nombre }}</h2>
    </div>
    <div class="single-sidebar-menu">
        <ul>
            <li><a href="/user/perfil" id="seeProfile">Ver Perfil</a></li>
            <li><a href="/home" id="">Mis servicios</a></li>
            <li><a href="#" id="">Crear servicio</a></li>
            <li><a href="#" id="">Peticiones</a></li>
            <li><a href="#" id="">Servicios Pendientes</a></li>
            <li><a class="dropdown-item" href="{{ route('cerrarsesion') }}">{{ __('Salir') }}</a></li>
        </ul>
    </div>
</div> 