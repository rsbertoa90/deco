@extends('layouts.default')

@section('content')
    
    <div class="row">
        <div class="col-4 offset-4">
            <img class="img-responsive img-circle img-rounded img-thumbnail rounded-circle" src="{{$user->avatar}}" alt="{{$user->name}}">
        </div>
    </div>

@endsection
