@extends('layout.app')

@section('content')
	<div class="container">
		<form method="POST" action="{{route('example.update', [ "id" => $example->id ] )}}">
			{{ csrf_field() }}
			{{ method_field('PATCH') }}
			<div class="form-group">
				<label for="exampleText">Text</label>
				<input type="text" class="form-control" id="exampleText" name="text" value="{{ $example->text  }}">
				<small id="textHelp" class="form-text text-muted">Don't eat the yellow snow</small>
			</div>
			<button type="submit" class="btn btn-primary">Update</button>
		</form>
	</div>
@endsection
