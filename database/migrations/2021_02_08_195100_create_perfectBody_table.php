<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePerfectBodyTable extends Migration {

	public function up()
	{
		Schema::create('perfectBody', function(Blueprint $table) {
			$table->increments('id');
            $table->bigInteger('user_id')->unsigned();
            $table->integer('length');
            $table->integer('weight');
			$table->integer('waterRatio');
			$table->integer('fatRatio');
			$table->integer('muscleRatio');
			$table->integer('boneRatio');
			$table->integer('fatWeight');
			$table->integer('idealWeightFirst');
			$table->integer('idealWeightSecond');
			$table->integer('bim');
			$table->integer('waterRequired');
			$table->integer('proteinRequired');
			$table->integer('salt');
			$table->integer('burnRate');
            $table->string('note')->nullable();
            $table->foreign('user_id')->references('id')->on('users')
                ->onDelete('cascade')
                ->onUpdate('cascade');
			$table->timestamps();
		});
	}

	public function down()
	{
		Schema::drop('perfectBody');
	}
}
