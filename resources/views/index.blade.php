@extends('layouts.default')

@section('content')

<div class="container display-flex flex-column ">
    <h2>Proximos seminarios</h2>
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
                            <th  class="font-weight-bold">
                                -
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
                                @if ($user)
                                    @if (!$event->isInscribed($user))
                                      
                                        @if ($user->hasInCart($event))
                                            <td> <a href="/remove-from-cart/{{$event->id}} ">Cancelar inscripcion</a></td>
                                        @else
                                            <td> <a href="/add-to-cart/{{$event->id}}" class="add-to-cart button btn-lg btn-outline-success" data-id="{{$event->id}}"> inscribirme </a>   </td>
                                        @endif
                                    @else
                                        <td> <span class="text-success">Inscripto</span> </td>
                                    @endif
                                @else
                                    <td> <button class=" button btn-lg btn-outline-success" data-toggle="modal" data-target=".login-modal" > <i class="ion-ios7-cart"></i> </button>   </td>
                                    @include('user.login-modal')
                                @endif
                            </tr>
                        @endforeach
                        
                </table>
            
            
        
    </div>
    @endforeach
    
</div>
@if (Cart::count())
    @include('user.cart')
@endif
@endsection

@section('js')
     <!-- Required datatable js -->
     <script src="assets/plugins/datatables/jquery.dataTables.min.js"></script>
     <script src="assets/plugins/datatables/dataTables.bootstrap4.min.js"></script>
     
     <script>
         $('#datatable').dataTable();
     </script>

    

@endsection