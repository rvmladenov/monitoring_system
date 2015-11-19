<?php

use Illuminate\Database\Seeder;

class SystemsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('systems')->insert([
            'name' => 'CPS2',
            'host' => 'WIN-ESA6FH2FC4RSQLEXPRESS',
            'dbname' => 'CPS2',
            'dbuser' => 'cos',
            'dbuserpass' => bcrypt('web.auto')
        ]);
    }
}
