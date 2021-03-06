<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnsToBooks extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::table( 'books', function ( Blueprint $table ) {
			$table->longText( 'description' )->nullable();
			$table->string( 'isbn' , 10)->nullable()->unique();
		} );
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::table( 'books', function ( Blueprint $table ) {
			$table->dropColumn( 'description' );
			$table->dropColumn( 'isbn' );
		} );
	}
}
