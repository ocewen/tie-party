<div class="single-sidebar">
    <div class="single-sidebar-image">
        <i class="fa fa-user-alt toggle-icon toggle-icon-sidebar ti-white"></i>
        @if(file_exists(public_path().'/images/fiestas/'.$_GET['fiesta']))
            <img src="{{ URL::asset('/images/fiestas/'.$_GET['fiesta']) }}" alt="foto ejemplo">
        @else
            <img src="{{ URL::asset('/images/public_images/fiesta2.jpg') }}" alt="foto ejemplo">
        @endif
        <h2 id="tai-funct" tai="$_GET['fiesta']">{{$arr[0]['nombre']}}</h2>
    </div>
    <div class="single-sidebar-menu">
        <ul>
            <li><a href="/fiesta/fiesta?fiesta={{$_GET['fiesta']}}">Ver la Fiesta</a></li>
            <li><a id="programar-fiesta" href="#">Programar fiesta</a></li>
            <li><a href="/fiesta/user" id="seeProfile">Volver al Perfil</a></li>
            <li><a class="dropdown-item" href="{{ route('cerrarsesion') }}">{{ __('Salir') }}</a></li>
        </ul>
    </div>
</div> 