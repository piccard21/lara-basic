@extends('layouts.app')

@section('content')
	<div class="container">

		<div class="jumbotron jumbo-custom">
			<h1 class="display-4">Example </h1>
			<hr>
			<p class="lead">create</p>
		</div>

		<form method="POST" action="{{route('example.store')}}">
			{{ csrf_field() }}
			<div class="form-group">
				<label for="exampleText">Text</label>
				<input type="text" class="form-control" id="exampleText" placeholder="add text" name="text">
				<small id="textHelp" class="form-text text-muted">Don't eat the yellow snow</small>
			</div>
			<button type="submit" class="btn btn-primary">Add</button>
		</form>
	</div>
@endsection


