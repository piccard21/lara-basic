<?php

use Illuminate\Database\Seeder;

class AuthorsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
//	    factory(App\User::class, 50)->create()->each(function ($u) {
//		    $u->posts()->save(factory(App\Post::class)->make());
//	    });
	    factory(App\Author::class, 50)->create();
    }
}
