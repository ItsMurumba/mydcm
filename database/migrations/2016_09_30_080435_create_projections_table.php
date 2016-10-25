<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProjectionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('projections', function(Blueprint $table){
            $table->increments('id');
            $table->decimal('rate');
            $table->timestamps();
            $table->integer('projection_factor_id')->unsigned();
            $table->foreign('projection_factor_id')->references('id')->on('projection_factor')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::drop('projections');
    }
}
