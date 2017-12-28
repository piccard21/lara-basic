@extends('layout.app')

@section('content')
	<div class="container">

		<div class="jumbotron jumbo-custom">
			<h1 class="display-4">Book </h1>
			<hr>
			<p class="lead">show</p>
		</div>

		<div class="card" style="width: 20rem;">
			<div class="card-body">
				<h4 class="card-title">Book: {{ $book->title }}</h4>
				<p class="card-text">Publisher: {{ $book->publisher->name }}</p>
				<p class="card-text">Published at: {{ $book->published_at }}</p>
				<a href="{{ route("book.index") }}" class="btn btn-primary">back</a>
			</div>
		</div>
	</div>
@endsection


