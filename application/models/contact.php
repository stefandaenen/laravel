<?php

class Contact extends Basemodel {

	public static $rules = array(
		'name' => 'required|alpha_dash|max:50',
		'email' => 'required|email',	
		'message'=>'required'	
	);
}