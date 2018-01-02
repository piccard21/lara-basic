@extends('layouts.app')

@section('content')
    <div class="container">

        <div class="jumbotron jumbo-custom">
            <h1 class="display-4">Publisher </h1>
            <hr>
            <p class="lead">show</p>
        </div>

        <div class="row">
            <div class="col-sm">
                <h2>{{ $publisher->name }}</h2>
            </div>
        </div>


        <div class="row">
            <div class="col-sm">
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th scope="col">Book</th>
                        <th scope="col">Author</th>
                        <th scope="col">Date</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($publisher->books()->get() as $book)
                        <tr>
                            <td>{{ $book->title }}</td>
                            <td>{{ $book->authors->implode('lastname', '/')  }}</td>
                            <td>{{ $book->published_at }}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        <div class="row">
            <div class="col-sm">
                <a href="{{ route("publisher.index") }}" class="btn btn-primary">back</a>
            </div>
        </div>
    </div>
@endsection


