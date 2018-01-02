@extends('layouts.app')

@section('content')
	<div class="container">

		<div class="jumbotron jumbo-custom">
			<h1 class="display-4">Book </h1>
			<hr>
			<p class="lead">edit</p>
		</div>

		<form method="POST" action="{{route('book.update', [ "id" => $book->id ] )}}">
			{{ csrf_field() }}
			{{ method_field('PATCH') }}
			<div class="form-group">
				<label for="bookTitle">Title</label>
				<input type="text" class="form-control" id="bookTitle" value="{{ $book->title }}" name="title">
				<small id="textHelp" class="form-text text-muted">Don't eat the yellow snow</small>
			</div>
			<div class="form-group">
				<label for="bookAuthors">Author(s)</label>
				<select multiple class="form-control" id="bookAuthors" name="authors[]">
					@foreach($authors as $author)
						<option value="{{ $author->id }}" {{ ($book->authors->contains('id', $author->id)) ? 'selected' : '' }}>{{ $author->lastname }}, {{ $author->forename }}</option>
					@endforeach
				</select>
			</div>
			<div class="form-group">
				<label for="bookPublisher">Publisher</label>
				<select class="form-control" id="bookPublisher" name="publisher">
					<option>--select--</option>
					@foreach($publishers as $publisher)
						<option value="{{ $publisher->id }}" {{ ($publisher->id ===$book->publisher_id) ? 'selected' : '' }}>{{ $publisher->name }}</option>
					@endforeach
				</select>
				<small id="textHelp" class="form-text text-muted">Don't eat the yellow snow</small>
			</div>
			<div class="form-group">
				<label for="bookPublishedAt">Published at</label>
				<input type="text" class="form-control" id="bookPublishedAt" value=" {{ str_replace("-", ",",$book->published_at) }}" name="publishedAt">
				<small id="textHelp" class="form-text text-muted">Y,m,d</small>
			</div>
			<div class="form-group">
				<label for="bookDescription">Description</label>
				<textarea class="form-control" id="bookDescription" rows="3" name="description">{{ $book->description }}</textarea>
			</div>
			<div class="form-group">
				<label for="bookPublishedAt">ISBN</label>
				<input type="text" class="form-control" id="bookIsbn" placeholder="add ISBN" name="isbn" value="{{ $book->isbn }}">
				<small id="textHelp" class="form-text text-muted">10 digits</small>
			</div>
			<button type="submit" class="btn btn-primary">Update</button>
		</form>
	</div>
@endsection
