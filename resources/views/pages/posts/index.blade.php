@extends('layout', ['title' => 'Posts page'])

@section('content')
    <h1>Here is the posts page</h1>
    @if(session()->has('message'))
        <div class="alert">
            {{ session()->get('message') }}
            <br>
        </div>
    @endif

    @foreach($posts as $key => $post)
        <div>
            <li> Post n°{{ $post->id }}</li>
            <li> Title {{ $post->title }}</li>
            <li> Content {{ $post->content }}</li>
            <li> Author: {{ $post->user->name }} </li>
            @php($postTags = [])
            @foreach ($post->tags as $tag)
                {!! $postTags[] = $tag->name !!}
            @endforeach
            <li> Tags: {{ implode(', ', $postTags) }} </li>
            <button class="bg-green-500
                    hover:bg-green-700
                    text-white
                    font-bold
                    py-2 px-4
                    rounded">
                <a href="{{ route('post.edit', $post->id) }}">Edit post</a>
            </button>
        </div>
        <br>
    @endforeach
@endsection
