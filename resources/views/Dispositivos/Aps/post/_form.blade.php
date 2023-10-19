@csrf

<div class="text-left">  
    <label for="ap_nombre">Nombre:</label>
    <input class="table" type="text" id="ap_nombre" name="ap_nombre" value="{{ old('ap_nombre', $ap->ap_nombre) }}">
    <br>

    <label for="ap_serial">Número de Serie:</label>
    <input class="table" id="ap_serial" name="ap_serial" value="{{ old('ap_serial', $ap->ap_serial) }}">
    <br>

    <label for="ap_macadd">Mac Address:</label>
    <input class="table" type="text" id="ap_macadd" name="ap_macadd" value="{{ old('ap_macadd', $ap->ap_macadd) }}">
    <br>

    <label for="ap_ip">IP:</label>
    <input class="table" type="text" id="ap_ip" name="ap_ip" value="{{ old('ap_ip', $ap->ap_ip) }}">
    <br>

    <label for="ap_firmware">Firmware:</label>
    <input class="table" type="text" id="ap_firmware" name="ap_firmware" value="{{ old('ap_firmware', $ap->ap_firmware) }}">
    <br>

    <label for="ap_alta">Fecha de alta:</label>
    <input type="date" id="ap_alta" name="ap_alta" value="{{ old('ap_alta', $ap->ap_alta) }}">
    <br>

    <label for="ap_estatus_id">Status:</label>
    <select class="table" name="ap_estatus_id">
        <option value=""></option>
        @foreach ($estatuses as $est_nombre => $id)
            <option {{ old("ap_estatus_id",$ap->ap_estatus_id) == $id ? "selected" : "" }} value="{{ $id }}">{{ $est_nombre }}</option>
        @endforeach
    </select>
    <br>

    <label for="ap_modelo_id">Modelo:</label>
    <select class="table" name="ap_modelo_id">
        <option value=""></option>
        @foreach ($modelos as $mod_nombre => $id)
            <option {{ old("ap_modelo_id",$ap->ap_modelo_id) == $id ? "selected" : "" }} value="{{ $id }}">{{ $mod_nombre }}</option>
        @endforeach
    </select>
    <br>  
</div>

<button class="my-1 btn btn-success" type="submit"> Guardar </button>