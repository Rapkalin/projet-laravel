@extends('layout', ['title' => 'User page'])

@section('content')
<h1>Here is the users page</h1>
@if(session()->has('message'))
    <div class="alert">
        {{ session()->get('message') }}
        <br>
    </div>
@endif

@foreach($users as $user)
    <div>
        <li> User n°{{ $user->id }}</li>
        <li> Name {{ $user->name }}</li>
        <li> Email {{ $user->email }}</li>
        <button><a href="{{ route('userEdit', $user->id) }}">Edit user</a></button>
        <br>
    </div>
 @endforeach
<p>fin</p>
@endsection
