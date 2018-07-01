@extends('layouts.default')

@section('content')
<div class="row display-flex flex-column">
    <h2>Datos de testeo</h2>
    <h2>Usuarios</h2>
    <table class="table table-striped">
        <tr>
            <th></th>
            <th>Nombre</th>
            <th>Mail</th>
        </tr>
        @foreach($users as $user)
            <tr>
                <td class="">
                    
                        <img class="img-fluid img-circle thumb-md rounded-circle" src="{{asset($user->data->avatar)}}" alt="{{$user->id}}">
              </td>
                <td class="">{{$user->data->fullName()}}</td>
                <td class="">{{$user->email}}</td>
            </tr>  
        @endforeach
    </table>
</div>

<div class="container display-flex flex-column ">
    <h2>Seminarios</h2>
    @foreach ($seminars as $sem )
    <div class="row display-flex flex-column mt-4">
        <h2 class="text-center text-primary">{{$sem->title}}</h2>
        <span class="text-center">{{$sem->description}}</span>
        <h4>Programas:</h4>    
            
            @foreach ($sem->programs as $program )

            <row>
                <h4 class="font-weight-bold text-info mt-5">
                    {{$program->title}}
                </h4>
                <span>
                    {{$program->description}}
                </span>
                <div>
                    <h5>
                        Temario:
                    </h5>
                    <ul>
                        @foreach ($program->topics as $topic )
                            <li> {{$topic->name}} </li>
                        {{-- {{ $program->topics->pluck('name')->implode(', ') }} --}}
                        @endforeach
                    </ul>            
                </div>
                
            <row>    
            
            <h5>Fechas:</h5>    
                <table class="table table-striped table-responsive">
                        <tr>
                            <th>
                                Localidad
                            </th>
                            <th>
                                Fecha
                            </th>
                            <th>
                                Hora
                            </th>
                        </tr>
                        @foreach ($program->events as $event)
                            <tr>
                                <td>{{ $event->city }}</td>
                                <td> {{ $event->date() }} </td>
                                <td> {{$event->time() }} </td>
                            </tr>
                        @endforeach
                        
                </table>
            
            @endforeach
        </table>
    </div>
    @endforeach
    
</div>

<div class="row flex-column d-flex">
    <h4>Pagos</h4>
    <table class="table table-striped">
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