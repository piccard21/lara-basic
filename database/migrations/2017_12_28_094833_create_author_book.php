<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAuthorBook extends Migration {
	
	public $timestamps = false;
	
	
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::create('author_book', function(Blueprint $table) {
			$table->integer('author_id')->unsigned()->index();
			$table->integer('book_id')->unsigned()->index();

			$table->primary(['author_id', 'book_id']);

			$table->foreign('author_id')->references('id')->on('authors')->onDelete('cascade');
			$table->foreign('book_id')->references('id')->on('books')->onDelete('cascade');
		});
	}
	
	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::dropIfExists('author_book');
	}
}
