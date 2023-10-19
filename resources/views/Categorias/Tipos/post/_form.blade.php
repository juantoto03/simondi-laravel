@csrf

<div class="text-left">
    <label for="tip_nombre">Nombre del tipo:</label>
    <input class="table" type="text" id="tip_nombre" name="tip_nombre" value="{{ old('tip_nombre', $tipo->tip_nombre) }}" maxlength="50">
    <br><br>
</div>

<button class="my-1 btn btn-success text-center" type="submit"> Guardar </button>