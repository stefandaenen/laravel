<?php

class Employee extends Basemodel {

	public static $rules = array(
		'login' => 'required|alpha_dash|min:4',
		'password' => 'required|alpha_num|between:4,16'
	);

	public static function name(){
		$user = Auth::user();
		$name = $user->username;
		return $name;
	}

	public static function firstname(){
		$user = Auth::user();
		$firstname = $user->firstname;
		return $firstname;
	}

	public static function lastname(){
		$user = Auth::user();
		$firstname = $user->lastname;
		return $firstname;
	}

	public static function email(){
		$user = Auth::user();
		$email = $user->email;
		return $email;	
	}

	public static function type(){
		$user = Auth::user();
		$type = $user->type;
		return $type;
	}

	public static function modaldelete($id){
		// $user = Emplyee::find($id);
		// $user->delete();
		$affected = DB::table('employees')->where('id', '=', $id)->delete();
		return $affected;
	}

	public static function userfullname($id){
		$user=Employee::find($id);
		$fullname = ($user->firstname . ' ' . $user->lastname);		
		return $fullname;
	}
}