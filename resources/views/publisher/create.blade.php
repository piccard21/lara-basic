@extends('layout.app')

@section('content')
	<div class="container">

		<div class="jumbotron jumbo-custom">
			<h1 class="display-4">Publisher </h1>
			<hr>
			<p class="lead">create</p>
		</div>

		<form method="POST" action="{{route('publisher.store')}}">
			{{ csrf_field() }}
			<div class="form-group">
				<label for="publisherName">Name</label>
				<input type="text" class="form-control" id="publisherName" placeholder="add name" name="name">
				<small id="textHelp" class="form-text text-muted">Don't eat the yellow snow</small>
			</div>
			<button type="submit" class="btn btn-primary">Add</button>
		</form>
	</div>
@endsection


