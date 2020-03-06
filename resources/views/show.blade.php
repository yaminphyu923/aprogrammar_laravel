@extends('layout')

@section("content")
<div class="container"> 
	<h2>{{$receipe->name}}</h2>

	<li>Ingredients - {{$receipe->ingredients}}</li>
	<li>Category - {{$receipe->category}}</li>

	<a href="/receipe/{{$receipe->id}}/edit"><button class="btn btn-success">Edit</button></a>

	<form method="post" action="/receipe/{{$receipe->id}}">
		{{ method_field("DELETE") }}
		{{ csrf_field()}}
		<button type="submit" class="btn btn-primary">Delete</button>
	</form>
</div>

@endsection