@extends('layout')

@section('title')
    Deadlines
@endsection

@section('header')
    {{$deadline->subject}}
@endsection

@section('content')
<p>
{{$deadline->description}}
</p>
<a href="/deadlines/{{$deadline->id}}/edit">Edit</a>
<br />
<br />


@if ($deadline->tasks->count())
<div>
    @foreach ($deadline->tasks as $task)
        <form method="POST" action="/completed-tasks/{{$task->id}}">
        
        
       @if ($task->completed)
            {{ method_field('DELETE') }}
       @endif 
            
            
            {{ csrf_field() }}
            
            <label class="checkbox" for="completed" {{ $task->completed ? 'is-complete' : '' }}>
            <input type="checkbox" name="completed" onChange="this.form.submit()" {{ $task->completed ? 'checked' : '' }}>
            {{ $task->description }}
        </form>
        
    @endforeach
</div>
@endif

<br />
<hr>
<br />

<form method="POST" action=" {{ $deadline->id }}/tasks">
{{ csrf_field() }}
    <div class="field">
        <label class="label" for="description"> New  Task </label>
    
        <div class="control">
            <input type="text" class="input" name="description" placeholder="New Task" required>
        </div>
    </div>
    
    <div class="field">
        <div class="control">
            <button type="submit" class="button is-link"> Add Task </button>
        </div>
    </div>
    @include ('errors')
</form>

@endsection

