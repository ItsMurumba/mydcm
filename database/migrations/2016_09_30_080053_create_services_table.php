<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateServicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //create Service table
        Schema::create('services',function(Blueprint $table){
            $table->increments('id');
            $table->string('name');
            $table->decimal('cost');
            $table->integer('equipment_id')->unsigned();
            $table->foreign('equipment_id')->references('id')->on('equipment')->onDelete('cascade')->onUpdate('cascade');
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
        //drops the equipments tables
        Schema::drop('services');
    }
}
