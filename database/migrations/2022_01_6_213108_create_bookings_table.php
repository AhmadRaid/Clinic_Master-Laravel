<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateBookingsTable extends Migration {

	public function up()
	{
		Schema::create('bookings', function(Blueprint $table) {
			$table->increments('id');
			$table->bigInteger('patient_id')->unsigned();
			$table->bigInteger('service_id')->unsigned();
			$table->time('time');
			$table->time('date');
			$table->integer('price');
			$table->string('status')->nullable();
			$table->string('type');
            $table->foreign('patient_id')->references('id')->on('users')
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
		Schema::drop('bookings');
	}
}
