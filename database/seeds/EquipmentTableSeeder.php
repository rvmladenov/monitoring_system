<?php

use Illuminate\Database\Seeder;

class EquipmentTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$equipment = [
			[
				'equipmentName' => 'Контролер'
			],
			[
				'equipmentName' => 'Газ-анализаторна система'
			],
			[
				'equipmentName' => 'Прахомер'
			],
			[
				'equipmentName' => 'Кислородомер'
			],
			[
				'equipmentName' => 'Разходомер'
			]
        ];

        DB::table('equipment')->insert($equipment);
    }
}
