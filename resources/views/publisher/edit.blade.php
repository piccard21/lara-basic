@extends('layouts.app')

@section('content')
	<div class="container">

		<div class="jumbotron jumbo-custom">
			<h1 class="display-4">Publisher </h1>
			<hr>
			<p class="lead">edit</p>
		</div>

		<form method="POST" action="{{route('publisher.update', [ "id" => $publisher->id ] )}}">
			{{ csrf_field() }}
			{{ method_field('PATCH') }}
			<div class="form-group">
				<label for="publisherName">Name</label>
				<input type="text" class="form-control" id="publisherName" name="name" value="{{ $publisher->name  }}">
				<small id="textHelp" class="form-text text-muted">Don't eat the yellow snow</small>
			</div>
			<button type="submit" class="btn btn-primary">Update</button>
		</form>
	</div>
@endsection
