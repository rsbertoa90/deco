@extends('layouts.default');

@section('content')
    <h2>Datos de testeo</h2>

    @php
        $users = App\User::all();
    @endphp
    <div class="row">
        <h2>Usuarios</h2>
        <table>
            @foreach($users as $user)
        <td>{{$user->fullName()}}</td>
        <td>{{$user->}}</td>
            @endforeach
        </table>
    </div>
@endsection