<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Simply tell Laravel the HTTP verbs and URIs it should respond to. It is a
| breeze to setup your application using Laravel's RESTful routing and it
| is perfectly suited for building large applications and simple APIs.
|
| Let's respond to a simple GET request to http://example.com/hello:
|
|		Route::get('hello', function()
|		{
|			return 'Hello World!';
|		});
|
| You can even respond to more than one URI:
|
|		Route::post(array('hello', 'world'), function()
|		{
|			return 'Hello World!';
|		});
|
| It's easy to allow URI wildcards using (:num) or (:any):
|
|		Route::put('hello/(:any)', function($name)
|		{
|			return "Welcome, $name.";
|		});
|
*/

Route::get('/', array('as'=>'home', 'uses'=>'login@index'));

Route::get('login/checklogin', array('uses'=>'login@checklogin'));
Route::get('logout/checklogout', 'login@checklogout');
Route::get('language/(:any)/(:any)', 'home@language');
Route::get('contact/guest', array('as'=>'guestcontact', 'uses' => 'home@guest'));
Route::post('contact/guest', function(){
	$rules = array(
        'captcha' => 'coolcaptcha|required'
    );
    $messages = array(
        'coolcaptcha' => 'Invalid captcha',
    );

    $validation = Validator::make(Input::all(), $rules, $messages);

    if ($validation->valid())
    {
        // valid captcha
    	$validation = Contact::validate(Input::all());

		if($validation->passes()){
			//send mail logic from message bundle...		

			Message::send(function($message)
			{

				$name = Input::get('name');
				$from = Input::get('email');
				$body = Input::get('message');	

			    $message->to('stefan.daenen@student.phl.be');			    
			    $message->from($from, $name);
			    $message->subject('Hello!');
			    $message->body($body);
			});

			if(Message::was_sent())
			{
			   	//show that mail was send successfully
				return View::make('layouts.contactcontents.contactguestsuccess');
			}


		}
		else{
			return Redirect::to_route('guestcontact')->with_errors($validation)->with_input();
		}
    } else
    {
        return Redirect::to('contact/guest')->with_errors($validation)->with_input();
    }
});
// Route::post('home_gebruiker/password', array('as'=>'updatepassword', 'uses'=>'home@updatepassword'));


