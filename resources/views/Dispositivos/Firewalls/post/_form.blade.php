@csrf

<div class="text-left">  
    <label for="fir_nombre">Nombre:</label>
    <input class="table" type="text" id="fir_nombre" name="fir_nombre" value="{{ old('fir_nombre', $firewall->fir_nombre) }}">
    <br>

    <label for="fir_serial">Número de Serie:</label>
    <input class="table" id="fir_serial" name="fir_serial" value="{{ old('fir_serial', $firewall->fir_serial) }}">
    <br>

    <label for="fir_memoria">Memoria:</label>
    <input class="table" type="text" id="fir_memoria" name="fir_memoria" value="{{ old('fir_memoria', $firewall->fir_memoria) }}">
    <br>

    <label for="fir_cpu">CPU:</label>
    <input class="table" type="text" id="fir_cpu" name="fir_cpu" value="{{ old('fir_cpu', $firewall->fir_cpu) }}">
    <br>

    <label for="fir_puertos">Puertos:</label>
    <input type="number" id="fir_puertos" name="fir_puertos" value="{{ old('fir_puertos', $firewall->fir_puertos) }}">
    <br>

    <label for="fir_macadd">Mac Address:</label>
    <input class="table" type="text" id="fir_macadd" name="fir_macadd" value="{{ old('fir_macadd', $firewall->fir_macadd) }}">
    <br>

    <label for="fir_ip">IP:</label>
    <input class="table" type="text" id="fir_ip" name="fir_ip" value="{{ old('fir_ip', $firewall->fir_ip) }}">
    <br>

    <label for="fir_firmware">Firmware:</label>
    <input class="table" type="text" id="fir_firmware" name="fir_firmware" value="{{ old('fir_firmware', $firewall->fir_firmware) }}">
    <br>

    <label for="fir_alta">Fecha de alta:</label>
    <input type="date" id="fir_alta" name="fir_alta" value="{{ old('fir_alta', $firewall->fir_alta) }}">
    <br>

    <label for="fir_estatus_id">Status:</label>
    <select class="table" name="fir_estatus_id">
        <option value=""></option>
        @foreach ($estatuses as $est_nombre => $id)
            <option {{ old("fir_estatus_id",$firewall->fir_estatus_id) == $id ? "selected" : "" }} value="{{ $id }}">{{ $est_nombre }}</option>
        @endforeach
    </select>
    <br>

    <label for="fir_modelo_id">Modelo:</label>
    <select class="table" name="fir_modelo_id">
        <option value=""></option>
        @foreach ($modelos as $mod_nombre => $id)
            <option {{ old("fir_modelo_id",$firewall->fir_modelo_id) == $id ? "selected" : "" }} value="{{ $id }}">{{ $mod_nombre }}</option>
        @endforeach
    </select>
    <br>  
</div>

<button class="my-1 btn btn-success" type="submit"> Guardar </button>