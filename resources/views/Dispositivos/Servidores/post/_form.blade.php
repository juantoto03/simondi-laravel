@csrf

<div class="text-left">  
    <label for="ser_nombre">Nombre:</label>
    <input class="table" type="text" id="ser_nombre" name="ser_nombre" value="{{ old('ser_nombre', $servidore->ser_nombre) }} " required>
    <br>

    <label for="ser_serial">Número de Serie:</label>
    <input class="table"  id="ser_serial" name="ser_serial" value="{{ old('ser_serial', $servidore->ser_serial) }}" required>
    <br>

    <label for="ser_macadd">Mac Address:</label>
    <input class="table" type="text" id="ser_macadd" name="ser_macadd" value="{{ old('ser_macadd', $servidore->ser_macadd) }}" required>
    <br>

    <label for="ser_ip">IP:</label>
    <input class="table" type="text" id="ser_ip" name="ser_ip" value="{{ old('ser_ip', $servidore->ser_ip) }}" required>
    <br>

    <label for="ser_so">Sistema Operativo:</label>
    <input class="table" type="text" id="ser_so" name="ser_so" value="{{ old('ser_so', $servidore->ser_so) }}" required>
    <br>

    <label for="ser_alta">Fecha de alta:</label>
    <input type="date" id="ser_alta" name="ser_alta" value="{{ old('ser_alta', $servidore->ser_alta) }}" required>
    <br>

    <label for="ser_estatus_id">Status:</label>
    <select class="table" name="ser_estatus_id">
        <option value=""></option>
        @foreach ($estatuses as $est_nombre => $id)
            <option {{ old("ser_estatus_id",$servidore->ser_estatus_id) == $id ? "selected" : "" }} value="{{ $id }}">{{ $est_nombre }}</option>
        @endforeach
    </select>
    <br>

    <label for="ser_modelo_id">Modelo:</label>
    <select class="table" name="ser_modelo_id">
        <option value=""></option>
        @foreach ($modelos as $mod_nombre => $id)
            <option {{ old("ser_modelo_id",$servidore->ser_modelo_id) == $id ? "selected" : "" }} value="{{ $id }}">{{ $mod_nombre }}</option>
        @endforeach
    </select>
    <br>  
</div>

<button class="my-1 btn btn-success" type="submit"> Guardar </button>