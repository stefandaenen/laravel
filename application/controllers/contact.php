<?php
class Contact_Controller extends Base_Controller{
	
	public function action_send(){
		//validate form entries

		$validation = Contact::validate(Input::all());

		if($validation->passes()){
			//send mail logic from message bundle...		

			Message::send(function($message)
			{

				$name = Input::get('name');
				$from = Input::get('email');
				$body = Input::get('message');	

			    $message->to('stefan.daenen@gmail.com');
			    
			    $message->from($from, $name);
			    $message->subject('Hello!');
			    $message->body($body);
			});

			if(Message::was_sent())
			{
			   	//show that mail was send successfully
				return View::make('layouts.contactcontents.contactsucces');
			}


		}
		else{
			return Redirect::to_route('gebruikercontact')->with_errors($validation)->with_input();
		}

	}

}