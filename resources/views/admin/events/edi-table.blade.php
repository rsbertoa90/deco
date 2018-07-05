
<div class="row">
    <div class="col-12">
        <div class="card m-b-20">
            <div class="card-body">

                <h4 class="mt-0 header-title">Proximos eventos - Presencial</h4>
                {{-- <p class="text-muted m-b-30 font-14">just start typing to edit, or move around with arrow keys or mouse clicks!</p> --}}
                <div class="" id="event-tables-container">

                    <table id="events-table" class="table table-striped m-b-0">
                        <thead>
                         <tr>
                           <th>
                               Seminario
                           </th>
                           <th>
                               Provincia
                            </th>
                            <th>
                                Localidad
                            </th>
                           <th>
                               Fecha
                           </th>
                           <th>
                               hora
                           </th>
                           <th>
                               Cupo
                           </th>
                           <th>
                               Precio
                           </th>
                        </tr> 
                        </thead>
                        <tbody>
                            @foreach (App\Event::future('presencial') as $event)
                           
                            <tr data-id='{{ $event->id }} '>
                                <td class="font-weight-bold"> {{ $event->seminar->title }} </td>
                                <td  data-field="state" > 
                                    <span> {{ $event->state }} </span> <br>
                                    <select name="state" class="state-selector" data-id="{{$event->id}}">
                                        <option value=""> Cambiar </option>
                                    </select> 
                                </td>
                                <td  data-field="city" > 
                                    <span> {{ $event->city }} </span> <br>
                                    <select name="city" class="city-selector" data-id="{{$event->id}}">
                                        <option value=""> Cambiar </option>
                                    </select> 
                                </td>
                                <td data-field="date" >     
                                    <input class="" type="date" value="{{$event->date->format('Y-m-d')}}" name="date">
                                </td>
                               
                                <td data-field="time" >     
                                    <input class="" type="time" value="{{$event->date->format('H:i')}}" name="time">
                                </td>

                                <td  >
                                   <span contenteditable="true" data-field="quota">
                                       {{ $event->quota }}
                                    </span> 
                                </td>

                                <td >
                                        $
                                    <span  contenteditable="true" data-field="price">
                                        {{ $event->price }}
                                    </span>
                                </td>
                               
                              
                                <td>
                                    <div class="button-group d-flex">
                                        {{-- <button  data-object="event" data-id="{{$event->id}}" class="detail-event button btn-md btn-outline-info">
                                            <i class="ion-search"></i>
                                        </button> --}}
                                        <form action="/api/event/delete/{{$event->id}}" method='post'>
                                            @csrf
                                           
                                            @method('delete')
                                            <button type='submit' class="ml-1 delete-event button btn-md btn-outline-danger">
                                                <i class="ion-trash-a"></i>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        
                        </tbody>
                    </table>
                    <div class="row">
                        <button class="button btn-lg btn-default ml-3 btn-outline-info " id="create-event">
                            Crear Evento
                        </button>
                    </div>
                </div>

            </div>
        </div>
    </div> <!-- end col -->
</div> <!-- end row --> 