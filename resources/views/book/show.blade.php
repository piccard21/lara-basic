@extends('layout.app')

@section('content')
	<div class="container">

		<div class="jumbotron jumbo-custom">
			<h1 class="display-4">Book </h1>
			<hr>
			<p class="lead">show</p>
		</div>

		<div class="row">
			<div class="col-sm">
				<h2>{{ $book->title }}</h2>
			</div>
		</div>


		<div class="row">
			<div class="col-sm">
				<table class="table table-striped">
					<thead>
					<tr>
						<th scope="col">Author</th>
						<th scope="col">Publisher</th>
						<th scope="col">Date</th>
					</tr>
					</thead>
					<tbody>
						<tr>
							<td>{{ $book->authors->implode('lastname', '/')  }}</td>
							<td>{{ $book->publisher->name }}</td>
							<td>{{ $book->published_at }}</td>
						</tr>
					</tbody>
				</table>
			</div>
		</div>

		<div class="row">
			<div class="col-sm">
				<a href="{{ route("book.index") }}" class="btn btn-primary">back</a>
			</div>
		</div>
	</div>
@endsection


