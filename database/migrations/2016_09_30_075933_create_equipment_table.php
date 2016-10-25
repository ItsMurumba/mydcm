<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEquipmentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //create table Equipment
        Schema::create('equipment',function(Blueprint $table){
            $table->increments('id');
            $table->string('name');
            $table->string('model');
            $table->date('date_of_delivery');
            $table->decimal('cost');
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
        //drops table equipment
        Schema::drop('equipment');
    }
}
