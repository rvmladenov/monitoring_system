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
            'username' => 'Иван Иванов',
            'name' => 'admin',
            'password' => bcrypt('13579'),
            'admin' => 'a'
        ]);

        DB::table('users')->insert([
            'username' => 'Петър Петров',
            'name' => 'user',
            'password' => bcrypt('24680'),
            'admin' => 'b'
        ]);
    }
}
