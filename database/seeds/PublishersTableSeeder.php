<?php

use Illuminate\Database\Seeder;

class PublishersTableSeeder extends Seeder {
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run() {
		factory(App\Publisher::class, 50)->create()->each(function($p) {
			for($i = 0; $i < rand(1,21); $i++) {
				$p->books()->save(factory(App\Book::class)->make());
			}
		});
	}
}
