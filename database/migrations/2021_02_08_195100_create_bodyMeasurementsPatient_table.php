<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateBodyMeasurementsPatientTable extends Migration {

	public function up()
	{
		Schema::create('bodyMeasurementsPatient', function(Blueprint $table) {
			$table->increments('id');
            $table->bigInteger('user_id')->unsigned();
            $table->integer('rightHandCircumference');
            $table->integer('leftHandCircumference');
            $table->integer('chestCircumference');
            $table->integer('centerCircumference');
            $table->integer('abdominalCircumference');
            $table->integer('perimeterPelvis');
            $table->integer('rightThighCircumference');
            $table->integer('leftThighCircumference');
            $table->integer('rightCalfCircumference');
            $table->integer('leftCalfCircumference');
            $table->string('note')->nullable();
            $table->foreign('user_id')->references('id')->on('users')
                ->onDelete('cascade')
                ->onUpdate('cascade');
			$table->timestamps();
		});
	}

	public function down()
	{
		Schema::drop('bodyMeasurementsPatient');
	}
}
