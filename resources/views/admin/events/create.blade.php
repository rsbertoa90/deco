<form method="post" action="api/event/create" id="create-event-form">
    @csrf

    <div class="form-group row">
        <label for="" class="col-form-label col-12 col-lg-4">Modo</label>
        <select class=" col-12 col-lg-8 form-control" name="mode" id="mode-select">
            <option value="presencial">Presencial</option>
            <option value="online">Online</option>
        </select>
    </div>

    <div class="form-group row">
        <label class="col-form-label  col-12 col-lg-4"for="">Seminario</label>
        <select required class=" col-12 col-lg-8 form-control"  name="seminar_id">
            <option value="">Elegir</option>
            @foreach (App\Seminar::all() as $seminar)
                <option value=" {{ $seminar->id }} "> {{ $seminar->title }} </option>
            @endforeach
        </select>
    </div>
    <div class="form-group row" id="state-row">
        <label  class="col-form-label  col-12 col-lg-4" >Provincia</label>
        <select  name="state" class="state-selector form-control col-12 col-lg-8 " data-id="0">
            <option value=""> Cambiar </option>
        </select> 
    </div>
    <div class="form-group row" id="city-row">
        <label  class="col-form-label  col-12 col-lg-4" for="">Ciudad</label>
        <select  name="city" class="city-selector col-12 col-lg-8 form-control" data-id="0">
            <option value=""> Cambiar </option>
        </select> 
    </div>
    <div class="form-group row">
        <label  class="col-form-label  col-12 col-lg-4" for=""> Fecha </label>
        <input  
            required class=" col-12 col-lg-8 form-control" 
            type="date"  
            name="date"
            value="{{trim(now()->format('Y-m-d'))}}" 
            data-date-mindDate="{{trim(now()->format('Y-m-d'))}}"
            min="{{trim(now()->format('Y-m-d'))}}">
    </div>
    <div class="form-group row">
        <label  class="col-form-label  col-12 col-lg-4" for=""> Hora </label>
        <input required class=" col-12 col-lg-8 form-control" type="time"  name="time">
    </div>
    <div class="form-group row">
            <label  class="col-form-label  col-12 col-lg-4" for=""> Cupo </label>
            <input requiredd class=" col-12 col-lg-8 form-control" type="number"  name="quota">
    </div>
    <div class="form-group row">
            <label  class="col-form-label  col-12 col-lg-4" for=""> Precio </label>
            <input required class=" col-12 col-lg-8 form-control" type="number" placeholder="$"  name="price">
    </div>

    <div class="form-group row">
        <label class="col-form-label col-12 col-lg-4"for="">Comentarios</label>
        <textarea name="comments" class="form-control col-12 col-lg-8"></textarea>
    </div>

    <button type="submit" class="button btn-lg btn-success">Guardar</button>
</form>
