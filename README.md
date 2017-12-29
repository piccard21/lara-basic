# lara-basic

## Links

- [Markdown](https://github.com/adam-p/markdown-here/wiki/Markdown-Cheatsheet)
- [Laravel - Helpers](https://laravel.com/docs/5.5/helpers)
- [faker](https://github.com/fzaninotto/Faker)
 
 
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

- sass/app.scss
```
@import "node_modules/bootstrap/scss/bootstrap";
```

- js/bootstrap.js:
```
try {
    window.$ = window.jQuery = require('jquery');
    window.Popper = require('popper.js');

    require('bootstrap');
} catch (e) {}
```

- sass/ _variables.scss
```
$font-size-base: 1rem;
```
... or just uncomment everything



## Layout-View 

- create 
	* **resources/views/layout/app.blade.php** 

### Main skeleton

- in **layout/app.blade.php**

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

### Errors & messages
- layout/errors.blade.php

```
@if(count($errors))
    <div class="container">
        <div class="row">
            <div class="col">
				<ul class="list-group mt-2 mb-2">
                    @foreach ($errors->all() as $error)
                        <li class="list-group-item list-group-item-danger">{{$error}}</li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
@endif
```
- layout/message.blade.php

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

- layout/nav.blade.php 
```
<nav class="navbar navbar-expand-lg navbar-light bg-light">
	<a class="navbar-brand" href="{{ route("home") }}">Laravel Basic</a>
	<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
		<span class="navbar-toggler-icon"></span>
	</button>

	<div class="collapse navbar-collapse" id="navbarSupportedContent">
		<ul class="navbar-nav mr-auto">
			<li class="nav-item active">
				<a class="nav-link" href="{{ route("example.index") }}">Example</a>
			</li> 
		</ul>
	</div>
</nav>
```

### Layout-view with example controller

- create Example-Controller
``` 
php artisan make:controller ExampleController -r
``` 

- you can also create the model inside the command as well:
``` 
php artisan make:controller ExampleController -r -m Example
``` 

- open it and add to *index()*

```
 return view( 'example.index');
``` 

- create example-view **views/example/index.blade.php**

	- add BS4-code
	
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

- set route in **routes/web.php**

```
Route::get('/example', 'ExampleController@index')->name('example');
```

-  open route  [http://127.0.0.1:8000/example/](http://127.0.0.1:8000/example/)


## CRUD with a single model

### Route

- the easiest way is to create a resourceful route
- **routes/web.php**

```
Route::resource('/example', 'ExampleController');
```

- check routes

```
php artisan route:list
```

### Migration

- if you didn't use **-m** when the controller was created, create a model now
	- with the **-m** option you get the migration file as well

```
php artisan make:model Example -m
```

- otherwise create the migration-file:

```
php artisan make:migration create_examples_table
```

- open **database/migrations/*create_examples_table.php**
                                                        
```
Schema::create('examples', function (Blueprint $table) {
    $table->increments('id');
    $table->string('text');
    $table->timestamps();
});
```

- add DB-credentials to **.env**
- run migration

```
php artisan migrate
```


### Model

- open *app/Example.php* and make *text* fillable
                                                        
```
class Example extends Model {
	protected $fillable = ['text'];
}                                                       
```
#### Seeder                     

- create a seeder
                         
```
php artisan make:seeder ExamplesTableSeeder                                              
```

- you will find the seeder in *database/seeds*

##### single seed

```
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ExamplesTableSeeder extends Seeder {
	public function run() {
		DB::table('examples')->insert([
			'text' => str_random(121)
		]);
	}
}
```
- run it:

```
php artisan db:seed --class=ExamplesTableSeeder
```

- ... or open *seeds/DatabaseSeeder.php* and add our seeder 

```
public function run()
{
    // $this->call(UsersTableSeeder::class);
    $this->call(ExamplesTableSeeder::class);
}
```

```
php artisan db:seed
```


##### multiple seeds using faker

- to add more than one row you can use a [faker](https://github.com/fzaninotto/Faker)
- change seeder to:

```
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Example;
use Faker\Factory as Faker;

class ExamplesTableSeeder extends Seeder { 
	public function run() { 
		$faker = Faker::create();
		foreach(range(1, 10) as $index) {
			DB::table('examples')->insert([
				'text' => $faker->sentence(7)
			]);
		}
	}
}
```

```
php artisan db:seed
```


### View

#### index

- *example/index.blade.php*

```
@extends('layout.app')

@section('content')
	<div class="container">

		<div class="jumbotron jumbo-custom">
			<h3 class="display-4">Example</h3>
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
``` 

#### create

- *example/create.blade.php*

```
@extends('layout.app')

@section('content')
	<div class="container">

		<div class="jumbotron jumbo-custom">
			<h1 class="display-4">Example </h1>
			<hr>
			<p class="lead">create</p>
		</div>

		<form method="POST" action="{{route('example.store')}}">
			{{ csrf_field() }}
			<div class="form-group">
				<label for="exampleText">Text</label>
				<input type="text" class="form-control" id="exampleText" placeholder="add text" name="text">
				<small id="textHelp" class="form-text text-muted">Don't eat the yellow snow</small>
			</div>
			<button type="submit" class="btn btn-primary">Add</button>
		</form>
	</div>
@endsection
```


#### edit

- *example/edit.blade.php*

```
@extends('layout.app')

@section('content')
	<div class="container">

		<div class="jumbotron jumbo-custom">
			<h1 class="display-4">Example </h1>
			<hr>
			<p class="lead">edit</p>
		</div>

		<form>
			<div class="form-group">
				<label for="exampleText">Text</label>
				<input type="text" class="form-control" id="exampleText" value="{{ $example->text  }}">
				<small id="textHelp" class="form-text text-muted">Don't eat the yellow snow</small>
			</div>
			<button type="submit" class="btn btn-primary">Update</button>
		</form>
	</div>
@endsection
```


#### show

- *example/show.blade.php*

```
@extends('layout.app')

@section('content')
	<div class="container">

		<div class="jumbotron jumbo-custom">
			<h1 class="display-4">Example </h1>
			<hr>
			<p class="lead">show</p>
		</div>
		
		<div class="card" style="width: 20rem;">
			<div class="card-body">
				<h4 class="card-title">Example: {{ $example->id }}</h4>
				<p class="card-text">{{ $example->text }}</p>
				<a href="{{ route("example.index") }}" class="btn btn-primary">back</a>
			</div>
		</div>
	</div>
@endsection
``` 



### Controller

#### index
```
public function index()
{
	$examples = Example::all(); 
//	return view( 'example.index', compact( 'examples' ) );
    return view( 'example.index')->with('examples', $examples);
}
```

#### create
```
public function create()
{
    return view( 'example.create' );
}
```

#### edit
```
public function edit(Request $request, Example $example) {
	return view('example.edit')->with([
		'example' => $example
	]);
}
```


#### show
```
public function show(Request $request, Example $example) {
	return view('example.show')->with([
		'example' => $example
	]);
}
```

#### store
```
public function store(Request $request) {
	$this->validate( $request, [
		'text' => 'required|min:1|max:121',
	] );
	
	Example::create( [
		'text'    => $request->input( 'text' )
	] );
	
	return redirect()->route( 'example.index' )->with( 'message', 'Text created successfully' );
}
```

#### update
``` 
public function update(Request $request, Example $example) {
    $this->validate( $request, [
        'text' => 'required|min:1|max:121'
    ] );
    
    $example->text = $request->input( 'text' );
	$example->save();
    
	return redirect()->route( 'example.index' )->with( 'message', 'Text updated successfully' );
}
```


#### delete

``` 	
public function destroy(Request $request, Example $example) { 
		$example->delete();
        return redirect()->route( 'example.index' )->with( 'message', 'Example deleted successfully' );
}
```



## Pagination with BS4


- **ExampleController**

``` 	
//		$examples = Example::all(); 
	    $examples = Example::orderBy('text', 'asc')->paginate(10);
``` 
	
- **bootstrap/app.php**

```
/* BS-4 pagination*/
Illuminate\Pagination\AbstractPaginator::defaultView("pagination::bootstrap-4");
Illuminate\Pagination\AbstractPaginator::defaultSimpleView("pagination::simple-bootstrap-4");
```
	

- **views/example/index.blade.php**

``` 	
<div class="d-flex justify-content-center mt-2">{{ $examples->links() }}</div>
``` 
   	

## CRUD with multiple models

- author ++  book +- publisher 

### move models to app/Models

- create **app/Models/**
- **composer.json**

```     
"autoload": {
    "classmap": [
        ...
        "app/Models"
    ],
``` 


###  Controllers, Models & Migrations

#### Long way
```      
php artisan make:controller AuthorController -r
php artisan make:controller BookController -r
php artisan make:controller PublisherController -r
 
php artisan make:model Author -m
php artisan make:model Book -m
php artisan make:model Publisher -m

php artisan make:factory -m Author AuthorFactory
php artisan make:factory -m Book BookFactory
php artisan make:factory -m Publisher PublisherFactory
```      

#### Short way
- Generate a migration, factory, and resource controller for the model

```      
php artisan make:model Author -a
php artisan make:model Book -a
php artisan make:model Publisher -a
```      

- move the 3 models into **app/Models**

### Prepare Models & Tables 

- example: *Author*
 
- **author-migration**
```
public function up()
{
    Schema::create('authors', function (Blueprint $table) {
        $table->increments('id');
        $table->string('lastname');
        $table->string('forename');
        $table->timestamps();
    });
}      
```      
- author-model
```    
class Author extends Model
{
	protected $fillable = ['lastname','forename'];
}
``` 
- edit author-factory 
```    
$factory->define(App\Author::class, function (Faker $faker) {
    return [
	    'lastname' => $faker->lastName,
	    'forename' => $faker->firstName,
    ];
});
```    
   
- create seeder   
```    
php artisan make:seeder AuthorsTableSeeder 
```    
 
```    
public function run()
{ 
	    factory(App\Author::class, 50)->create();
}
```    


- add seeder to **seeds/DatabaseSeeder.php**

```    
$this->call(AuthorsTableSeeder::class);
```    

- seed
```    
composer dump-autoload
php artisan db:seed
```    


### View & Controller 

- copy **example/index.blade.php** to **author/index.blade.php** & replace example-variable
- copy index() from example

### set route

```    
Route::resource( '/author', 'AuthorController' ); 
```    

- [goto](http://127.0.0.1:8000/author) author.index to test if everything worked
- ok ... so let's rollback

```    
php artisan migrate:rollback 
```    

#### other migration-files
- repeat the same with the other models

- book

```
public function up()
{
    Schema::create('books', function (Blueprint $table) {
        $table->increments('id');
        $table->string('title');
        $table->date('published_at');
        $table->integer('publisher_id')->unsigned();
        $table->foreign('publisher_id')->references('id')->on('publishers')->onDelete('cascade');
        $table->timestamps();
    });
}    
```    

- publisher
```    
public function up()
{
    Schema::create('publishers', function (Blueprint $table) {
        $table->increments('id');
        $table->string('name');
        $table->timestamps();
    });
}
```    

- author_book
```    
php artisan make:migration create_author_book --create=author_book
```    

```    
public $timestamps = false;
		
public function up() {
    Schema::create('author_book', function(Blueprint $table) {
        $table->integer('author_id')->unsigned()->index();
        $table->integer('book_id')->unsigned()->index();

        $table->primary(['author_id', 'book_id']);

        $table->foreign('author_id')->references('id')->on('authors')->onDelete('cascade');
        $table->foreign('book_id')->references('id')->on('books')->onDelete('cascade');
    });
}	
```    
 


## create relationships

### models
- author
```  
class Author extends Model
 {
    protected $fillable = ['lastname','forename'];
    
    public function books()
    {
        return $this->belongsToMany('App\Book');
    }
    
 }

```  


- book
```  
class Book extends Model {
	
	protected $fillable = ['title', 'published_at', 'publisher_id'];
	
	public function publisher() {
		return $this->belongsTo('App\Publisher');
	}
	
	public function authors() {
		return $this->belongsToMany('App\Author');
	}
}
```  
 
- publisher 
```  
class Publisher extends Model {
	protected $fillable = ['name'];
	
	public function books() {
		return $this->hasMany('App\Book');
	}
}
```  


### factories
```  
php artisan make:seeder BooksTableSeeder 
php artisan make:seeder PublishersTableSeeder 
```  
- Book
```   
$factory->define(App\Book::class, function (Faker $faker) {
    return [
	    'title' => $faker->sentence,
	    'published_at' =>  $faker->date('Y,m,d'), 
    ];
});
```   

- Author
```   

$factory->define(App\Author::class, function (Faker $faker) {
    return [
	    'lastname' => $faker->lastName,
	    'forename' => $faker->firstName,
    ];
});
```   

- Publisher
```    
$factory->define(App\Publisher::class, function (Faker $faker) {
    return [
	    'name' => $faker->company
    ];
});
```   


### seeders
```  
php artisan make:seeder BooksTableSeeder 
php artisan make:seeder PublishersTableSeeder 
```  

- Books
```  
public function run() {
    $authors = Author::all();

    foreach ( Book::all() as $book ) {
        $collectionAuthors = collect();
        foreach ( ( range( 1, 3 ) ) as $i ) {

            $currentAuthor = $authors->random();

            if ( ! $collectionAuthors->contains( $currentAuthor->id ) ) {
                DB::table( 'author_book' )->insert(
                    [
                        'book_id'   => $book->id,
                        'author_id' => $currentAuthor->id
                    ]
                );
                $collectionAuthors->push( $currentAuthor->id );
            } else {
                continue;
            }
        }
    }

}
```  

- Publisher
```   	
public function run() {
    factory(App\Publisher::class, 5)->create()->each(function($p) {
        for($i = 0; $i < rand(1,5); $i++) {
            $p->books()->save(factory(App\Book::class)->make());
        }
    });
}
```  

- Authors 
```   	
public function run() {
		factory(App\Author::class, 5)->create();
}
```  


- empty DB, migrate & seed 
```  
php artisan migrate:refresh --seed
```  

### View & Controller 

- copy & paste views & controller-methods from example 
- adjust formfields, names & controller 
- also set routes


## Add Transactions

- i.e. in **BookController** 
 
```   
use Illuminate\Support\Facades\DB;

...

public function store( Request $request ) {
    $this->validate( $request, [
        'title'       => 'required|min:1|max:121',
        'publisher'   => 'required|integer',
        'publishedAt' => 'required|date_format:"Y,m,d"',
        'authors.*'   => 'required|integer',
    ] );

    DB::transaction( function () use ($request) { 
        $book = Book::create( [
            'title'        => $request->input( 'title' ),
            'publisher_id' => $request->input( 'publisher' ),
            'published_at' => $request->input( 'publishedAt' )
        ] );

        $book->authors()->attach( $request->input( 'authors' ) );
    });
    
    return redirect()->route( 'book.index' )->with( 'message', 'Book created successfully' );
}
```    



## Sticky Forms


- use helper **old('input-field-name', 'default-value')**
```   
<input type="text" class="form-control" id="bookTitle" placeholder="add title" name="title" value="{{ old('title') }}">
```    



## AJAX

- Laravel likes ES6, so we use it
- Loading-mask, i.e. [busy-load](https://www.npmjs.com/package/busy-load) 
- Notifier-library, i.e. [iziToast](http://izitoast.marcelodolce.com/)
- create ES6-utils-module

- **layout/app.blade.php**
	- for sake of simplicity, the loading-mask will be added via cdn
	- the notifier will be installed via npm
	
```   
npm install izitoast --save-dev
```   

- add an entry to **webpack.mix.js**

```   
mix.js('resources/assets/js/app.js', 'public/js')
	.copy('resources/assets/img', 'public/img')
	.copyDirectory('node_modules/izitoast/dist/', 'public/js/izitoast')
	.sass('resources/assets/sass/app.scss', 'public/css');
```  

- add the stuff to **app.blade**

```   
{{--loading-mask--}}
<link href="https://cdn.jsdelivr.net/npm/busy-load/dist/app.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/busy-load/dist/app.min.js"></script>

{{--notifier--}}
<link href="js/izitoast/css/iziToast.min.css" rel="stylesheet">
<script src="js/izitoast/js/iziToast.min.js" type="text/javascript"></script>
```   




### Exception-Handling for Ajax

- **app/Exceptions/Handler.php**

```   
public function render($request, Exception $exception)
{
    // exception while ajax
    if($request->ajax() || $request->wantsJson()) {
	    $msg = !empty($exception->getMessage()) ? $exception->getMessage() : get_class($exception);
	    $response = array(
		    'success' => false,
		    'message' => $msg
	    );
	    $status = 200;
	    return response()->json($response, $status);
    }

    return parent::render($request, $exception);
}
```     


### create js

- create folder **js/lib**
- **app.js**

```
require('./bootstrap');

import {tools_utils} from './lib/utils.js';
import {tools_modal} from './lib/modal.js';


$(document).ready(function () {
	tools_utils.init();
	tools_modal.init();
});     
```     


- **lib/utils.js**

``` 
export const tools_utils = {

	init: function () {
		iziToast.settings({
			timeout: 5000,
			transitionIn: 'flipInX',
			transitionOut: 'flipOutX',
			position: 'topRight'
		});

		this.addCsrf();
	},
	addCsrf: function () {
		$.ajaxSetup({
			headers: {
				'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			}
		});
	},
	notfiySuccess: function (message, callback) {
		iziToast.success({
			message: message,
			onClosing: function () {
				callback();
			}
		});
	},
	notfiyWarning: function (message, callback) {
		iziToast.warning({
			message: message,
			onClosing: function () {
				callback();
			}
		});
	},
	notfiyError: function (message, callback) {
		iziToast.error({
			message: message,
			onClosing: function () {
				callback();
			}
		});
	},
	notfiyInfo: function (message, callback) {
		iziToast.info({
			message: message,
			onClosing: function () {
				callback();
			}
		});
	},
	handleResult: function (result, callback) {
		if (this.isUndefined(callback)) {
			callback = this.emptyFn();
		}

		if (result.success) {
			if (result && result.message) {
				tools_utils.notfiySuccess(result.message, callback);
			}
		} else {
			tools_utils.notfiyError(result.message, this.emptyFn());
		}
	},
	isUndefined: function (val) {
		return typeof val === 'undefined' ? true : false;
	},
	emptyFn: function () {},
	reload: function () {
		location.reload(true);
	}

}
```    


- **lib/modal.js**

``` 
import {tools_utils} from './utils.js';

export const tools_modal = {
	init: function () {

		$('#modal-confirm-delete').on('shown.bs.modal', function (e) {

			$(this).find('#btn-confirm-delete-ok').on('click', function () {

				$(".modal-content").busyLoad("show");

				$.ajax({
					url: $(e.relatedTarget).data('href'),
					data: {_method: "DELETE"},
					type: "DELETE",
					dataType: "json",
					success: function (result) {

						$(".modal-content").busyLoad("hide");
						$('#modal-confirm-delete').modal('hide');

						tools_utils.handleResult(result, tools_utils.reload);
					},
					error: function (xhr, textStatus, thrownError) {
						tools_utils.notfiyError(textStatus + '<br>' + thrownError);
					}
				});

			});
		});
	}
}
```     


### exchange delete-form in Example 

- uncomment *form* in **example/index.blade.php**
- add

```   
<a class="btn btn-danger" data-href="{{ route("example.destroy", ["example" => $example->id]) }}" data-toggle="modal" data-target="#modal-confirm-delete">
    <i class="fa fa-trash-o fa-1x"></i>
</a>
```     

- add modal as a *partial*

```    
...
	@include('partials.confirm-delete');
@endsection
```     

- the modal is outsourced inside a *partial*
	- create folder **partials** below **views**
	- create **confirm-delete.blade.php**

``` 
<!-- Modal -->
<div class="modal fade" id="modal-confirm-delete" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Delete example</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-footer">
                <a class="btn btn-outline-secondary" data-dismiss="modal">Close</a>
                <a id="btn-confirm-delete-ok" class="btn btn-danger">Delete</a>
            </div>
        </div>
    </div>
</div>
```     
- add css-rules for cursor inside **sass/_utils.scss**

```
.btn {
  cursor: pointer;
}

.btn-danger, .btn-warning, .btn-warning {
  color: #fff !important;
}
```
 
    
 
 

- **ExampleController**

	- for testing-purposes throw an exception ... a red notofer should appear

```
public function destroy(Request $request, Example $example) {


//		throw new Exception("Somethnig went terrible wrong");

	$example->delete();

// return redirect()->route('example.index')->with('message', 'Example deleted successfully');
	
	$result = [
		'success' => TRUE,
		'message' => __('Example successfully deleted.')
	];
	
	return response()->json($result);
}
``` 

 

## TODO 
```   
```     

- busy-load import
	- extract?!?!
    
- AJAX
    - notfier
        - https://ned.im/noty/
            - npm install noty --save-dev
    - mod -> handleResult
    
- Auth
    - migration alter  
    
- ServiceProvider
    - app/ app->extend
    
- Request Error Msgs + Forms

- model - special pivot table?
- Middle 
- Events
- View::share
- API
- queryScopes
- Tests
- Language
- multiple DBs
- PHPDoc


- Carbon

```  
		    return redirect()->back()->withErrors( [
			    "message" => "Author couldn't be updated"
		    ] );
```  