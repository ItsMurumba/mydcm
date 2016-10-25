<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePopulationEstimatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('population_estimates',function (Blueprint $table){
            $table->increments('int');
            $table->integer('population');
            $table->integer('population_distribution_id')->unsigned();
            $table->foreign('population_distribution_id')->references('id')->on('population_distribution')->onDelete('cascade')->onUpdate('cascade');
            $table->integer('county_id')->unsigned();
            $table->foreign('county_id')->references('id')->on('county')->onDelete('cascade')->onUpdate('cascade');

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
        Schema::drop('population_estimates');
    }
}
