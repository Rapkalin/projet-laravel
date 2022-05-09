<h1>Here is the edit page for the user</h1>

{!! Form::model($user, ['route' => ['edit', $user->id]]) !!}
    {{ Form::text('name') }}
    {{ Form::text('email') }}
    {{ Form::password('password', ['class' => 'password']) }}
    {{ Form::submit('Save') }}
{!! Form::close() !!}
