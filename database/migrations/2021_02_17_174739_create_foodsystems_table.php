<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFoodsystemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('foodsystems', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->bigInteger('department_id');
            $table->string('breakfast');
            $table->string('the_lunch');
            $table->string('the_dinner');
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
        Schema::dropIfExists('foodsystems');
    }
}
