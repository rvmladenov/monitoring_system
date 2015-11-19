<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'admin',
            'email' => 'admin@admin.admin',
            'password' => bcrypt('13579'),
            'admin' => 'a'
        ]);

        DB::table('users')->insert([
            'name' => 'dummy',
            'email' => 'dummy@dummy.dummy',
            'password' => bcrypt('13579'),
            'admin' => 'b'
        ]);
    }
}
