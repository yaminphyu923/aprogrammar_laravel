@extends('layout')

@section("content")
<div class="container">
	<h2>Add New Receipe</h2>

	@if ($errors->any())
	    <div class="alert alert-danger">
	        <ul>
	            @foreach ($errors->all() as $error)
	                <li>{{ $error }}</li>
	            @endforeach
	        </ul>
	    </div>
	@endif

	<form method="post" action="/receipe">
		{{ csrf_field()}}
		<div class="form-group">
			<label for="name">Receipe Name</label>
			<input type="text" name="name" class="form-control" id="name" value="{{old('name')}}" required>
		</div>
		<div class="form-group">
			<label for="ingredients">Ingredient</label>
			<input type="text" name="ingredients" class="form-control" id="ingredients" value="{{old('ingredients')}}" required>
		</div>
		<div class="form-group">
			<label for="category">Category</label>
			<input type="text" name="category" class="form-control" id="category" value="{{old('category')}}" required>
		</div>
		<button type="submit" class="btn btn-primary">Submit</button>
	</form>
</div>

@endsection