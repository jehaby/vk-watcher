<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class MakeAllTables extends Migration {



    public function up()
	{
        
        Schema::create('users', function($table) {
			$table->increments('id');
			$table->string('first_name');
			$table->string('last_name');
			$table->string('username')->unique();
			$table->string('password', 60);
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
			$table->timestamp('offline');
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
		Schema::drop('users');
        Schema::drop('visits');
        Schema::drop('persons');
        Schema::drop('person_user');

	}


}
