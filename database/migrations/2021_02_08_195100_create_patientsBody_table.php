<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePatientsBodyTable extends Migration {

	public function up()
	{
		Schema::create('patientsBody', function(Blueprint $table) {
			$table->increments('id');
            $table->bigInteger('user_id')->unsigned();
            $table->integer('bloodPressure');
			$table->integer('heartBeats');
			$table->integer('heat');
			$table->integer('respiratoryRate');
			$table->integer('insulinRatio');
			$table->integer('weight');
			$table->integer('length');
			$table->integer('mass');
			$table->enum('pressurePatient', array('0', '1'));
			$table->enum('diabetic', array('0', '1'));
			$table->enum('takeMedication', array('0', '1'));
			$table->enum('smokes', array('0', '1'));
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
			$table->string('PatientComplaint');
			$table->string('diagnosePatient');
			$table->string('note');
            $table->foreign('user_id')->references('id')->on('users')
                ->onDelete('cascade')
                ->onUpdate('cascade');
			$table->timestamps();
		});
	}

	public function down()
	{
		Schema::drop('patientsBody');
	}
}