Route::group( array('before' => 'auth'), function(){
	Route::get('home_admin', array('as' => 'adminhome', 'uses' => 'homeadmin@index'));
	Route::get('home_admin/lijst', array('as' => 'adminlijst', 'uses' => 'homeadmin@lijst'));
	Route::get('home_admin/gebruiker', array('as' => 'admingebruiker', 'uses' => 'homeadmin@gebruiker'));
	Route::get('home_admin/menu', array('as' => 'adminmenu', 'uses' => 'homeadmin@menu'));
	Route::get('home_admin/broodjes', array('as' => 'adminbroodjes', 'uses' => 'homeadmin@broodjes'));
	Route::get('home_admin/profile', array('as' => 'adminprofile', 'uses' => 'homeadmin@profile'));
	Route::post('home_admin/profile', array('as' => 'adminprofile', 'uses' => 'homeadmin@profile'));
	Route::get('home_admin/password', array('as' => 'adminpassword', 'uses' => 'homeadmin@password'));
	Route::post('home_admin/password', array('as' => 'adminpassword', 'uses' => 'homeadmin@password'));
	Route::get('home_admin/reservations', array('as' => 'adminreservations', 'uses' => 'homeadmin@reservations'));
	Route::get('home_admin/favorites', array('as' => 'adminfavorites', 'uses' => 'homeadmin@favorites'));
	Route::get('home_admin/newuser', array('as' => 'adminnewuser', 'uses' => 'homeadmin@newuser'));
	Route::post('home_admin/newuser', array('as' => 'adminnewuser', 'uses' => 'homeadmin@newuser'));
	Route::post('home_admin/savenewuser', array('as' => 'adminsavenewuser', 'uses' => 'homeadmin@savenewuser'));
	Route::post('home_admin/searchuser', array('as' => 'adminsearchuser', 'uses' => 'homeadmin@searchuser'));
	Route::get('admin/delete/(:num)', array('uses' => 'homeadmin@modaldelete'));
	Route::post('home_admin/deleteconfirmed', array('uses' => 'homeadmin@deleteconfirmed'));
	Route::get('home_admin/edit/(:num)', array('uses' => 'homeadmin@editform'));
	Route::post('home_admin/editform', array('uses' => 'homeadmin@editform'));
	Route::post('home_admin/passwordof', array('uses' => 'homeadmin@passwordof'));

	Route::get('home_keuken', array('as' => 'keukenhome', 'uses' => 'homekeuken@index'));
	Route::get('home_keuken/lijst', array('as' => 'keukenlijst', 'uses' => 'homekeuken@lijst'));
	Route::get('home_keuken/menu', array('as' => 'keukenmenu', 'uses' => 'homekeuken@menu'));
	Route::get('home_keuken/broodjes', array('as' => 'keukenbroodjes', 'uses' => 'homekeuken@broodjes'));
	Route::get('home_keuken/profile', array('as' => 'keukenprofile', 'uses' => 'homekeuken@profile'));
	Route::post('home_keuken/profile', array('as' => 'keukenprofile', 'uses' => 'homekeuken@profile'));
	Route::get('home_keuken/password', array('as' => 'keukenpassword', 'uses' => 'homekeuken@password'));
	Route::post('home_keuken/password', array('as' => 'keukenpassword', 'uses' => 'homekeuken@password'));
	Route::get('home_keuken/reservations', array('as' => 'keukenreservations', 'uses' => 'homekeuken@reservations'));
	Route::get('home_keuken/favorites', array('as' => 'keukenfavorites', 'uses' => 'homekeuken@favorites'));

	Route::get('home_gebruiker', array('as' => 'gebruikerhome', 'uses' => 'homegebruiker@index'));
	Route::get('home_gebruiker/menu', array('as' => 'gebruikermenu', 'uses' => 'homegebruiker@menu'));
	Route::get('home_gebruiker/broodjes', array('as' => 'gebruikerbroodjes', 'uses' => 'homegebruiker@broodjes'));
	Route::get('home_gebruiker/profile', array('as' => 'gebruikerprofile', 'uses' => 'homegebruiker@profile'));
	Route::post('home_gebruiker/profile', array('as' => 'gebruikerprofile', 'uses' => 'homegebruiker@profile'));
	Route::get('home_gebruiker/password', array('as' => 'gebruikerpassword', 'uses' => 'homegebruiker@password'));
	Route::post('home_gebruiker/password', array('as' => 'gebruikerpassword', 'uses' => 'homegebruiker@password'));
	// Route::post('home_gebruiker/password', function(){
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
	// 				//add success message					
	// 				Session::flash('message', {{ Lang::line('flashmessages.passwordupdatesuccess')->get(Session::get('language', 'nl')) }});
	// 				return Redirect::to_route('gebruikerpassword');
	// 			}
	// 			else{//the new password has not been saved successfully, add message to contact admin
	// 				return Redirect::to_route('gebruikerpassword');
	// 			}
	// 		}
	// 		else{//the user doesn't exist
	// 			return View::make('home.login');
	// 		}
	// 	}
	// 	else{
	// 		return Redirect::to_route('gebruikerpassword')->with_errors($validation);
	// 	}
	// });
	Route::get('home_gebruiker/reservations', array('as' => 'gebruikerreservations', 'uses' => 'homegebruiker@reservations'));
	Route::get('home_gebruiker/favorites', array('as' => 'gebruikerfavorites', 'uses' => 'homegebruiker@favorites'));
	Route::get('home_gebruiker/contact', array('as' => 'gebruikercontact', 'uses' => 'homegebruiker@contact'));
	Route::get('contact/send', array('as' => 'contactsuccess', 'uses' => 'contact@send'));

});



Route::get('login', array('as' => 'login', 'uses' => 'home@login'));


Route::controller('login');
Route::controller('homeadmin');
Route::controller('homegebruiker');
Route::controller('homekeuken');
Route::controller('homeadmin');
Route::controller('contact');
//Route::controller('home');
/*
|--------------------------------------------------------------------------
| Application 404 & 500 Error Handlers
|--------------------------------------------------------------------------
|
| To centralize and simplify 404 handling, Laravel uses an awesome event
| system to retrieve the response. Feel free to modify this function to
| your tastes and the needs of your application.
|
| Similarly, we use an event to handle the display of 500 level errors
| within the application. These errors are fired when there is an
| uncaught exception thrown in the application.
|
*/

Event::listen('404', function()
{
	return Response::error('404');
});

Event::listen('500', function()
{
	return Response::error('500');
});

/*
|--------------------------------------------------------------------------
| Route Filters
|--------------------------------------------------------------------------
|
| Filters provide a convenient method for attaching functionality to your
| routes. The built-in before and after filters are called before and
| after every request to your application, and you may even create
| other filters that can be attached to individual routes.
|
| Let's walk through an example...
|
| First, define a filter:
|
|		Route::filter('filter', function()
|		{
|			return 'Filtered!';
|		});
|
| Next, attach the filter to a route:
|
|		Route::get('/', array('before' => 'filter', function()
|		{
|			return 'Hello World!';
|		}));
|
*/

Route::filter('before', function()
{
	// Do stuff before every request to your application...
});

Route::filter('after', function($response)
{
	// Do stuff after every request to your application...
});

Route::filter('csrf', function()
{
	if (Request::forged()) return Response::error('500');
});

Route::filter('auth', function()
{
	if (Auth::guest()) return Redirect::to('login');
});