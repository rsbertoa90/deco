<form method="post" action="api/seminar/create">
    @csrf
    <div class="form-group row">
        <label class="col-form-label  col-12 col-lg-4"for="">Titulo</label>
        <input class="form-control  col-12 col-lg-8" name="title">
    </div>

    <div class="form-group row">
        <label class="col-form-label col-12 col-lg-4"for="">Descripcion</label>
        <textarea name="description" class="form-control col-12 col-lg-8"></textarea>
    </div>
    <button type="submit" class="button btn-lg btn-success">Guardar</button>
</form>