
<div class="row">
    <div class="col-12">
        <div class="card m-b-20">
            <div class="card-body">

                <h4 class="mt-0 header-title">Seminarios</h4>
                {{-- <p class="text-muted m-b-30 font-14">just start typing to edit, or move around with arrow keys or mouse clicks!</p> --}}
                <div class="" id="tables-container">

                    <table id="seminars-table" class="table table-striped m-b-0">
                        <thead>
                         <tr>
                           <th>
                               Titulo
                           </th>
                           <th>
                               descripcion
                           </th>
                           <th>
                               -
                           </th>
                        </tr> 
                        </thead>
                        <tbody>
                            @foreach ($seminars as $seminar)
                            <tr data-id=' {{ $seminar->id }} '>
                                <td data-editable data-field="title" class="font-weight-bold"> {{ $seminar->title }} </td>
                                <td data-editable data-field="description"> {{$seminar->description}} </td>
                                <td>
                                    <div class="button-group d-flex">
                                        <button  data-object="seminar" data-id="{{$seminar->id}}" class="detail-seminar button btn-md btn-outline-info">
                                            <i class="ion-search"></i>
                                        </button>
                                        <form action="/api/seminar/delete/{{$seminar->id}}" method='delete'>
                                            <button type='submit' class="ml-1 delete-seminar button btn-md btn-outline-danger">
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
                        <button class="button btn-lg btn-default ml-3 btn-outline-info " id="create-seminar">
                            Crear seminario
                        </button>
                    </div>
                </div>

            </div>
        </div>
    </div> <!-- end col -->
</div> <!-- end row --> 