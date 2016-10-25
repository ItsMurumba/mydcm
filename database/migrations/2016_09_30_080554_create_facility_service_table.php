<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFacilityServiceTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('facility_service', function(Blueprint $table){
            $table->increments('id');
            $table->integer('facility_id')->unsigned();
            $table->foreign('facility_id')->references('id')->on('facility')->onDelete('cascade')->onUpdate('cascade');
            $table->integer('service_id')->unsigned();
            $table->foreign('service_id')->references('id')->on('service')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::drop('facility_service');
    }
}
