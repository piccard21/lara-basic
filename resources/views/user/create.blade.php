@extends('layouts.app')

@section('content')
	<div class="container">

		<div class="jumbotron jumbo-custom">
			<h1 class="display-4">User</h1>
			<hr>
			<p class="lead">create</p>
		</div>

		<form method="POST" action="{{route('user.store')}}">
			{{ csrf_field() }}
			<div class="form-group">
				<label for="userName">Name</label>
				<input type="text" class="form-control" id="userName" placeholder="add name" name="name" value="{{ old('name') }}">
				<small id="textHelp" class="form-text text-muted">Don't eat the yellow snow</small>
			</div>
			<div class="form-group">
				<label for="userName">Email</label>
				<input type="text" class="form-control" id="userName" placeholder="add email" name="email" value="{{ old('email') }}">
				<small id="textHelp" class="form-text text-muted">Don't eat the yellow snow</small>
			</div>
			<div class="form-group">
				<label for="userName">Password</label>
				<input type="password" class="form-control"  placeholder="add password" name="password">
				<small id="textHelp" class="form-text text-muted">Don't eat the yellow snow</small>
			</div>
			<div class="form-group{{ $errors->has('role') ? ' has-error' : '' }}">
				<label for="role" class="control-label">Role</label>

					<select id="role" class="form-control" name="roles[]" required>
						@foreach($roles as $role)
							<option value="{{$role->id}}">{{$role->name}}</option>
						@endforeach
					</select>

					@if ($errors->has('role'))
						<span class="help-block">
							<strong>{{ $errors->first('role') }}</strong>
						</span>
					@endif
			</div>
			<button type="submit" class="btn btn-primary">Add</button>
		</form>
	</div>
@endsection


