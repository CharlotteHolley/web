@extends('layout')

@section('title')
   Modules
@endsection

@section('header')
    My Modules
@endsection

@section('content')
<ul>
    @foreach ($module as $modules)
    <li> {{ $modules }} </li>
    @endforeach
</ul>
@endsection