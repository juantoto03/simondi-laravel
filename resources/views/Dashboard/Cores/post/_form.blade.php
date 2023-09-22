@csrf
            
<label for="cor_nombre">Nombre:</label>
<input class="table" type="text" id="cor_nombre" name="cor_nombre" value="{{ $core->cor_nombre }}">
<br><br>

<label for="cor_serial">Número de Serie:</label>
<input class="table"  class="form-control" id="cor_serial" name="cor_serial" value="{{ $core->cor_serial }}">
<br><br>

<label for="cor_memoria">Memoria:</label>
<input class="table" type="text" id="cor_memoria" name="cor_memoria" value="{{ $core->cor_memoria }}">
<br><br>

<label for="cor_cpu">CPU:</label>
<input class="table" type="text" id="cor_cpu" name="cor_cpu" value="{{ $core->cor_cpu }}">
<br><br>

<label for="cor_puertos">Puertos:</label>
<input type="number" id="cor_puertos" name="cor_puertos" value="{{ $core->cor_puertos }}">
<br><br>

<label for="cor_macadd">Mac Address:</label>
<input class="table" type="text" id="cor_macadd" name="cor_macadd" value="{{ $core->cor_macadd }}">
<br><br>

<label for="cor_ip">IP:</label>
<input class="table" type="text" id="cor_ip" name="cor_ip" value="{{ $core->cor_ip }}">
<br><br>

<label for="cor_firmware">Firmware:</label>
<input class="table" type="text" id="cor_firmware" name="cor_firmware" value="{{ $core->cor_firmware }}">
<br><br>

<label for="cor_alta">Fecha de alta:</label>
<input type="date" id="cor_alta" name="cor_alta" value="{{ $core->cor_alta }}">
<br><br>

<label for="cor_estatus_id">Status:</label>
<select class="table" name="cor_estatus_id">
    <option value="{{ $core->cor_estatus_id }}">{{ $core->estatuses->est_nombre }}</option>
    @foreach ($estatuses as $est_nombre => $id)
        <option {{ old("cor_estatus_id","") == $id ? "selected" : "" }} value="{{ $id }}">{{ $est_nombre }}</option>
    @endforeach
</select>
<br><br>

<label for="">Modelo:</label>
<select class="table" name="cor_modelo_id">
    <option value="{{ $core->cor_modelo_id }}">{{ $core->modelos->mod_nombre }}</option>
    @foreach ($modelos as $mod_nombre => $id)
        <option {{ old("cor_modelo_id","") == $id ? "selected" : "" }} value="{{ $id }}">{{ $mod_nombre }}</option>
    @endforeach
</select>
<br><br>  

<button class="my-1 btn btn-success" type="submit">Enviar</button>