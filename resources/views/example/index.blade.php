@extends('layout.app')

@section('content')
	<div class="container">
		<div>
			<a class="btn btn-default pull-right" href="{{ route("example.create") }}">
				<i class="fa fa-plus fa-1x"></i>
			</a>
		</div>

		<ul class="list-group">
			@foreach($examples as $example)
				<li class="list-group-item">{{ $example->text }}
					<a class="pull-right" href="{{ route("example.destroy", ["example" => $example->id]) }}">
						<i class="fa fa-trash-o fa-1x"></i>
					</a>
					<a class="pull-right" href="{{ route("example.edit", ["example" => $example->id]) }}">
						<i class="fa fa-pencil fa-1x"></i>
					</a>
					<a class="pull-right" href="{{ route("example.show", ["example" => $example->id]) }}">
						<i class="fa fa-eye fa-1x"></i>
					</a>
				</li>
			@endforeach
		</ul>
	</div>
@endsection