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


