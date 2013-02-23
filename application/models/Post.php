<?php

class Post extends Eloquent {

	public function author()
	{
		return $this->belongs_to('Users' , 'author_id');
	}
}