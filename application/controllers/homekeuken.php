<?php
class Homekeuken_Controller extends Homegebruiker_Controller{
	public $restful = true;
	public function get_index(){
		if (Keukenpersoneel::authenticate())
			return View::make('layouts.keukencontents.home');
		else
			return Redirect::to('login');
	}

	public function get_lijst(){
		if(Keukenpersoneel::authenticate())
			return View::make('layouts.keukencontents.lijst');
		else
			return Redirect::to('login');		
	}

	public function get_menu(){
		if(Keukenpersoneel::authenticate())
			return View::make('layouts.keukencontents.menu');
		else
			return Redirect::to('login');		
	}

	public function get_broodjes(){
		if(Keukenpersoneel::authenticate())
			return View::make('layouts.keukencontents.broodjes');
		else
			return Redirect::to('login');		
	}

	public function get_profile(){
		if(Keukenpersoneel::authenticate())
			return View::make('layouts.keukencontents.profile')
				->with('name', Keukenpersoneel::name())
				->with('firstname', Keukenpersoneel::firstname())
				->with('lastname', Keukenpersoneel::lastname())
				->with('email', Keukenpersoneel::email());
		else
			return Redirect::to('login');		
	}

	public function get_password(){
		if(Keukenpersoneel::authenticate())
			return View::make('layouts.keukencontents.password');				
		else
			return Redirect::to('login');		
	}

	public function post_password(){
		if(Keukenpersoneel::authenticate()){
			$input=Input::all();
			$rules = array(
					'password' => 'required|alpha_num|between:4,16|confirmed',
					'password_confirmation' => 'required|alpha_num|between:4,16'
				);
			
			$validation=Validator::make($input, $rules);
			if($validation->passes()){
				$newpass=Input::get('password');
				$user=Auth::user();
				if($user){//the user exists
					$user->password=Hash::make($newpass); //sets the new password
					if($user->save()){//the new password is stored succesfully
						//add success message					
						Session::flash('message', Lang::line('flashmessages.passwordupdatesuccess')->get(Session::get('language', 'nl')) );
						return Redirect::to_route('keukenpassword');
					}
					else{//the new password has not been saved successfully, add message to contact admin
						return Redirect::to_route('keukenpassword');
					}
				}
				else{//the user doesn't exist
					return View::make('home.login');
				}
			}
			else{
				return Redirect::to_route('keukenpassword')->with_errors($validation);
			}
		}							
		else
			return Redirect::to('login');		
	}

	public function get_reservations(){
		if(Keukenpersoneel::authenticate())
			return View::make('layouts.keukencontents.reservations');			
		else
			return Redirect::to('login');
	}

	public function get_favorites(){
		if(Keukenpersoneel::authenticate())
			return View::make('layouts.keukencontents.favorites');			
		else
			return Redirect::to('login');
	}
}