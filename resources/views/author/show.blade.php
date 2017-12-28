@extends('layout.app')

@section('content')
	<div class="container">

		<div class="jumbotron jumbo-custom">
			<h1 class="display-4">Author </h1>
			<hr>
			<p class="lead">show</p>
		</div>

		<div class="card" style="width: 20rem;">
			<div class="card-body">
				<h4 class="card-title">Author: {{ $author->id }}</h4>
				<p class="card-text">{{ $author->lastname }}, {{ $author->forename }}</p>
				<a href="{{ route("author.index") }}" class="btn btn-primary">back</a>
			</div>
		</div>
	</div>
@endsection


