<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;


class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Model::unguard();

        $this->call('UserTableSeeder');
	}

}


class UserTableSeeder extends Seeder {
    public function run()
    {
        DB::table('admins')->insert(['username'=>'vs_lala', 'password'=>Hash::make('123'), 'created_at'=>new DateTime, 'updated_at'=>new DateTime]);

        DB::table('mcategories')->insert(['name'=>'Handmade Items', 'created_at'=>new DateTime, 'updated_at'=>new DateTime]);

        DB::table('states')->insert(['name'=>'Madhya Pradesh', 'created_at'=>new DateTime, 'updated_at'=>new DateTime]);

        DB::table('cities')->insert(['name'=>'Jabalpur', 'created_at'=>new DateTime, 'updated_at'=>new DateTime]);

    }
}