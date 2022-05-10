@extends('layout', ['title' => 'Welcome home'])

@section('content')
    <img src="{{asset('images/The_X-Files_title_logo.png')}}" alt="Xfiles logo" class="h-64">
    <h1>Coucou</h1>
      <p>here is a <a href="{{ 'about' }}">link about us</a></p>
    <p>the current time is {{ date('h:i a, l F j, Y')  }}</p>
    <button class="bg-blue-500
                    hover:bg-blue-700
                    text-white
                    font-bold
                    py-2 px-4
                    rounded">
        <a href="{{ route('users.index') }}">Discover the users list</a></button>
@endsection
