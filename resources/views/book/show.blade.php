@extends('layouts.app')

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
						<th scope="col">ISBN</th>
						<th scope="col">Description</th>
					</tr>
					</thead>
					<tbody>
						<tr>
							<td>{{ $book->authors->implode('lastname', '/')  }}</td>
							<td>{{ $book->publisher->name }}</td>
							<td>{{ $book->published_at }}</td>
							<td>{{ $book->isbn }}</td>
							<td>
								<a class="btn btn-info" href="#" data-description="{{ $book->description }}" data-toggle="modal" data-target="#modal-book-description">
									<i class="fa fa-eye fa-1x"></i>
								</a>

							</td>

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

	@include('partials.book-description')

@endsection


