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
        <button class="bg-green-500
                    hover:bg-green-700
                    text-white
                    font-bold
                    py-2 px-4
                    rounded">
            <a href="{{ route('userEdit', $user->id) }}">Edit user</a>
        </button>
    </div>
    <br>
 @endforeach
@endsection
