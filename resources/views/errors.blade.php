@if ($errors->any())
<div class="notification"> 
<ul>
@foreach ($errors->all() as $error)
<p>
{{$error}}
</p>
@endforeach
</ul>
</div>
@endif