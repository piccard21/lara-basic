@extends('layouts.app')

@section('content')
    {{--<div style="min-height: 100vh; background: oldlace;" class="d-flex align-items-center justify-content-center flex-column">--}}

    <div class="container">
        <div style="min-height: 100vh; background: oldlace;" class="d-flex align-items-center justify-content-center flex-column">

            @yield('http-error')

            <a href="{{ url()->previous() }}" class="btn btn-info">back</a>
        </div>
    </div>
@endsection
