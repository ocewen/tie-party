<div class="single-nav">
	<i class="fab fa-black-tie toggle-icon toggle-icon-single-navbar ti-white"></i>
    <ul>
        <li><a href="/fiesta/user">Todas las fiestas</a></li>
        <li><a href="#" id="seePersonal">Mis fiestas</a></li>
        <li><a id="btn-buscar" href="">Buscar fiesta</a></li>
        <li><a href="#" id="seeParticipa">Participo</a></li>
        <li><a href="#" id="lastFiesta">Fiestas pasadas</a></li>
        <li><a href="">Invitaciones</a></li>
    </ul>
    @if(($total >= 2) && (auth()->user()->premium != 'S'))
    <div class="btn-crear-fiesta-error"><i class="fa fa-plus"></i></div>
    @else
    <div class="btn-crear-fiesta"><i class="fa fa-plus"></i></div>
    @endif
</div>