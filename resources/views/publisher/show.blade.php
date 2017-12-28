@extends('layout.app')

@section('content')
	<div class="container">

		<div class="jumbotron jumbo-custom">
			<h1 class="display-4">Publisher </h1>
			<hr>
			<p class="lead">show</p>
		</div>

		<div class="card" style="width: 20rem;">
			<div class="card-body">
				<h4 class="card-title">Publisher: {{ $publisher->id }}</h4>
				<p class="card-text">{{ $publisher->text }}</p>
				<a href="{{ route("publisher.index") }}" class="btn btn-primary">back</a>
			</div>
		</div>
	</div>
@endsection


