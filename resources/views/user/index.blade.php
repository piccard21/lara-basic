@extends('layouts.app')

@section('content')
	<div class="container">

		<div class="jumbotron jumbo-custom">
			<h1 class="display-4">User</h1>
			<hr>
			<p class="lead">CRUD with multiple models</p>
			author ++  book +- user
		</div>

		<div class="mb-2">
			<a class="btn btn-success" href="{{ route("user.create") }}">
				<i class="fa fa-plus fa-lg"></i> Add
			</a>
		</div>

		<div>
			<ul class="list-group">
				@foreach($users as $user)
					<li class="list-group-item">
						<div class="d-flex align-items-center">
                            <span class="mr-auto">
                            {{ $user->name }}
                            </span>
							<span>
								<a class="btn btn-warning"
								   href="{{ route("user.edit", ["user" => $user->id]) }}">
                                    <i class="fa fa-pencil fa-1x"></i>
                                </a>
                                <a class="btn btn-info" href="{{ route("user.show", ["user" => $user->id]) }}">
                                    <i class="fa fa-eye fa-1x"></i>
                                </a>
                                {{--<span class="d-inline-block">--}}
                                    {{--<form action="{{ route('user.destroy',  ["user" => $user->id]) }}"--}}
                                          {{--method="POST">--}}
                                        {{--{{ method_field('DELETE') }}--}}
	                                    {{--{{ csrf_field() }}--}}
	                                    {{--<button type="submit" class="btn btn-danger" style="cursor: pointer;"><i--}}
				                                    {{--class="fa fa-trash-o fa-1x"></i></button>--}}
                                    {{--</form>--}}
                                {{--</span>--}}
	                            {{--<a class="btn btn-danger" data-href="{{ route("user.destroy", ["user" => $user->id]) }}" data-toggle="modal" data-target="#modal-confirm-delete">--}}
                                    {{--<i class="fa fa-trash-o fa-1x"></i>--}}
                                {{--</a>--}}
								<a class="btn btn-danger btn-confirm-delete"
								   data-href="{{ route("user.destroy", ["user" => $user->id]) }}">
                                    <i class="fa fa-trash-o fa-1x"></i>
                                </a>
                            </span>
						</div>
					</li>
				@endforeach
			</ul>
		</div>
		<div class="d-flex justify-content-center mt-2">{{ $users->links() }}</div>
	</div>

	{{--@include('partials.confirm-delete')--}}

@endsection