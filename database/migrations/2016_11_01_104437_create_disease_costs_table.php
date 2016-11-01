<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDiseaseCostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('disease_costs',function (Blueprint $table){
            $table->increments('int')->primarykey();
            $table->integer('diseases_id')->unsigned();
            $table->foreign('disease_id')->references('id')->on('disease')->onDelete('cascade')->onUpdate('cascade');
            $table->decimal('services_total_cost');
            $table->decimal('consultation_fee');
            $table->decimal('drugs_total_cost');
            $table->decimal('total');
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
        Schema::drop('disease_costs');
    }
}
