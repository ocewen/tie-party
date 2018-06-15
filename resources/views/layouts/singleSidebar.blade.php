<div class="single-sidebar">
    <div class="single-sidebar-image">
        <i class="fa fa-user-alt toggle-icon toggle-icon-sidebar ti-white"></i>
        @if (auth()->user()->premium == 'S')
            <i title="Usuario premium" class="fa fa-crown icon-premium"></i>
        @endif 
        <a href="/fiesta/user">
        @if (file_exists(public_path().'/images/users/'.Auth::user()->id))
            <img src="{{URL::asset('/images/users/'.Auth::user()->id)}}" alt="foto ejemplo">
        @elseif(@fopen('https://www.gravatar.com/avatar/' . md5( strtolower( trim( Auth::user()->email ) ) ) . '?d=' . urlencode('https://www.somewhere.com/homestar.jpg') . '&s=' . 240, "r"))
                <img src="{{'https://www.gravatar.com/avatar/' . md5( strtolower( trim( Auth::user()->email ) ) ) . '?d=' . urlencode('https://www.somewhere.com/homestar.jpg') . '&s=' . 240}}" alt="foto ejemplo">
                @else
                <img src="{{URL::asset('/images/users/default.jpg')}}" alt="foto ejemplo">
        @endif
        </a>
        <a href="/fiesta/user" style="color: #333;">
            <h2 id="tai-funct" tai="{{ Auth::user()->id }}">{{ Auth::user()->nombre }}</h2>
        </a>
    </div>
    <div class="single-sidebar-menu">
        <ul>
            <li><a href="#" id="seeFriends">Amigos</a></li>
            <li><a href="#" id="masAmigos">Añadir Amigos</a></li>
            <li class="solicitudes-amistad"><a href="#" id="solicitudes">Solicitudes de amistad</a>@if($count > 0)
                <div>
                    <span>{{ $count }}</span>
                </div>
            @endif
            </li>
            @if (auth()->user()->premium != 'S')
            <li><a href="/suscribirse" id="#">Pásate a Premium</a></li>
            @endif 
            <li><a href="/user/perfil" id="seeProfile">Ver Perfil</a></li>
            <li><a class="dropdown-item" href="{{ route('cerrarsesion') }}">{{ __('Salir') }}</a></li>
        </ul>
    </div>
</div> 