@extends('layout', ['title' => 'User edit page'])

@section('content')
<h1>Here is the edit page for the user</h1>

<div>
    {!! Form::model($user, ['route' => ['userUpdate', $user->id], 'method' => 'put']) !!}
        {{ Form::text('name') }}
        {{ Form::text('email') }}
        {{ Form::password('password', ['class' => 'password']) }}
        {{ Form::submit('Save') }}
    {!! Form::close() !!}
</div>
    <button><a href="{{ route('usersIndex') }}">Back to users list</a></button>
@endsection
