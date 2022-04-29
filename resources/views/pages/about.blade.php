@extends('layout')

@section('title', 'What about us? | ' . config('app.name'))

@section('content')
      <h1>About us</h1>
      <p>Page built with &hearts;</p>
      <p>back <a href="{{ route('home_path') }}">home</a></p>
@endsection
