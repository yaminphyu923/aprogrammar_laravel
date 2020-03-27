@extends('layouts.app')

@section("content")
<div class="container">
	<h2>Add New Category</h2>

	@if ($errors->any())
	    <div class="alert alert-danger">
	        <ul>
	            @foreach ($errors->all() as $error)
	                <li>{{ $error }}</li>
	            @endforeach
	        </ul>
	    </div>
	@endif

	<form method="post" action="/category">
		{{ csrf_field()}}
		<div class="form-group">
			<label for="name">Category Name</label>
			<input type="text" name="name" class="form-control" id="name" value="{{old('name')}}" required>
		</div>
		<div class="form-group">
			<label for="description">Description</label>
			<input type="text" name="description" class="form-control" id="description" value="{{old('description')}}" required>
		</div>
		<button type="submit" class="btn btn-primary">Submit</button>
	</form>
</div>

@endsection