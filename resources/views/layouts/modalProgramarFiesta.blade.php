 <div class="modal" style="display:none" id="modal-programar-fiesta">
    <div id="interno">
        <form action="{{ route('programdate') }}" method="POST">
        @csrf
            <i class="fa fa-times"></i>
            <h2>¡Dale un día y fecha a tu fiesta!</h2>
            
            <label>¿Dónde será la fiesta?</label>
            <input type="text" id="direccion" name="direccion" value="{{$arr[0]['direccion']}}">
            <label>¿Que fecha escogerás para la ocasión?</label>
            <input type="hidden" name="FiPAlF" value="{{$arr[0]['id']}}">
            <input type="date" id="date" name="date" value="{{$arr[0]['fecha']}}"> <label class="radio-label" for="fiesta">Fecha</label>
            <input type="time" id="time" name="time" value="{{$arr[0]['hora']}}"> <label class="radio-label" for="celebracio">Hora</label>
            <input type="submit" class="enviar-white" value="Programa tu Fiesta">
        </form>
        <br>
        <form class="servicio-form" method="POST" action="{{ route('subirfotofiesta') }}" enctype="multipart/form-data">
        @csrf
            <h2>Sube o actualiza la imagen de tu fiesta</h2>
            <input type="hidden" value="{{$arr[0]['id']}}" name="fIpM">
            <input type="file" name="foto"><small>5MB Máx.<small>
            <input type="submit" class="enviar-white" value="Subir Foto">
        </form>
    </div>
</div>