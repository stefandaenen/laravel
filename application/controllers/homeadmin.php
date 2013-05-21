<?php
/**
 *the admin controller for the application
 */
class Homeadmin_Controller extends Homekeuken_Controller{
	public $restful = true;
	/**
	 * the home page for admins
	 */
	public function get_index(){
		if (Admin::authenticate()) {
			return View::make('layouts.admincontents.home');
		} else
			return Redirect::to('login');
	}

	/**
	 * showing list options for admin
	 */
	public function get_lijst(){
		if(Admin::authenticate())
			return View::make('layouts.admincontents.lijst');
		else
			return Redirect::to('login');
	}

	/**
	 * showing options for user administration
	 */
	public function get_gebruiker(){
		if(Admin::authenticate()){			
			$employees = DB::table('employees')
				->order_by('lastname', 'asc')
				->paginate(3);
			return View::make('layouts.admincontents.gebruiker')->with('employees', $employees);
		}
		else
			return Redirect::to('login');
	}

	/**
	 * showing admin page for menu
	 */
	public function get_menu(){
		if(Admin::authenticate())
			return View::make('layouts.admincontents.menu');
		else
			return Redirect::to('login');
	}

	/**
	 * showing admin page for sandwiches
	 */
	public function get_broodjes(){
		if(Admin::authenticate())
			return View::make('layouts.admincontents.broodjes');
		else
			return Redirect::to('login');
	}

	/**
	 * showing page to change personal profile
	 */
	public function get_profile(){
		if(Admin::authenticate())
			return View::make('layouts.admincontents.profile')
				->with('name', Admin::name())
				->with('firstname', Admin::firstname())
				->with('lastname', Admin::lastname())
				->with('email', Admin::email());
		else
			return Redirect::to('login');		
	}

	/**
	 * show page to change personal password
	 */
	public function get_password(){
		if(Admin::authenticate())
			return View::make('layouts.admincontents.password');				
		else
			return Redirect::to('login');		
	}

	/**
	 * show admin page for personal reservations
	 */
	public function get_reservations(){
		if(Admin::authenticate())
			return View::make('layouts.admincontents.reservations');			
		else
			return Redirect::to('login');
	}

	/**
	 * show admin page for personal favorites
	 */
	public function get_favorites(){
		if(Admin::authenticate())
			return View::make('layouts.admincontents.favorites');			
		else
			return Redirect::to('login');
	}

	/**
	 * show admin page to add a new user
	 */
	public function get_newuser(){
		if(Admin::authenticate())
			return View::make('layouts.admincontents.newuser');
		else
			return Redirect::to('login');
	}

	/**
	 * show admin page for adding new user with messages
	 */
	public function post_newuser(){
		if(Admin::authenticate())
			return View::make('layouts.admincontents.newuser');
		else
			return Redirect::to('login');
	}

	/**
	 * save a new user
	 */
	public function post_savenewuser(){
		if(Admin::authenticate()){
			$input=Input::all();	/**< get all data from input form */
			$rules = array(
					'username' => 'required|alpha_dash|max:50|unique:employees',
					'firstname' => 'required|alpha|max:100',
					'lastname' => 'required|alpha|max:100',
					'email' => 'required|email|unique:employees',
					'type' => 'required',
					'password' => 'required|alpha_num|between:4,16|confirmed',
					'password_confirmation' => 'required|alpha_num|between:4,16'					
				);
			
			$validation=Validator::make($input, $rules);
			if($validation->passes()){					/**< check if all input is conform the rules */			
				Employee::create(array(
						'username' => Input::get('username'),
						'firstname' => Input::get('firstname'),
						'lastname' => Input::get('lastname'),
						'email' => Input::get('email'),
						'type' => Input::get('type'),
						'password' => Hash::make(Input::get('password'))
					));																														
				// show succesmessage				
				Session::flash('message', Lang::line('flashmessages.newusersuccess')->get(Session::get('language', 'nl')) );
				return Redirect::to_route('adminnewuser');
			}

			else{//validation fails, show errors!
				return Redirect::to_route('adminnewuser')->with_errors($validation);
			}
		}							
		else 							/**< when authentication fails for admin return to the login page */
			return Redirect::to('login');							
	}

	/**
	 * search for all matching users
	 */
	public function post_searchuser(){
		if(Admin::authenticate()){
			$searchinput = Input::get('input');
			Session::flash('searchinput', $searchinput); /**< set a flash message to determine in gebruiker.blade.php if there was a search or not */
			$employees = DB::table('employees')	 		
			 	->where('lastname', 'LIKE', '%' . $searchinput . '%')
			 	->or_where('firstname', 'LIKE', '%' . $searchinput . '%')
			 	->paginate(15);
			return View::make('layouts.admincontents.gebruiker')->with('employees', $employees);
		}
		else
			return Redirect::to('login');	
	}

