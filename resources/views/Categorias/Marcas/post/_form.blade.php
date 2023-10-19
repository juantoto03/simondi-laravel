@csrf

<div class="text-left">
    <label for="">Nombre del marca:</label>
    <input class="table" type="text" id="mar_nombre" name="mar_nombre" value="{{ old('mar_nombre', $marca->mar_nombre) }}">
    <br>
</div>

<button class="my-1 btn btn-success" type="submit"> Guardar </button>