@extends('layouts.app')

@section('content')
    <div class="container">

        <div class="jumbotron jumbo-custom">
            <h1 class="display-4">Author </h1>
            <hr>
            <p class="lead">show</p>
        </div>

        <div class="row">
            <div class="col-sm">
                <h2>{{ $author->lastname }}, {{ $author->forename }}</h2>
            </div>
        </div>


        <div class="row">
            <div class="col-sm">
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th scope="col">Title</th>
                        <th scope="col">Date</th>
                        <th scope="col">Publisher</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($author->books()->get() as $book)
                        <tr>
                            <td>{{ $book->title }}</td>
                            <td>{{ $book->published_at }}</td>
                            <td>{{ $book->publisher->name }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        <div class="row">
            <div class="col-sm">
                <a href="{{ route("author.index") }}" class="btn btn-primary">back</a>
            </div>
        </div>



    </div>
@endsection


