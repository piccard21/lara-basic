@extends('layout.app')

@section('content')
    <div class="container">
        <div class="text-right mb-2">
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
                                <a class="btn btn-danger" href="{{ route("example.destroy", ["example" => $example->id]) }}">
                                    <i class="fa fa-trash-o fa-1x"></i>
                                </a>
                                <a class="btn btn-warning" href="{{ route("example.edit", ["example" => $example->id]) }}">
                                    <i class="fa fa-pencil fa-1x"></i>
                                </a>
                                <a class="btn btn-info" href="{{ route("example.show", ["example" => $example->id]) }}">
                                    <i class="fa fa-eye fa-1x"></i>
                                </a>
                            </span>
                        </div>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
@endsection