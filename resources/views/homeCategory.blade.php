@extends('layouts.app')

@section('content')
<!-- <div class="container"> -->
	<div class="row justify-content-center">
		<div class="col-md-8">
			@if (session('status'))
			<div class="alert alert-success" role="alert">
				{{ session('status') }}
			</div>
			@endif

			<!-- Please Login to continue. -->

			<div class="container">
				<h2>Category</h2>
				@if(session("message"))
					<p>{{session("message")}}</p>
				@endif
				<div>
					<a href="/category/create"><button class="btn btn-success">Create</button></a>
				</div>

				@foreach($category as $value)
				<a href="/category/{{$value->id}}"><li>{{$value->name}}</li></a>
				<hr>
				@endforeach
			</div>
			{{$category->links()}}
		</div>
	</div>
<!-- </div> -->
@endsection

