 <div class="modal" style="display:none" id="modal-crear-fiesta">
    <div id="interno">
        <form action="{{ route('insertarfiesta') }}" method="POST">
        @csrf
            <i class="fa fa-times"></i>
            <h2>¡¡¡Nueva Fiesta!!!</h2>
            <label for="name">¿Que nombre le darás a esta ocasión?</label>
            <input type="text" id="name" name="nombre" placeholder="¡Ponle un nombre divertido!">
            <span>Elige el tipo de ocasión que vas a organizar:</span>
            <input type="radio" id="fiesta" name="party-type" value="fiesta" checked> <label class="radio-label" for="fiesta">¡¡¡Fiesta!!!</label>
            <input type="radio" id="celebracion" name="party-type" value="celebracion"> <label class="radio-label" for="celebracio">Celebración</label>
            <input type="radio" id="boda" name="party-type" value="boda"> <label class="radio-label" for="boda">Boda</label>
            <input type="submit" class="enviar-white" value="Crear fiesta">
        </form>
    </div>
</div>