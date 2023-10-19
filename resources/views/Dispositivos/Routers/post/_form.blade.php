@csrf

<div class="text-left">
    <label for="rou_nombre">Nombre:</label>
    <input class="table" type="text" id="rou_nombre" name="rou_nombre" value="{{ old('rou_nombre', $router->rou_nombre) }}">
    <br>

    <label for="rou_serial">Número de Serie:</label>
    <input class="table" id="rou_serial" name="rou_serial" value="{{ old('rou_serial', $router->rou_serial) }}">
    <br>

    <label for="rou_memoria">Memoria:</label>
    <input class="table" type="text" id="rou_memoria" name="rou_memoria" value="{{ old('rou_memoria', $router->rou_memoria) }}">
    <br>

    <label for="rou_cpu">CPU:</label>
    <input class="table" type="text" id="rou_cpu" name="rou_cpu" value="{{ old('rou_cpu', $router->rou_cpu) }}">
    <br>

    <label for="rou_puertos">Puertos:</label>
    <input type="number" id="rou_puertos" name="rou_puertos" value="{{ old('rou_puertos', $router->rou_puertos) }}">
    <br><br>

    <label for="rou_macadd">Mac Address:</label>
    <input class="table" type="text" id="rou_macadd" name="rou_macadd" value="{{ old('rou_macadd', $router->rou_macadd) }}">
    <br>

    <label for="rou_ip">IP:</label>
    <input class="table" type="text" id="rou_ip" name="rou_ip" value="{{ old('rou_ip', $router->rou_ip) }}">
    <br>

    <label for="rou_firmware">Firmware:</label>
    <input class="table" type="text" id="rou_firmware" name="rou_firmware" value="{{ old('rou_firmware', $router->rou_firmware) }}">
    <br>

    <label for="rou_alta">Fecha de alta:</label>
    <input type="date" id="rou_alta" name="rou_alta" value="{{ old('rou_alta', $router->rou_alta) }}">
    <br><br>

    <label for="rou_estatus_id">Status:</label>
    <select class="table" name="rou_estatus_id">
        <option value=""></option>
        @foreach ($estatuses as $est_nombre => $id)
            <option {{ old("rou_estatus_id",$router->rou_estatus_id) == $id ? "selected" : "" }} value="{{ $id }}">{{ $est_nombre }}</option>
        @endforeach
    </select>
    <br>

    <label for="rou_modelo_id">Modelo:</label>
    <select class="table" name="rou_modelo_id">
        <option value=""></option>
        @foreach ($modelos as $mod_nombre => $id)
            <option {{ old("rou_modelo_id",$router->rou_modelo_id) == $id ? "selected" : "" }} value="{{ $id }}">{{ $mod_nombre }}</option>
        @endforeach
    </select>
    <br>  
</div>

<button class="my-1 btn btn-success" type="submit"> Guardar </button>