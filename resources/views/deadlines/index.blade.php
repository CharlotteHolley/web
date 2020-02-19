@extends('layout')

@section('title')
    Deadlines
@endsection

@section('header')
    My Deadlines
@endsection

@section('content')

<a href="/deadlines/create">Create a new deadline</a>
<hr>

    @foreach ($deadlines as $deadline)
    <p>
    <a href="/deadlines/{{$deadline->id}}">
    {{ $deadline->subject }} 
    </a>
    </p>
    <p> {{ $deadline->description }} </p>
    <br />
    <a href="/deadlines/{{$deadline->id}}/edit">Edit</a>
    <br />
    <br />
    <hr>
    @endforeach
@endsection