<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Spatie\Permission\Models\Role;

class CreateAdminUserSeeder extends Seeder
{
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		$user = User::create([
			'first_name' => 'Administrator',
			'last_name'  => 'User',
			'email'      => 'admin@admin.com',
			'phone'      => 9898789878,
			'password'   => bcrypt('password'),
			'status'     => 1,
			'is_admin'   => 1
		]);

		$role = Role::create(['name' => 'Administrator']);

		$userRole = Role::create(['name' => 'User']);

		$user->assignRole([$role->id]);
	}
}
