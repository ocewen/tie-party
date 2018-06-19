 <div class="modal" style="display:none" id="modal-crear-servicio">
    <div id="interno">
        <form action="{{ route('registerservice') }}" method="POST">
        @csrf
            <i class="fa fa-times"></i>
            <h2>Nuevo Servicio</h2>
            <label for="name">¿Que nombre le darás a este servicio?</label>
            <input type="text" id="name" name="nombre" placeholder="Nombre del servicio a ofrecer">
            <span>Elige el tipo de ocasión que vas a organizar:</span>
            <input type="radio" id="fiesta" name="servicio-type" value="Catering" checked> <label class="radio-label" for="Catering">Catering</label>
            <input type="radio" id="musica" name="servicio-type" value="Música"> <label class="radio-label" for="Música">Música</label>
            <input type="radio" id="deportes" name="servicio-type" value="Deportes"> <label class="radio-label" for="Deportes">Deportes</label>
            <input type="radio" id="erotico" name="servicio-type" value="Otros"> <label class="radio-label" for="Otros">Otros</label>
            <span><label for="name">¿Cuántas personas se unirán al servicio?</label></span>
            <input type="number" id="num" name="num" placeholder="">
            <input type="submit" class="enviar-white" value="Crear fiesta">
        </form>
    </div>
</div>