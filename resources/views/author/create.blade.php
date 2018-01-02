@extends('layout.app')

@section('content')
	<div class="container">

		<div class="jumbotron jumbo-custom">
			<h1 class="display-4">Author </h1>
			<hr>
			<p class="lead">create</p>
		</div>

		<form method="POST" action="{{route('author.store')}}">
			{{ csrf_field() }}
			<div class="form-group">
				<label for="lastname">Lastname</label>
				<input type="text" class="form-control" id="lastname" placeholder="add lastname" name="lastname" value="{{ old('lastname') }}">
				<small id="textHelp" class="form-text text-muted">Don't eat the yellow snow</small>
			</div>
			<div class="form-group">
				<label for="forename">Forename</label>
				<input type="text" class="form-control" id="forename" placeholder="add forename" name="forename" value="{{ old('forename') }}">
				<small id="textHelp" class="form-text text-muted">Don't eat the yellow snow</small>
			</div>
			<button type="submit" class="btn btn-primary">Add</button>
		</form>
	</div>
@endsection


