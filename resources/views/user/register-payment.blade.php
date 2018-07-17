@extends('default')

@section('content')
    <form action="/registerPayment" enctype="multipart/form-data">
        
        <div class="row form-group">
            <label for="" class="col-12 col-lg-4">Inscripcion</label>
            @forelse ($user->pendInscriptions() as $inscription)
            <input checked type="checkbox" name="inscription[]" value=" {{$inscription->id}} "> 
            {{ $inscription->event->seminar->name }} / {{ $inscription->event->city }} - {{ $inscription->event->date }}
            @empty
                <span class="text-danger"> No hay inscripciones que pagar </span>
            @endforelse
        </div>

        <div class="row form-group">
            <label for="" class="col-12 col-lg-4">Monto</label>
            <input type="number" name="amount" class="form-control col-12 col-lg-8"></input>
        </div>
        <div class="row form-group">
            <label for="" class="col-12 col-lg-4">Subir comprobante</label>
            <input type="field" name="ticket" class="form-control col-12 col-lg-8"></input>
        </div>
        <div class="row form-group">
            <label for="" class="col-12 col-lg-4"> Comentarios </label>
            <textfield class="form-control col-12 col-lg-8"></textfield>
        </div>
        <div class="row form-group">
            <label for="" class="col-12 col-lg-4"></label>
            <input class="form-control col-12 col-lg-8"></input>
        </div>
        <div class="row form-group">
            <label for="" class="col-12 col-lg-4"></label>
            <input class="form-control col-12 col-lg-8"></input>
        </div>
    </form>
@endsection