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
		//
        Schema::create('users', function($table) {
			$table->increments('id');
			$table->string('first_name')->nullable();
			$table->string('last_name')->nullable();
			$table->string('username')->unique();
			$table->string('password', 60);
			$table->string('email')->unique();
			$table->rememberToken()->nullable();
			$table->string('status')->default('active')->nullable();
			$table->timestamps();
		});
        
		Schema::create('persons', function($table) {
			$table->increments('id');
			$table->string('domain')->nullable();
			$table->string('first_name')->nullable();
			$table->string('last_name')->nullable();
			$table->boolean('last_check_online')->nullable();
			$table->timestamps();
		});
        Schema::create('person_user', function(Blueprint $table)
		{
			$table->integer('person_id')->unsigned();
			$table->foreign('person_id')->references('id')->on('persons');
			$table->integer('user_id')->unsigned();
			$table->foreign('user_id')->references('id')->on('users');
		});
        Schema::create('visits', function(Blueprint $table)
		{
			$table->increments('id');
			$table->timestamp('online');
			$table->index('online');
			$table->timestamp('offline')->nullable();
			$table->integer('person_id')->unsigned();
			$table->foreign('person_id')->references('id')->on('persons');
		});
        
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		//

        Schema::drop('users');
        Schema::drop('visits');
        Schema::drop('persons');
        Schema::drop('person_user');
	}

}
