<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePatientReportsTable extends Migration {

	public function up()
	{
		Schema::create('patient_reports', function(Blueprint $table) {
			$table->increments('id');
			$table->bigInteger('patient_id')->unsigned();
			$table->dateTime('appointment');
			$table->string('attachments', 250)->nullable();
			$table->string('note', 250)->nullable();
            $table->foreign('patient_id')->references('id')->on('patients')
                ->onDelete('cascade')
                ->onUpdate('cascade');

			$table->timestamps();
		});
	}

	public function down()
	{
		Schema::drop('patient_reports');
	}
}
