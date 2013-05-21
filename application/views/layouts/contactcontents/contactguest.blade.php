@layout('layouts/master')

@section('title')
	Login
@endsection

@section('nav')
	
	
@endsection


@section('login')
	{{Form::open('login/checklogin', 'POST', array('class' => 'navbar-form pull-right'))}}
    <?php $login=Lang::line('menu.login')->get(Session::get('language', 'nl')); ?>   
		{{Form::text('login', Input::old('login'), array('placeholder' => $login))}}
    <?php $password=Lang::line('menu.password')->get(Session::get('language', 'nl')); ?> 
		{{Form::password('password', array('placeholder' => $password))}}
    <?php $loginbutton=Lang::line('menu.loginbutton')->get(Session::get('language', 'en')); ?> 
		{{Form::submit($loginbutton)}}
	{{Form::close()}}
@endsection

@section('content')
	      <!-- Main hero unit for a primary marketing message or call to action -->
  <div class="hero-unit">

    <figure>

          {{ HTML::image('img/kmi_web144_light.png', 'alt. KMI_IRM-image', array('class'=>'textwrapleft')) }}
          
    </figure>
    
     <h1>{{Lang::line('contact.hello')->get(Session::get('language', 'nl'))}}</h1>
        <h2>{{Lang::line('contact.contactintro')->get(Session::get('language', 'nl'))}}</h2>
    </br>
    
     @if($errors->has())
        <div class="alert alert-error">
          <button type="button" class="close" data-dismiss="alert">&times;</button>
          <p>{{Lang::line('contact.errorsinfo')->get(Session::get('language', 'nl'))}}</p>
          <ul id="form-errors">
            {{ $errors->first('name', '<li>:message</li>')}}
            {{ $errors->first('email', '<li>:message</li>')}}
            {{ $errors->first('message', '<li>:message</li>')}}
            {{ $errors->first('captcha', '<li>:message</li>')}}
          </ul>
        </div>  
        @endif

      {{Form::open('contact/guest', 'POST')}}
        <div class="controls controls-row">
          <?php $name=Lang::line('contact.name')->get(Session::get('language', 'nl')); ?> 
        {{Form::text('name', Input::old('name'),array('placeholder' => $name,'id'=>'name'))}}

        <?php $email=Lang::line('contact.email')->get(Session::get('language', 'nl'));?>
        {{Form::text('email',Input::old('email'), array('placeholder' => $email, 'id'=>'email'))}}
      </div>
      <div class="controls">
        <?php $content=Lang::line('contact.content')->get(Session::get('language', 'nl'));?>
        {{Form::textarea('message', Input::old('message'), array('class'=>'span6', 'placeholder' => $content, 'id'=>'content'))}}
      </div>

      <div class="controls">
          {{Form::text('captcha', '', array('class' => 'captchainput', 'placeholder' => 'Insert captcha...'));}}
          {{Form::image(CoolCaptcha\Captcha::img(), 'captcha', array('class' => 'captchaimg'));}}
      </div>
        
        <div class="controls">  
          <?php $send=Lang::line('contact.send')->get(Session::get('language', 'nl')); ?>
        {{Form::submit($send, array('id'=>'contact-submit', 'class'=>'btn btn-primary input-medium pull-right'))}}
      </div>    
    {{Form::close()}}
 
      </div>    

      <hr>
@endsection