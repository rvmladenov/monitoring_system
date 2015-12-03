<?php

use Illuminate\Database\Seeder;

class ValsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $vals =[
            [
                'paramName' => 'SO2',
                'lowerLimit' => 0,
                'upperLimit' => 2000,
                'measUnit' => 'mg/Nm3'
            ],
            [
                'paramName' => 'SO2',
                'lowerLimit' => 0,
                'upperLimit' => 50,
                'measUnit' => 'kg/30min'
            ],
            [
                'paramName' => 'SO3',
                'lowerLimit' => 0,
                'upperLimit' => 200,
                'measUnit' => 'mg/Nm3'
            ],
            [
                'paramName' => 'NOx',
                'lowerLimit' => 0,
                'upperLimit' => 500,
                'measUnit' => 'mg/Nm3'
            ],
            [
                'paramName' => 'HCL',
                'lowerLimit' => 0,
                'upperLimit' => 200,
                'measUnit' => 'mg/Nm3'
            ],
            [
                'paramName' => 'TOC',
                'lowerLimit' => 0,
                'upperLimit' => 200,
                'measUnit' => 'mg/Nm3'
            ],
            [
                'paramName' => 'Прах',
                'lowerLimit' => 0,
                'upperLimit' => 500,
                'measUnit' => 'mg/Nm3'
            ],
            [
                'paramName' => 'CO',
                'lowerLimit' => 0,
                'upperLimit' => 500,
                'measUnit' => 'mg/Nm3'
            ],
            [
                'paramName' => 'O2',
                'lowerLimit' => 0,
                'upperLimit' => 25,
                'measUnit' => 'об.%'
            ],
            [
                'paramName' => 'Температура',
                'lowerLimit' => 0,
                'upperLimit' => 1000,
                'measUnit' => '°C'
            ],
            [
                'paramName' => 'Влажност',
                'lowerLimit' => 0,
                'upperLimit' => 2000,
                'measUnit' => 'об.%'
            ],
            [
                'paramName' => 'Налягане',
                'lowerLimit' => 0,
                'upperLimit' => 1100,
                'measUnit' => 'hPa'
            ],
            [
                'paramName' => 'Дебит',
                'lowerLimit' => 0,
                'upperLimit' => 1500000,
                'measUnit' => 'Nm3/h'
            ]
        ];
        DB::table('vals')->insert($vals);
    }
}
