<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class MakeAllTables extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('users', function($table) {
			$table->increments('id');
			$table->string('first_name');
			$table->string('last_name');
			$table->string('username')->unique();
			$table->string('password');
			$table->string('email')->unique();
			$table->rememberToken();
			$table->string('status')->default('active');
			$table->timestamps();
		});

		Schema::create('persons', function($table) {
			$table->increments('id');
			$table->string('domain');
			$table->string('first_name');
			$table->string('last_name');
			$table->boolean('last_check_online');
			$table->timestamps();
		});

//		Schema::create('users', function($table) {
//
//		});


		//
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{

		Schema::dropIfExists('users');
		Schema::dropIfExists('persons');
		//
	}

}
