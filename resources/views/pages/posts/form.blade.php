@extends('layout', ['title' => 'Post edit page'])

@section('content')
    <h1>Here is the edit page for the post</h1>

    <div class="flex">
        {!! Form::model($post, ['route' => ['post.update', $post->id], 'method' => 'put']) !!}

        <span class="shadow
                    appearance-none
                    border rounded
                    w-full
                    py-2 px-3
                    text-gray-700
                    leading-tight
                    focus:outline-none
                    focus:shadow-outline"
              id="title"
              type="text"
              placeholder="title">
                {{ Form::text('title') }}</span>

        <span class="shadow
                    appearance-none
                    border rounded
                    w-full
                    py-2 px-3
                    text-gray-700
                    leading-tight
                    focus:outline-none
                    focus:shadow-outline"
              id="content"
              type="text"
              placeholder="content">
                {{ Form::text('content') }}</span>

        <span class="shadow
                    appearance-none
                    border rounded
                    w-full
                    py-2 px-3
                    text-gray-700
                    leading-tight
                    focus:outline-none
                    focus:shadow-outline"
              id="published"
              type="text"
              placeholder="published">
                {{ Form::select('Publié', ['Publié', 'Brouillon'], null, ['placeholder' => 'Choisissez une option']) }}</span>

        <span class="shadow
                    appearance-none
                    border rounded
                    w-full
                    py-2 px-3
                    text-gray-700
                    leading-tight
                    focus:outline-none
                    focus:shadow-outline"
              id="tags"
              type="text"
              placeholder="tags">
                {{ Form::select('tags[]', $tags, $postTags, ['placeholder' => 'Tags', 'multiple' => true]) }}</span>

        <button class="bg-green-500
                    hover:bg-green-700
                    text-white
                    font-bold
                    py-2 px-4
                    rounded">
            {{ Form::submit('Save') }}</button>
        {!! Form::close() !!}
    </div>
    <br>
    <button class="bg-blue-500
                hover:bg-blue-700
                text-white
                font-bold
                py-2 px-4
                rounded">
        <a href="{{ route('posts.index') }}">Back to posts list</a></button>
@endsection
