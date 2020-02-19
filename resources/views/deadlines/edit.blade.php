@extends('layout')

@section('title')
    Deadlines
@endsection

@section('header')
    Edit Deadline
@endsection

@section('content')
<form method="POST" action="/deadlines/{{$deadline->id}}">

{{ method_field('PATCH') }}

{{ csrf_field() }}

<div class="field">
    <label class="label" for="title"> Subject Name </label>
    
<div class="control">
    <input type="text" class="input" name="subject" placeholder="Subject name" required value="{{$deadline->subject}}">
</div>
</div>
<br />
<div class="field">
    <label class="label" for="desctitle">Description</label>
<div class="control">
    <textarea name="description" class="textarea" required>{{$deadline->description}}</textarea>
</div>
</div>
<br />
<div class="field">
<div class="control">
    <button type="submit" class="button is-link">Update deadline</button>
</div>
</div>

</form>

<form method="POST" action="/deadlines/{{$deadline->id}}">

{{ method_field('DELETE') }}

{{ csrf_field() }}

<div class="field">
<div class="control">
    <button type="submit" class="button">Delete deadline</button>
</div>
</div>

</form>
@endsection