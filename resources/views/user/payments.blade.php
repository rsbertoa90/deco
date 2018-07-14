@extends('layouts.default')
@section('content')

    <div>
        <table>
            @foreach ($cartItems as $item)
                {{$cartitem->price}}
            @endforeach
        </table>
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