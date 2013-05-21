<?php

class Admin extends Employee {

	public  static function authenticate(){
		$user = Auth::user();
		$retVal = (strcmp($user->type, 'admin') === 0 && $user->status === '1') ? true : false ;
		return $retVal;
	}

}