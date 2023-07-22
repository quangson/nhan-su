<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('dayoffs', function(Blueprint $table) {
			$table->increments('id');
            $table->integer('employee_id');
            $table->string('Annual_Leave');
            $table->string('Compensatory_Day');
            $table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('dayoffs');
	}
};
