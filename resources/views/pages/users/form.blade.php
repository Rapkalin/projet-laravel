@extends('layout', ['title' => 'User edit page'])

@section('content')
<h1>Here is the edit page for the user</h1>

{!! Form::model($user, ['route' => ['userUpdate', $user->id]]) !!}
    {{ Form::text('name') }}
    {{ Form::text('email') }}
    {{ Form::password('password', ['class' => 'password']) }}
    {{ Form::submit('Save') }}
{!! Form::close() !!}
@endsection
