<?php

use Illuminate\Database\Seeder;
//use Crypt;
class SystemsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $systems = [
            [
                'name' => 'CPS2',
                'host' => 'WIN-ESA6FH2FC4R\SQLEXPRESS',
                'dbversion' => '2008',
                'dbname' => 'CPS2',
                'dbuser' => 'cos',
                'dbuserpass' => Crypt::encrypt('web.auto')
            ],
            [
                'name' => 'CPS',
                'host' => 'WIN-ESA6FH2FC4R\WINCC',
                'dbversion' => '2008',
                'dbname' => 'CPS2',
                'dbuser' => 'cos',
                'dbuserpass' => Crypt::encrypt('web.auto')
            ],
            [
                'name' => 'ЦПС 101',
                'host' => 'WIN-ESA6FH2FC4R\WINCC2K',
                'dbversion' => '2008',
                'dbname' => 'lukoil_cps',
                'dbuser' => 'cos',
                'dbuserpass' => Crypt::encrypt('web.auto')
            ]
        ];
        DB::table('systems')->insert($systems);
    }
}
