<?php
class Login_Controller extends Base_Controller{

	public function action_index(){
		// check the os language settings 
		$language = substr($_SERVER['HTTP_ACCEPT_LANGUAGE'], 0, 2);
		// put  os language setting in session
		Session::put('language', $language);
		// show the login view
		return View::make('home.login');
	}
	
	public function action_checklogin(){

		// validate the input via employee_model extends Basemodel
		$validation = Employee::validate(Input::all());
		if($validation->passes()){
			$credentials = array(
				'username' => Input::get('login'),
				'password' => Input::get('password')
			 );		
			if( Auth::attempt($credentials)){
				// controle admin keuken gebruiker en redirect naar respectieve page
				//return Redirect::to('admin'); +Route aanmaken voor admin!!
				$user = Auth::user();
				if ($user->type == 'admin') {
					return Redirect::to('home_admin');
				} else if($user->type == 'keuken') {
					return Redirect::to('home_keuken');
				} else if($user->type == 'gebruiker') {
					return Redirect::to('home_gebruiker');
				}
			}
			else{
				Session::flash('messagefail', Lang::line('flashmessages.loginfailure')->get(Session::get('language', 'nl')) );				
				return Redirect::to('login');
			}
				
		}
		else
			// return to login to show errors and return what the user entered
			return Redirect::to_route('login')->with_errors($validation)->with_input();
		
	}

	public function action_checklogout(){	
		Auth::logout();
		return Redirect::to('/');	
		//return View::make('home.login');	
	}		
}