@extends('layout', ['title' => 'Welcome home'])

@section('content')
    <img src="{{asset('images/The_X-Files_title_logo.png')}}" alt="Xfiles logo" class="h-64">
    <h1>Coucou</h1>
      <p>here is a <a href="{{ 'about' }}">link about us</a></p>
    <p>the current time is {{ date('h:i a, l F j, Y')  }}</p>
    <p>Discover the <a href="{{ route('usersIndex') }}">users list</a></p>
@endsection
