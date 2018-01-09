@extends('layouts.app')

@section('content')
    <div class="container">

        <div class="jumbotron jumbo-custom">
            <h1 class="display-4">User </h1>
            <hr>
            <p class="lead">show</p>
        </div>

        <div class="card" style="width: 20rem;">
            <div class="card-body">
                <h4 class="card-title">User: {{ $user->name }}</h4>
                <p class="card-text">{{ $user->email }}</p>
                <p class="card-text">{{ $user->created_at }}</p>
                <p class="card-text">{{ $user->roles->pluck('name') }}</p>
                <p class="card-text">{{ $user->roles->pluck('permissions') }}</p>
                <a href="{{ route("user.index") }}" class="btn btn-primary">back</a>
            </div>
        </div>
    </div>
@endsection


