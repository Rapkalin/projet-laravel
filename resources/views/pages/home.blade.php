@extends('layout')

@section('content')
      <h1>Coucou</h1>
      <p>here is a <a href="/about-us">link about us</a></p>
    <p>the current time is {{ date('h:i a, l F j, Y')  }}</p>
@endsection
