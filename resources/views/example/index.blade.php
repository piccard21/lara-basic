@extends('layout.app')

@section('content')
	<div class="container">

		<div class="jumbotron jumbo-custom">
			<h1 class="display-4">Example</h1>
			<hr>
			<p class="lead">A very simple CRUD with only one model</p>
		</div>

		<div class="mb-2">
			<a class="btn btn-success" href="{{ route("example.create") }}">
				<i class="fa fa-plus fa-lg"></i> Add
			</a>
		</div>

		<div>
			<ul class="list-group">
				@foreach($examples as $example)
					<li class="list-group-item">
						<div class="d-flex align-items-center">
                            <span class="mr-auto">
                            {{ $example->text }}
                            </span>
							<span>
                                {{--<a class="btn btn-danger" href="{{ route("example.destroy", ["example" => $example->id]) }}">--}}
								{{--<i class="fa fa-trash-o fa-1x"></i>--}}
								{{--</a>--}}
								<a class="btn btn-warning"
								   href="{{ route("example.edit", ["example" => $example->id]) }}">
                                    <i class="fa fa-pencil fa-1x"></i>
                                </a>
                                <a class="btn btn-info" href="{{ route("example.show", ["example" => $example->id]) }}">
                                    <i class="fa fa-eye fa-1x"></i>
                                </a>
                                <span class="d-inline-block">
                                    <form action="{{ route('example.destroy',  ["example" => $example->id]) }}"
                                          method="POST">
                                        {{ method_field('DELETE') }}
	                                    {{ csrf_field() }}
	                                    <button type="submit" class="btn btn-danger" style="cursor: pointer;"><i
				                                    class="fa fa-trash-o fa-1x"></i></button>
                                    </form>
                                </span>
                            </span>
						</div>
					</li>
				@endforeach
			</ul>
		</div>
		<div class="d-flex justify-content-center mt-2">{{ $examples->links() }}</div>
	</div>


@endsection