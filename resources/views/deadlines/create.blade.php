@extends('layout')

@section('title')
    Deadlines
@endsection

@section('header')
    Create new deadline
@endsection

@section('content')

<a href="/deadlines"> Go back</a>

<form method="POST" action="/deadlines">

{{ csrf_field() }}

<div>
<input type="text" name="subject" placeholder="Subject name" value="{{ old('subject') }}" required> <br />
<div>
</br>
<textarea name="description" placeholder="Description" required>{{ old('description') }}</textarea>
</div>
<button type="submit"> Create deadline </button>
</div>

@include ('errors')

</form>

@endsection