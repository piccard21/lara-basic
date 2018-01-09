@extends('layouts.app')

@section('content')
	<div class="container">

		<div class="jumbotron jumbo-custom">
			<h1 class="display-4">User </h1>
			<hr>
			<p class="lead">edit</p>
		</div>

		<form method="POST" action="{{route('user.update', [ "id" => $user->id ] )}}">
			{{ csrf_field() }}
			{{ method_field('PATCH') }}
			<div class="form-group">
				<label for="userTitle">Name</label>
				<input type="text" class="form-control" id="userTitle" value="{{ $user->name }}" name="name" value="{{ old('name') }}">
				<small id="textHelp" class="form-text text-muted">Don't eat the yellow snow</small>
			</div>
			<div class="form-group">
				<label for="userName">Email</label>
				<input type="text" class="form-control" id="userName" placeholder="add email" name="email" value="{{ old('email') }}">
				<small id="textHelp" class="form-text text-muted">Don't eat the yellow snow</small>
			</div>
			<div class="form-group">
				<label for="userName">Password</label>
				<input type="password" class="form-control" placeholder="add password" name="password">
				<small id="textHelp" class="form-text text-muted">Don't eat the yellow snow</small>
			</div>
			<div class="form-group">
				<label for="userAuthors">Role(s)</label>
				<select multiple class="form-control" name="roles[]">
					@foreach($roles as $role)
						<option value="{{ $role->id }}" {{ ($user->roles->contains('id', $role->id)) ? 'selected' : '' }}>{{ $role->name }}</option>
					@endforeach
				</select>
			</div>
			<button type="submit" class="btn btn-primary">Update</button>
		</form>
	</div>
@endsection
