<?php

use Queulat\Post_Query;

class Ccgn_Projects_Post_Query extends Post_Query {
	public function get_post_type() : string {
		return 'ccgn-projects';
	}
	public function get_decorator() : string {
		return Ccgn_Projects_Post_Object::class;
	}
	public function get_default_args() : array {
		return [];
	}
}
