# lara-basic

## TODO
- Faker
- Seed
- Auth


## Links

[Markdown](https://github.com/adam-p/markdown-here/wiki/Markdown-Cheatsheet)

[Laravel5 with BS4]([https://medium.com/@tadaspaplauskas/using-bootstrap-4-with-laravel-5-3-8d4efb8b82bf])

 
## Debug Bar
[github](https://github.com/barryvdh/laravel-debugbar) 
 
```
composer require barryvdh/laravel-debugbar --dev
```

* config/app.php
 
```
Barryvdh\Debugbar\ServiceProvider::class,
```

* .env
```
APP_DEBUG=true
```


## Favicon

- create folder *resources/assets/img*
  - add favicon to folder (can be png or something else)
  - add the favicon to the blade-template

``` 
<link rel="shortcut icon" href="{{ asset('img/favicon.ico')  }}">
```
  
  
- inside webpack.mix.js

```
	.copy('resources/assets/img', 'public/img')
```

## BS4

```
npm uninstall bootstrap-sass --save-dev
npm install bootstrap@4.0.0-beta.2 popper.js --save-dev
```

* sass/app.scss
```
@import "node_modules/bootstrap/scss/bootstrap";
```

* js/bootstrap.js:
```
try {
    window.$ = window.jQuery = require('jquery');
    window.Popper = require('popper.js');

    require('bootstrap');
} catch (e) {}
```

* sass/ _variables.scss
```
$font-size-base: 1rem;
```
... or better, uncomment everything




## Layout-View 

* create 
	* **resources/views/layout/app.blade.php** 

### Errors & messages

* in **layout/app.blade.php**

```
<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- CSRF Token -->
	<meta name="csrf-token" content="{{ csrf_token() }}">

	<title>{{ config('app.name', 'Bello') }}</title>

	<!-- Styles -->
	<link rel="shortcut icon" href="{{ asset('img/favicon.png')  }}">
	<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"
	      integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
	<link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
<!-- main -->
<div id="app">
	<!-- navigation -->
	@include('layouts.nav')

	<!-- flash-messages -->
	@include('layouts.message')

	<!-- errors -->
	@include('layouts.errors')

	<!-- content -->
	@yield('content')
</div>

<!-- Scripts -->
<script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
```

* layout/errors.blade.php

```
@if(count($errors))
    <div class="container">
        <div class="row">
            <div class="col">
                <ul class="list-group">
                    @foreach ($errors->all() as $error)
                        <li class="list-group-item list-group-item-danger">{{$error}}</li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
@endif
```
* layout/message.blade.php

```
@if ($flash = session('message'))
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="alert alert-success" role="alert">
                    {{ $flash }}
                </div>
            </div>
        </div>
    </div>
@endif
```

* layout/nav.blade.php
	* copy from [getbootstrap.com](https://getbootstrap.com/docs/4.0/components/navbar/)


### test layout-view with example controller

* create Example-Controller
```
php artisan make:controller ExampleController -r
``` 

* open it and add to index()

```
 return view( 'example.index');
``` 

* create example-view **views/example/index.blade.php**

	* add BS4-code
	
```
@extends('layout.app')

@section('content')
	<div class="container">
		<div class="card" style="width: 20rem;">
			<div class="card-body">
				<h4 class="card-title">Card title</h4>
				<h6 class="card-subtitle mb-2 text-muted">Card subtitle</h6>
				<p class="card-text">Some quick example text to build on the card title and make up the bulk of the
					card's content.</p>
				<a href="#" class="card-link">Card link</a>
				<a href="#" class="card-link">Another link</a>
			</div>
		</div>
	</div>
@endsection
```

* set route in **routes/web.php**

```
Route::get('/example', 'ExampleController@index')->name('example');
```

*  open route  [http://127.0.0.1:8000/example/](http://127.0.0.1:8000/example/)


