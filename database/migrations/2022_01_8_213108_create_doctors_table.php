<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateDoctorsTable extends Migration {

	public function up()
	{
		Schema::create('doctors', function(Blueprint $table) {
			$table->increments('id');
			$table->string('name', 100);
			$table->string('email', 250);
			$table->string('phone', 20);
			$table->string('address', 250)->nullable();
			$table->string('profile', 250);
			$table->bigInteger('department_id')->unsigned();
            $table->foreign('department_id')->references('id')->on('departments')
                ->onDelete('cascade')
                ->onUpdate('cascade');
			$table->timestamps();
		});
	}

	public function down()
	{
		Schema::drop('doctors');
	}
}
