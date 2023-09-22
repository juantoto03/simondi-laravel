@csrf
    
<label for="">Nombre del estatus:</label>
<input class="table" type="text" id="est_nombre" name="est_nombre" value="{{ old('est_nombre', $estatus->est_nombre) }}" maxlength="50">
<br><br>

<button class="my-1 btn btn-success" type="submit">Crear</button>