<?php
/**
 * common functionalities with easy access
 */
class Home_Controller extends Base_Controller{
	public $restful = true;

	public function get_login(){
		return View::make('home.login');
	} 

	/**
	 * set the selected language in session and redirect to the
	 * page where language was changed.
	 */
	public function get_language($language, $route){
		Session::put('language', $language);
		return Redirect::to($route);
	}

	/**
	 *when not logged in a guest contact page is accessible through this
	 * function
	 */
	public function get_guest(){
		return View::make('layouts.contactcontents.contactguest');
	}

	public function post_updateprofile(){

	}

	// public function post_updatepassword(){
	// 	$input=Input::all();
	// 	$rules = array(
	// 			'password' => 'required|alpha_num|between:4,16|confirmed',
	// 			'password_confirmation' => 'required|alpha_num|between:4,16'
	// 		);
		
	// 	$validation=Validator::make($input, $rules);
	// 	if($validation->passes()){
	// 		$newpass=Input::get('password');
	// 		$user=Auth::user();
	// 		if($user){//the user exists
	// 			$user->password=Hash::make($newpass); //sets the new password
	// 			if($user->save()){//the new password is stored succesfully
	// 				//password -> active to select tab dynamically
	// 				return Redirect::to_route('');
	// 			}
	// 			else{//the new password has not been saved successfully
	// 				return Redirect::to_route('')->with_errors($validation);
	// 			}
	// 		}
	// 		else{//the user doesn't exist
	// 			return View::make('home.login');
	// 		}
	// 	}
	// }

}
