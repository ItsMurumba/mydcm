<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStaffCategoryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('staff_category',function(Blueprint $table){
            $table->increments('id');
            $table->string('cadre');
            $table->decimal('basic_salary');
            $table->decimal('allowances');
            $table->decimal('reimbursement');
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
        Schema::drop('staff_category');
    }
}
