@extends('layout.app')

@section('content')
    <div class="container">

        <div class="jumbotron jumbo-custom">
            <h3 class="display-4">Author</h3>
	        <hr>
            <p class="lead">CRUD with multiple models</p>
	        author ++  book +- publisher
        </div>

        <div class="mb-2">
            <a class="btn btn-success" href="{{ route("author.create") }}">
                <i class="fa fa-plus fa-lg"></i> Add
            </a>
        </div>

        <div>
            <ul class="list-group">
                @foreach($authors as $author)
                    <li class="list-group-item">
                        <div class="d-flex align-items-center">
                            <span class="mr-auto">
                            {{ $author->lastname }},  {{ $author->forename }}
                            </span>
                            <span>
                                <a class="btn btn-warning"
                                   href="{{ route("author.edit", ["author" => $author->id]) }}">
                                    <i class="fa fa-pencil fa-1x"></i>
                                </a>
                                <a class="btn btn-info" href="{{ route("author.show", ["author" => $author->id]) }}">
                                    <i class="fa fa-eye fa-1x"></i>
                                </a>
                                {{--<span class="d-inline-block">--}}
                                    {{--<form action="{{ route('author.destroy',  ["author" => $author->id]) }}"--}}
                                          {{--method="POST">--}}
                                        {{--{{ method_field('DELETE') }}--}}
                                        {{--{{ csrf_field() }}--}}
                                        {{--<button type="submit" class="btn btn-danger" style="cursor: pointer;"><i class="fa fa-trash-o fa-1x"></i></button>--}}
                                    {{--</form>--}}
                                {{--</span>--}}
	                            <a class="btn btn-danger" data-href="{{ route("author.destroy", ["author" => $author->id]) }}" data-toggle="modal" data-target="#modal-confirm-delete">
                                    <i class="fa fa-trash-o fa-1x"></i>
                                </a>
                            </span>
                        </div>
                    </li>
                @endforeach
            </ul>
        </div>
        <div class="d-flex justify-content-center mt-2">{{ $authors->links() }}</div>
    </div>

    @include('partials.confirm-delete')

@endsection