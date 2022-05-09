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
        <br>
    </div>
 @endforeach
<p>fin</p>
