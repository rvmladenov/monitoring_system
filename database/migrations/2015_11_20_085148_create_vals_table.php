<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateValsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vals', function (Blueprint $table) {
            $table->increments('id');
            $table->string('paramName', 50);
            $table->integer('lowerLimit');
            $table->integer('upperLimit');
            $table->string('measUnit', 20);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('vals');
    }
}
