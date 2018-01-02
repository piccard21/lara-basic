<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Book;
use App\Author;

class BooksTableSeeder extends Seeder {
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
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
}
