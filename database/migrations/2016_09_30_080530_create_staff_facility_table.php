<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStaffFacilityTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('staff_facility', function(Blueprint $table){
            $table->increments('id');
            $table->integer('no_of_cadres');
            $table->integer('staff_category_id')->unsigned();
            $table->foreign('staff_category_id')->references('id')->on('staff_category')->onDelete('cascade')->onUpdate('cascade');
            $table->integer('facility_id')->unsigned();
            $table->foreign('facility_id')->references('id')->on('facility')->onDelete('cascade')->onUpdate('cascade');
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
        //
        Schema::drop('staff_facility');
    }
}
