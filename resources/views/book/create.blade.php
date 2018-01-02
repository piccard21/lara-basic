@extends('layouts.app')

@section('content')
	<div class="container">

		<div class="jumbotron jumbo-custom">
			<h1 class="display-4">Book </h1>
			<hr>
			<p class="lead">create</p>
		</div>

		<form method="POST" action="{{route('book.store')}}">
			{{ csrf_field() }}
			<div class="form-group">
				<label for="bookTitle">Title</label>
				<input type="text" class="form-control" id="bookTitle" placeholder="add title" name="title" value="{{ old('title') }}">
				<small id="textHelp" class="form-text text-muted">Don't eat the yellow snow</small>
			</div>
			<div class="form-group">
				<label for="bookAuthors">Author(s)</label>
				<select multiple class="form-control" id="bookAuthors" name="authors[]">
					@foreach($authors as $author)
						<option value="{{ $author->id }}">{{ $author->lastname }}, {{ $author->forename }}</option>
					@endforeach
				</select>
			</div>
			<div class="form-group">
				<label for="bookPublisher">Publisher</label>
				<select class="form-control" id="bookPublisher" name="publisher">
					<option>--select--</option>
					@foreach($publishers as $publisher)
						<option value="{{ $publisher->id }}">{{ $publisher->name }}</option>
					@endforeach
				</select>
				<small id="textHelp" class="form-text text-muted">Don't eat the yellow snow</small>
			</div>
			<div class="form-group">
				<label for="bookPublishedAt">Published at</label>
				<input type="text" class="form-control" id="bookPublishedAt" placeholder="add date" name="publishedAt" value="{{ old('publishedAt') }}">
				<small id="textHelp" class="form-text text-muted">Y,m,d</small>
			</div>
			<div class="form-group">
				<label for="bookDescription">Description</label>
				<textarea class="form-control" id="bookDescription" rows="3" name="description"></textarea>
			</div>
			<div class="form-group">
				<label for="bookPublishedAt">ISBN</label>
				<input type="text" class="form-control" id="bookIsbn" placeholder="add ISBN" name="isbn" value="{{ old('isbn') }}">
				<small id="textHelp" class="form-text text-muted">10 digits</small>
			</div>
			<button type="submit" class="btn btn-primary">Add</button>
		</form>
	</div>
@endsection


