@extends('layout')

@section('content')
<h1>Categorys</h1>
	<form action="categorys" method="POST">
		<div class="input-group">
			<h3>Name: </h3><input type="text" name="name">
		</div>



		<input type="text" name="description">
			1<input type="radio" name="status" value="1">
			0<input type="radio" name="status" value="0">
	</form>

	@foreach($categorys as $item)
		{{$item->name}}; <br/>
	@endforeach

@endsection