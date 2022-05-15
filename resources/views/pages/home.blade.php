@extends('layout', ['title' => 'Welcome home'])

@section('content')
    <div>
        <img src="{{asset('images/The_X-Files_title_logo.png')}}" alt="Xfiles logo" class="h-64">
        <h1>Hey you, wanna check something? Hit the right button:</h1>
        <br>
        <br>
        <button class="bg-blue-500
                        hover:bg-blue-700
                        text-white
                        font-bold
                        py-2 px-4
                        rounded">
            <a href="{{ route('users.index') }}">Discover the users list</a></button>
        <br>
        <br>
        <button class="bg-blue-500
                        hover:bg-blue-700
                        text-white
                        font-bold
                        py-2 px-4
                        rounded">
            <a href="{{ route('posts.index') }}">Discover the posts list</a></button>
    </div>
@endsection
