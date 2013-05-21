
<?php
class Homegebruiker_Controller extends Base_Controller{
	public $restful = true;
	public function get_index(){
			if (Gebruiker::authenticate()) {
				return View::make('layouts.gebruikercontents.home');
			} else
				return Redirect::to('login');
	}

	public function get_menu(){
		if(Gebruiker::authenticate())
			return View::make('layouts.gebruikercontents.menu');
		else
			return Redirect::to('login');
	}

	public function get_broodjes(){
		if(Gebruiker::authenticate())
			return View::make('layouts.gebruikercontents.broodjes');
		else
			return Redirect::to('login');		
	}

	public function get_profile(){
		if(Gebruiker::authenticate())
			return View::make('layouts.gebruikercontents.profile')
				->with('name', Gebruiker::name())
				->with('firstname', Gebruiker::firstname())
				->with('lastname', Gebruiker::lastname())
				->with('email', Gebruiker::email());
		else
			return Redirect::to('login');		
	}

	public function post_profile(){
		if(Gebruiker::authenticate() || Keukenpersoneel::authenticate() || Admin::authenticate()){
			$input=Input::all();
			$rules = array(
					'username' => 'required|alpha_dash|max:50',
					'firstname' => 'required|alpha|max:100',
					'lastname' => 'required|alpha|max:100',
					'email' => 'required|email'
				);
			
			$validation=Validator::make($input, $rules);
			if($validation->passes()){
				

				$user=Auth::user();
				$routeto;
				switch ($user->type) {
				    case "gebruiker":
				        $routeto='gebruikerprofile';
				        break;
				    case "keuken":
				        $routeto='keukenprofile';
				        break;
				    case "admin":
				        $routeto='adminprofile';
				        break;
				}

				if($user){//the user exists
					if(strcmp($user->username, Input::get('username')) !== 0){
						$user->username = Input::get('username'); //sets the new username
					}
					$user->firstname = Input::get('firstname');
					$user->lastname = Input::get('lastname');
					if(strcmp($user->email, Input::get('email')) !== 0){
						$user->email = Input::get('email');
					}

					if($user->save()){//the new data is stored succesfully
						//add success message					
						Session::flash('message', Lang::line('flashmessages.profileupdatesuccess')->get(Session::get('language', 'nl')) );
						return Redirect::to_route($routeto);
					}
					else{//the new data has not been saved successfully, add message to contact admin
						Session::flash('messagefail', Lang::line('flashmessages.profileupdatefail')->get(Session::get('language', 'nl')) );
						return Redirect::to_route($routeto);
					}
				}
				else{//the user doesn't exist
					return View::make('home.login');
				}
			}
			else{//validation fails, show errors!
				return Redirect::to_route('gebruikerprofile')->with_errors($validation);
			}
		}							
		else
			return Redirect::to('login');									
	}

	public function get_password(){
		if(Gebruiker::authenticate())
			return View::make('layouts.gebruikercontents.password');				
		else
			return Redirect::to('login');		
	}

	public function post_password(){
		if(Gebruiker::authenticate()){
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
						return Redirect::to_route('gebruikerpassword');
					}
					else{//the new password has not been saved successfully, add message to contact admin
						Session::flash('messagefail', Lang::line('flashmessages.passwordupdatefail')->get(Session::get('language', 'nl')) );
						return Redirect::to_route('gebruikerpassword');
					}
				}
				else{//the user doesn't exist
					return View::make('home.login');
				}
			}
			else{
				return Redirect::to_route('gebruikerpassword')->with_errors($validation);
			}
		}							
		else
			return Redirect::to('login');		
	}

	public function get_reservations(){
		if(Gebruiker::authenticate())
			return View::make('layouts.gebruikercontents.reservations');			
		else
			return Redirect::to('login');
	}

	public function get_favorites(){
		if(Gebruiker::authenticate())
			return View::make('layouts.gebruikercontents.favorites');			
		else
			return Redirect::to('login');
	}

	public function get_contact(){
		if(Gebruiker::authenticate())
			return View::make('layouts.gebruikercontents.contact')
				->with('name', Gebruiker::name())
				->with('email', Gebruiker::email());
			else
				return Redirect::to('login');		
	}

}