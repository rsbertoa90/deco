@extends('layouts.default')

@section('content')
<div class="row display-flex flex-column">
    <div class="row">
        <a href="{{ url('/auth/facebook') }}" class="btn btn-facebook"><i class="fa fa-facebook"></i> Facebook</a>
    </div>
    <h2>Datos de testeo</h2>
    @if (Auth::user()->isAdmin())
        <a href="/admin" class=" col-12 col-lg-2 text-center button btn-lg btn-danger">ACA JONY</a>
    @endif
</div>

<div class="container display-flex flex-column ">
    <h2>Seminarios</h2>
    @foreach ($seminars as $sem )
    <div class="row display-flex flex-column mt-4">
        <h2 class="text-center text-primary">{{$sem->title}}</h2>
        <span class="text-center">{{$sem->description}}</span>
            
              <h5>Fechas:</h5>    
                <table  class="table table-striped  table-bordered">
                        <tr >
                            <th class="font-weight-bold">
                                Provincia
                            </th>
                            <th class="font-weight-bold">
                                Localidad
                            </th>
                            <th class="font-weight-bold">
                                Fecha
                            </th>
                            <th class="font-weight-bold">
                                Hora
                            </th>
                            <th class="font-weight-bold">
                                Inscriptos
                            </th>
                            <th class="font-weight-bold">
                                Precio
                            </th>
                        </tr>
                        @foreach ($sem->futureEvents('presencial') as $event)
                            <tr>
                                <td>{{ $event->state }}</td>
                                <td>{{ $event->city }}</td>
                                <td> {{ $event->date->format('d/m/y') }} </td>
                                <td> {{$event->date->format('h:i') }} </td>
                                <td> {{ $event->inscriptions->count() }} /  {{$event->quota}} </td>
                                <td> {{ $event->price }} </td>
                            </tr>
                        @endforeach
                        
                </table>
            
            
        
    </div>
    @endforeach
    
</div>

<div class="row flex-column d-flex">
    <h4>Pagos</h4>
    <table id="datatable" class="table table-striped">
            <thead>
                    <tr>
                        <th> - </th>
                        <th>Tipo de pago</th>
                        <th>Usuario</th>
                        <th>Fecha de pago</th>
                        <th>Monto</th>
                    </tr>
                    </thead>
        @foreach ($payments as $pay )
        <tr>
            <td>
                <img class="img-fluid img-circle thumb-md rounded-circle" src="{{asset($pay->inscription->user->data->avatar)}}" alt="{{$pay->inscription->user->data->fullName()}}">
            </td>
            <td> {{$pay->type->name}} </td>
            <td> {{$pay->inscription->user->data->fullName()}} </td>
            <td> {{$pay->created_at}} </td>
            <td> ${{$pay->amount}} </td>
        </tr>
        @endforeach
    </table>
  
</div>
@endsection

@section('js')
     <!-- Required datatable js -->
     <script src="assets/plugins/datatables/jquery.dataTables.min.js"></script>
     <script src="assets/plugins/datatables/dataTables.bootstrap4.min.js"></script>
     
     <script>
         $('#datatable').dataTable();
     </script>

@endsection