<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePatientsDetailsTable extends Migration {

	public function up()
	{
		Schema::create('patientsDetails', function(Blueprint $table) {
			$table->increments('id');
            $table->bigInteger('user_id')->unsigned();
            $table->string('phone', 20)->nullable();
			$table->string('mobile', 20)->nullable();
			$table->date('birthday');
			$table->integer('age');
			$table->string('education', 150)->nullable();
			$table->string('job', 150)->nullable();
			$table->enum('gender', array('0', '1'));
			$table->string('governorate', 100)->nullable();
			$table->string('city', 100)->nullable();
			$table->string('address');
			$table->string('Physician');
			$table->bigInteger('idNumber');
			$table->date('dateOfRegistration');
			$table->date('dateLastVisit');
            $table->bigInteger('numberOfVisit');
            $table->foreign('user_id')->references('id')->on('users')
                ->onDelete('cascade')
                ->onUpdate('cascade');
			$table->timestamps();
		});
	}

	public function down()
	{
		Schema::drop('patientsDetails');
	}
}