<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePatientsTable extends Migration {

	public function up()
	{
		Schema::create('patients', function(Blueprint $table) {
			$table->bigIncrements('id');
			$table->bigInteger('booking_id')->unsigned();		
			$table->string('therapy');           
            $table->foreign('booking_id')->references('id')->on('bookings')
                ->onDelete('cascade')
                ->onUpdate('cascade');
			$table->timestamps();
		});
	}

	public function down()
	{
		Schema::drop('patients');
	}
}