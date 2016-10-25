<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFacilityTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('facility',function(Blueprint $table){
            $table->increments('id');
            $table->string('name');
            $table->string('address');
            $table->integer('bedcapacity');
            $table->integer('county_id')->unsigned();
            $table->foreign('county_id')->references('id')->on('county')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::drop('facility');
    }
}
