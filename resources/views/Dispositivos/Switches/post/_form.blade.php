@csrf

<div class="text-left">  
    <label for="swi_nombre">Nombre:</label>
    <input class="table" type="text" id="swi_nombre" name="swi_nombre" value="{{ old('swi_nombre', $switch->swi_nombre) }}">
    <br>

    <label for="swi_serial">Número de Serie:</label>
    <input class="table" id="swi_serial" name="swi_serial" value="{{ old('swi_serial', $switch->swi_serial) }}">
    <br>

    <label for="swi_memoria">Memoria:</label>
    <input class="table" type="text" id="swi_memoria" name="swi_memoria" value="{{ old('swi_memoria', $switch->swi_memoria) }}">
    <br>

    <label for="swi_cpu">CPU:</label>
    <input class="table" type="text" id="swi_cpu" name="swi_cpu" value="{{ old('swi_cpu', $switch->swi_cpu) }}">
    <br>

    <label for="swi_puertos">Puertos:</label>
    <input type="number" id="swi_puertos" name="swi_puertos" value="{{ old('swi_puertos', $switch->swi_puertos) }}">
    <br>

    <label for="swi_macadd">Mac Address:</label>
    <input class="table" type="text" id="swi_macadd" name="swi_macadd" value="{{ old('swi_macadd', $switch->swi_macadd) }}">
    <br>

    <label for="swi_ip">IP:</label>
    <input class="table" type="text" id="swi_ip" name="swi_ip" value="{{ old('swi_ip', $switch->swi_ip) }}">
    <br>

    <label for="swi_firmware">Firmware:</label>
    <input class="table" type="text" id="swi_firmware" name="swi_firmware" value="{{ old('swi_firmware', $switch->swi_firmware) }}">
    <br>

    <label for="swi_alta">Fecha de alta:</label>
    <input type="date" id="swi_alta" name="swi_alta" value="{{ old('swi_alta', $switch->swi_alta) }}">
    <br>

    <label for="swi_estatus_id">Status:</label>
    <select class="table" name="swi_estatus_id">
        <option value=""></option>
        @foreach ($estatuses as $est_nombre => $id)
            <option {{ old("swi_estatus_id",$switch->swi_estatus_id) == $id ? "selected" : "" }} value="{{ $id }}">{{ $est_nombre }}</option>
        @endforeach
    </select>
    <br>

    <label for="swi_modelo_id">Modelo:</label>
    <select class="table" name="swi_modelo_id">
        <option value=""></option>
        @foreach ($modelos as $mod_nombre => $id)
            <option {{ old("swi_modelo_id",$switch->swi_modelo_id) == $id ? "selected" : "" }} value="{{ $id }}">{{ $mod_nombre }}</option>
        @endforeach
    </select>
    <br>  
</div>

<button class="my-1 btn btn-success" type="submit"> Guardar </button>