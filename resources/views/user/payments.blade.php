@extends('layouts.default')
@section('content')
<div id="pay-app">
     <form class="row" action="/register-payment" method="post">
        @csrf
        <h4>A PAGAR</h4>
        <div class="col-4">
            <select name="method" id="method" class="form-control">
                    @foreach (App\PaymentType::all() as $item)
                        <option value="{{$item->id}}">{{$item->name}}</option>
                    @endforeach
            </select>
        </div>
            
        <table class="col-12 table table-responsive table-striped">
            
            @foreach ($events as $event)
            <tr data-id="{{$event->id}}" class="event-row">
                <td class="font-weigth-bold">
                    {{$event->seminar->title}}
                </td>
                <td>
                    {{$event->city}}
                </td>
                <td>
                    {{$event->date}}
                </td>
                <td class="price">
                    {{$event->price}}
                </td>
                <td>
                    <label class="radio-inline ">
                        <input class="half" type="radio" name="halfs[{{$event->id}}]" value=0 checked> Total
                    </label>
                    <label class="radio-inline ">
                        <input class="half" type="radio" name="halfs[{{$event->id}}]" value=1> Seña
                    </label>
                </td>


                
            </tr>
            @endforeach  
        </table>
        <div class="col-12 d-flex mr-5 pr-5 justify-content-start">
            <span id='mp-warn' style="display:none" class="text-danger mr-5">*Mercado Pago tiene un 10% de recargo por el uso del servicio</span>
            <span class="mr-3">TOTAL A PAGAR:</span>
           AR$ <input type="number" name="total" disabled value="" id="total-payment">
        </div>
        
        
        <div class="col-12 d-flex justify-content-start">
            <button class=" button btn-lg btn-info" type="submit">PAGAR</button>
        </div>
    </form>
</div>
  

    @if ($user->payments)   
        <div>
            <h3>mis pagos</h3>
        </div>
        @foreach ($user->payments as $payment)
            <table>
            <td>{{$payment->id}}</td>
            <td>{{$payment->payment_type->name}}</td>
            <td>{{$payment->status}}</td>
            </table>
        @endforeach
    @endif
@endsection

@section('js')
    <script>
        var getTotal = function()
        {
            let tot = 0;
            let met =  $('#method').val() ;
            $('.event-row').each(function(){
                // console.log('event-row',this);
                let price = $(this).find('.price').text();
                let half = $(this).find('.half:checked').val();
                // console.log('method',method, typeof method);
                
                if (half == 1){
                    tot+=Number(price) / 2;
                }
                else {
                    tot+=Number(price);
                }
            });
            // console.log(2, typeof 2);
            // console.log(met,typeof met);
            // console.log(met == 2);
            
            if (met == 2){
                tot = tot*1.1;
                // console.log('10 por ciento',tot);
                }
            return tot;
        }
       
        
        $('#total-payment').val(getTotal());
        
        $('#method').on('change',function(){
            $('#total-payment').val(getTotal());
            console.log($('#method').val() =='2');
            if( $('#method').val() == '2')
            {
                console.log( $('#mp-warn').show());
                
                $('#mp-warn').show();
            }
            else { $('#mp-warn').hide();}
        });

        $('.half').each(function(){
            $(this).on('change',function(){
                $('#total-payment').val(getTotal());
                
                
            });
        });
    </script>
@endsection