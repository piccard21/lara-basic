<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Example;
use Faker\Factory as Faker;

class ExamplesTableSeeder extends Seeder {
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run() {
//		DB::table('examples')->insert([
//			'text' => str_random(121)
//		]);
		
		$faker = Faker::create();
		foreach(range(1, 10) as $index) {
			DB::table('examples')->insert([
				'text' => $faker->sentence(7)
			]);
		}
	}
}
