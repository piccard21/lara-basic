<?php

use App\Role;
use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
	public function run() {
		$author = Role::create( [
			'name'        => 'Admin',
			'slug'        => 'admin',
			'permissions' => [
				'create-book' => true,
				'update-book'  => true,
				'delete-book' => true,
			]
		] );
		$editor = Role::create( [
			'name'        => 'User',
			'slug'        => 'user',
			'permissions' => [
				'update-book'  => true
			]
		] );
    }
}
