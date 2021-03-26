<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateDepartmentsTable extends Migration {

	public function up()
	{
		Schema::create('departments', function(Blueprint $table) {
			$table->increments('id');
			$table->string('name', 50);
			$table->string('description', 250)->nullable();
			$table->timestamps();
		});
	}

	public function down()
	{
		Schema::drop('departments');
	}
}