	/**
	 * confirmation needed before actual delete
	 */
	public function get_modaldelete($userid){
		if(Admin::authenticate()){
			Session::flash('userid', $userid);
			// TODO: show the name of the selected user...
			return View::make('layouts.admincontents.modaldelete');
		}
		else
			return Redirect::to('login');	
	}

	/**
	 *  delete(user) confirmation or cancelation by admin
	 */
	public function post_deleteconfirmed(){ // user gets deleted after confirmation
		if(Admin::authenticate()){
			// control whitch button is clicked (Cancel or Delete)
			if ( Input::get('action') === 'Cancel' )
			{
				Session::forget('userid');
			  return Redirect::to_route('admingebruiker');
			}
			if ( Input::get('action') === 'Delete' )// TODO: check wether cascading delete or not...for related tables
			{
				$id = Session::get('userid');
				$affected = Employee::modaldelete($id);
				if($affected === 1)
			  		Session::flash('message', 'Succes!');
			  	else
			  		Session::flash('messagefail', 'no succes :-(');
			  	return Redirect::to_route('admingebruiker');
			}			
		}
		else
			return Redirect::to('login');	
	}

	/**
	 * show user content possible to change
	 */
	public function get_editform($id){
		if(Admin::authenticate()){
			$user = Employee::find($id);
			Session::flash('userid', $id);
			return View::make('layouts.admincontents.edituser')
				->with('username', $user->username)
				->with('firstname', $user->firstname)
				->with('lastname', $user->lastname)
				->with('email', $user->email)
				->with('type', $user->type)
				->with('menucredit', $user->menucredit)
				->with('creditlimit', $user->creditlimit)
				->with('status', $user->status);
		}
		else
			return Redirect::to('login');
	}

	/**
	 * save the changes made to this specific user
	 */
	public function post_editform(){		//TODO: code is incompleet to save changes!!!
		if(Admin::authenticate()){
			$input=Input::all();
			$rules = array(
					'username' => 'required|alpha_dash|max:50',
					'firstname' => 'required|alpha|max:100',
					'lastname' => 'required|alpha|max:100',
					'email' => 'required|email',
					'type' => 'required',
					'menucredit' => 'required|alpha_num|max:2',
					'creditlimit' => 'required|alpha_num|max:2',
					'status' => 'required'
				);
			
			$validation=Validator::make($input, $rules);
			if($validation->passes()){
				$id=Session::get('userid');
				$user=Employee::find($id);

				if(strcmp($user->username, Input::get('username')) !== 0){
					$user->username = Input::get('username'); //sets the new username
				}
				$user->firstname = Input::get('firstname');
				$user->lastname = Input::get('lastname');
				if(strcmp($user->email, Input::get('email')) !== 0){
					$user->email = Input::get('email');
				}
				$user->type = Input::get('type');
				$user->menucredit = Input::get('menucredit');
				$user->creditlimit = Input::get('creditlimit');
				$user->status = Input::get('status');

				if($user->save()){//the data is stored succesfully
					//add success message					
					Session::flash('message', Lang::line('flashmessages.dataupdatesuccess')->get(Session::get('language', 'nl')) );
					return Redirect::to('home_admin/edit/'.$id);
				}
				else{//the new password has not been saved successfully, add message to contact admin
					Session::flash('messagefail', Lang::line('flashmessages.dataupdatefail')->get(Session::get('language', 'nl')) );
					return Redirect::to('home_admin/edit/'.$id);
				}
			}
			else{
				return Redirect::to('home_admin/edit/'.$id)->with_errors($validation);
			}
		}
		else
			return Redirect::to('login');
	}

/**
 * change the password of a specificc user (in case of forgotten by user)
 */
	public function post_passwordof(){ //needs to be adapted
		if(Admin::authenticate()){
			$input=Input::all();
			$rules = array(
					'password' => 'required|alpha_num|between:4,16|confirmed',
					'password_confirmation' => 'required|alpha_num|between:4,16'
				);
			
			$validation=Validator::make($input, $rules);
			if($validation->passes()){
				$newpass=Input::get('password');
				$id=Session::get('userid');
				$user=Employee::find($id);
					$user->password=Hash::make($newpass); //sets the new password
					if($user->save()){//the new password is stored succesfully
						//add success message					
						Session::flash('message', Lang::line('flashmessages.passwordupdatesuccess')->get(Session::get('language', 'nl')) );
						return Redirect::to('home_admin/edit/'.$id);
					}
					else{//the new password has not been saved successfully, add message to contact admin
						Session::flash('messagefail', Lang::line('flashmessages.passwordupdatefail')->get(Session::get('language', 'nl')) );
						return Redirect::to('home_admin/edit/'.$id);
					}
				}
			else{
				return Redirect::to('home_admin/edit/'.$id)->with_errors($validation);
			}
		}							
		else
			return Redirect::to('login');		
	}

}