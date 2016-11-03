<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDataSetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('data_sets',function (Blueprint $table){
            $table->increments('int')->primarykey();
            $table->text('name');
            $table->integer('county_id')->unsigned();
            $table->foreign('county_id')->references('id')->on('county')->onDelete('cascade')->onUpdate('cascade');
            $table->integer('facility_id')->unsigned();
            $table->foreign('facility_id')->references('id')->on('facility')->onDelete('cascade')->onUpdate('cascade');
            $table->integer('diseases_id')->unsigned();
            $table->foreign('disease_id')->references('id')->on('disease')->onDelete('cascade')->onUpdate('cascade');
            $table->integer('distribution_id')->unsigned();
            $table->foreign('distribution_id')->references('id')->on('population_distribution')->onDelete('cascade')->onUpdate('cascade');
            $table->decimal('population');
            $table->integer('users_id')->unsigned();
            $table->foreign('users_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::drop('data_sets');
    }
}
