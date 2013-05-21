@layout('home/home_gebruiker')

@section('selectedContent')

      <div class="hero-unit">

		
        <figure>

          {{ HTML::image('img/kmi_web144_light.png', 'alt. KMI_IRM-image', array('class'=>'textwrapleft')) }}
					
		</figure>
		
		 <h1>{{Lang::line('contact.hello')->get(Session::get('language', 'nl'))}}</h1>
        <h2>{{Lang::line('contact.contactintrologgedinuser')->get(Session::get('language', 'nl'))}}</h2>
    </br>
 		
		 @if($errors->has())
		 	<div class="alert alert-error">
		 		<button type="button" class="close" data-dismiss="alert">&times;</button>
				<p>{{Lang::line('contact.errorsinfo')->get(Session::get('language', 'nl'))}}</p>
				<ul id="form-errors">
					{{ $errors->first('name', '<li>:message</li>')}}
					{{ $errors->first('email', '<li>:message</li>')}}
					{{ $errors->first('message', '<li>:message</li>')}}
				</ul>
			</div>
      	@endif

	  	{{Form::open('contact/send', 'POST')}}
	  		<div class="controls controls-row">
				
				<span id="name" class="input-xlarge uneditable-input">{{$name}}</span>
				<span id="email" class="input-xlarge uneditable-input">{{$email}}</span>

			</div>
		 	<div class="controls">
		 		<?php $content=Lang::line('contact.content')->get(Session::get('language', 'nl'));?>
				{{Form::textarea('message', Input::old('message'), array('class'=>'span6', 'placeholder' => $content, 'id'=>'content'))}}
			</div>
	      
	  		<div class="controls">	
	  			<?php $send=Lang::line('contact.send')->get(Session::get('language', 'nl')); ?>
				{{Form::submit($send, array('id'=>'contact-submit', 'class'=>'btn btn-primary input-medium pull-right'))}}
			</div>		
		{{Form::close()}}

      </div>

      <hr>

@endsection