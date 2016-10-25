<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDrugDiseaseTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('drug_disease', function(Blueprint $table){
            $table->increments('id');
            $table->integer('drug_id')->unsigned();
            $table->foreign('drug_id')->references('id')->on('drug')->onDelete('cascade')->onUpdate('cascade');
            $table->integer('disease_id')->unsigned();
            $table->foreign('disease_id')->references('id')->on('disease')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::drop('drug_disease');
    }
}
