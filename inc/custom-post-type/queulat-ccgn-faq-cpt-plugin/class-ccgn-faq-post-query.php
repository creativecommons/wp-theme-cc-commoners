<?php

use Queulat\Post_Query;

class Ccgn_Faq_Post_Query extends Post_Query {
	public function get_post_type() : string {
		return 'ccgn-faq';
	}
	public function get_decorator() : string {
		return Ccgn_Faq_Post_Object::class;
	}
	public function get_default_args() : array {
		return [];
	}
}
