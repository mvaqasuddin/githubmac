<?php

class Create_Posts_Table {    

	public function up()
    {
		Schema::create('posts', function($table) {
			$table->increments('id');
			$table->string('title');
			$table->text('body');
			$table->integer('author_id');
			$table->timestamps();
	});

    }    

	public function down()
    {
		Schema::drop('posts');

    }

}