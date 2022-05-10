@extends('layout', ['title' => 'User edit page'])

@section('content')
<h1>Here is the edit page for the user</h1>

<div>
    {!! Form::model($user, ['route' => ['user.update', $user->id], 'method' => 'put']) !!}

        <span class="shadow
                    appearance-none
                    border rounded
                    w-full
                    py-2 px-3
                    text-gray-700
                    leading-tight
                    focus:outline-none
                    focus:shadow-outline"
                          id="email"
                          type="text"
                          placeholder="email">
                {{ Form::text('name') }}</span>

        <span class="shadow
                    appearance-none
                    border rounded
                    w-full
                    py-2 px-3
                    text-gray-700
                    leading-tight
                    focus:outline-none
                    focus:shadow-outline"
                          id="email"
                          type="text"
                          placeholder="email">
                {{ Form::text('email') }}</span>

        <span class="shadow
                    appearance-none
                    border rounded
                    w-full
                    py-2 px-3
                    text-gray-700
                    leading-tight
                    focus:outline-none
                    focus:shadow-outline"
                          id="email"
                          type="text"
                          placeholder="password">
                {{ Form::password('password', ['class' => 'password']) }}</span>

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
    <a href="{{ route('usersIndex') }}">Back to users list</a></button>
@endsection
