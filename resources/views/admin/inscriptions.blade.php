@extends('layouts.default')

@section('content')
    <div id="vue-container">
        <inscriptions csrf="{{ csrf_token() }}"></inscriptions>

    </div>
@endsection