<?php

class Gebruiker extends Employee {

	public  static function authenticate(){
		$user = Auth::user();
		$retVal = (strcmp($user->type, 'gebruiker') === 0 && $user->status === '1') ? true : false ;
		return $retVal;
	}



}