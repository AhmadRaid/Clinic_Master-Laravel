<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateServicesTable extends Migration {

	public function up()
	{
		Schema::create('services', function(Blueprint $table) {
			$table->increments('id');
			$table->string('name', 50);
			$table->string('description', 100)->nullable();
			$table->bigInteger('doctor_id')->unsigned();
            $table->foreign('doctor_id')->references('id')->on('doctors')
                ->onDelete('cascade')
				->onUpdate('cascade');
				$table->bigInteger('department_id')->unsigned();
            $table->foreign('department_id')->references('id')->on('departments')
                ->onDelete('cascade')
				->onUpdate('cascade');						
			$table->string('detection_price');
			$table->string('return_price');
			$table->timestamps();
		});
	}

	public function down()
	{
		Schema::drop('services');
	}
}
