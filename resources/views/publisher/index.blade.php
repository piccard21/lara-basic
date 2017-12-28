@extends('layout.app')

@section('content')
	<div class="container">

		<div class="jumbotron jumbo-custom">
			<h1 class="display-4">Publisher</h1>
			<hr>
			<p class="lead">CRUD with multiple models</p>
			author ++  book +- publisher
		</div>

		<div class="mb-2">
			<a class="btn btn-success" href="{{ route("publisher.create") }}">
				<i class="fa fa-plus fa-lg"></i> Add
			</a>
		</div>

		<div>
			<ul class="list-group">
				@foreach($publishers as $publisher)
					<li class="list-group-item">
						<div class="d-flex align-items-center">
                            <span class="mr-auto">
                            {{ $publisher->name }}
                            </span>
							<span>
								<a class="btn btn-warning"
								   href="{{ route("publisher.edit", ["publisher" => $publisher->id]) }}">
                                    <i class="fa fa-pencil fa-1x"></i>
                                </a>
                                <a class="btn btn-info" href="{{ route("publisher.show", ["publisher" => $publisher->id]) }}">
                                    <i class="fa fa-eye fa-1x"></i>
                                </a>
                                <span class="d-inline-block">
                                    <form action="{{ route('publisher.destroy',  ["publisher" => $publisher->id]) }}"
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
		<div class="d-flex justify-content-center mt-2">{{ $publishers->links() }}</div>
	</div>


@endsection