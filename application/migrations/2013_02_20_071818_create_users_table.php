<?php

class Create_Users_Table {    

	public function up()
    {
		Schema::create('users', function($table) {
			$table->increments('id');
			$table->string('username');
			$table->string('password',64);
			$table->string('nickname');
			$table->timestamps();
	});
    
	DB::table('users')->insert(array(
		'username' => 'admin',
		'password' => Hash::make('admin'),
		'nickname' => 'admin'
	));  	
    }  



	public function down()
    {
		Schema::drop('users');

    }

}