@csrf
            
<label for="">Nombre del modelo:</label>
<input class="table" type="text" name="mod_nombre" value="{{ $modelo->mod_nombre }}">
<br><br>

<label for="">Tipo:</label>
<select class="table" name="mod_tipo_id">
    <option value="{{ $modelo->mod_tipo_id }}">{{ $modelo->tipos->tip_nombre }}</option>
    @foreach ($tipos as $tip_nombre => $id)
        <option {{ old("mod_tipo_id","") == $id ? "selected" : "" }} value="{{ $id }}">{{ $tip_nombre }}</option>
    @endforeach
</select>
<br><br>

<label for="">Marca:</label>
<select class="table" name="mod_marca_id">
    <option value="{{ $modelo->mod_marca_id }}">{{ $modelo->marcas->mar_nombre }}</option>
    @foreach ($marcas as $mar_nombre => $id)
        <option {{ old("mod_marca_id","") == $id ? "selected" : "" }} value="{{ $id }}">{{ $mar_nombre }}</option>
    @endforeach
</select>
<br><br>

<button class="my-1 btn btn-success" type="submit">Guardar</button>