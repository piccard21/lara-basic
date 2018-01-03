<?php

namespace App\Providers;

use App\Book;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();
	    $this->registerBookPolicies();

        //
    }


	public function registerBookPolicies()
	{
		Gate::define('create-book', function ($user) {
			return $user->hasAccess(['create-book']);
		});
		Gate::define('update-book', function ($user, Book $book) {
			return $user->hasAccess(['update-book']);
		});
		Gate::define('publish-book', function ($user) {
			return $user->hasAccess(['publish-book']);
		});
		Gate::define('delete-book', function ($user) {
			return $user->hasAccess(['delete-book']);
		});
//		Gate::define('delete-book', function ($user) {
//			return $user->inRole('delete-book');
//		});
	}
}
