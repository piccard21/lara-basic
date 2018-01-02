@extends('layouts.app')

@section('content')
	<div class="container">

		<div class="jumbotron jumbo-custom">
			<h1 class="display-4">Author </h1>
			<hr>
			<p class="lead">edit</p>
		</div>

		<form method="POST" action="{{route('author.update', [ "id" => $author->id ] )}}">
			{{ csrf_field() }}
			{{ method_field('PATCH') }}
			<div class="form-group">
				<label for="lastname">Lastname</label>
				<input type="text" class="form-control" id="lastname" value="{{ $author->lastname  }}" name="lastname">
				<small id="textHelp" class="form-text text-muted">Don't eat the yellow snow</small>
			</div>
			<div class="form-group">
				<label for="forename">Forename</label>
				<input type="text" class="form-control" id="forename" value="{{ $author->forename  }}" name="forename">
				<small id="textHelp" class="form-text text-muted">Don't eat the yellow snow</small>
			</div>


			<button type="submit" class="btn btn-primary">Update</button>
		</form>
	</div>
@endsection
