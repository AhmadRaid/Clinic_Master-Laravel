<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateDoctorServiceTable extends Migration {

	public function up()
	{
		Schema::create('doctor_service', function(Blueprint $table) {
			$table->increments('id');
			$table->bigInteger('doctor_id')->unsigned();
			$table->bigInteger('service_id')->unsigned();
            $table->foreign('doctor_id')->references('id')->on('doctors')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->foreign('service_id')->references('id')->on('services')
                ->onDelete('cascade')
                ->onUpdate('cascade');
			$table->timestamps();
		});
	}

	public function down()
	{
		Schema::drop('doctor_service');
	}
}
