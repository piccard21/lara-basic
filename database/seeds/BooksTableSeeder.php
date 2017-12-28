<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BooksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
	public function run()
	{
//		//Seed roles table with 20 entries
//		factory('App\Author', 20)->create();
//
//		//Seed users table with 20 entries
//		factory('App\Book', 20)->create();
		
		//Get array of ids
		$bookIds      = DB::table('books')->pluck('id')->toArray();
		$authorIds      = DB::table('authors')->pluck('id')->toArray();
		
		//Seed user_role table with 20 entries
		foreach ((range(1, 21)) as $index)
		{
			DB::table('author_book')->insert(
				[
					'book_id' => $bookIds[array_rand($bookIds)],
					'author_id' => $authorIds[array_rand($authorIds)]
				]
			);
		}
		
	}
}
