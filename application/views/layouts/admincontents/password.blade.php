@layout('home/home_admin')

@section('selectedContent')

 	<div class="hero-unit">
 		<h1>{{ Lang::line('menu.passwordupdate')->get(Session::get('language', 'nl')) }}</h1>
 		<!-- show when successful -->
 		@if(Session::has('message'))
	 		<div class="alert alert-success">
			  <p id="message">{{Session::get('message')}}</p>
			</div>
		@elseif(Session::has('messagefail'))
			<div class="alert alert-error">
			  <p id="message">{{Session::get('messagefail')}}</p>
			</div>
 		@endif

 			@if($errors->has())
			 	<div class="alert alert-error">
			 		<button type="button" class="close" data-dismiss="alert">&times;</button>
					<p>{{Lang::line('contact.errorsinfo')->get(Session::get('language', 'nl'))}}</p>
					<ul id="form-errors">								
						{{ $errors->first('password', '<li>:message</li>')}}
						{{ $errors->first('password_confirmation', '<li>:message</li>')}}
					</ul>
				</div>
		  	@endif

	  	{{ Form::open('home_admin/password', 'POST', array('id'=>'tab2'))}}

		  	<p>
		  		{{ Form::label('password', 'New password')}}
		  		{{ Form::password('password', array('class'=>'input-xlarge'))}}
		  	</p>

		  	<p>
		  		{{ Form::label('password_confirmation', 'Confirm password')}}
		  		{{ Form::password('password_confirmation', array('class'=>'input-xlarge'))}}
		  	</p>
		  	<p>{{ Form::submit('Update', array('class'=>'btn btn-primary'))}}</p>

		{{ Form::close() }}
	</div>
	
@endsection