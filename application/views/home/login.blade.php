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

    @if(Session::has('message'))
      <div class="alert alert-success">
        <p id="message">{{Session::get('message')}}</p>
      </div>
    @elseif(Session::has('messagefail'))
      <div class="alert alert-error">
        <p id="message">{{Session::get('messagefail')}}</p>
      </div>
    @endif

  	<!-- controle opde input -->
  	@if($errors->has())
      <div class="alert alert-error">
        <button type="button" class="close" data-dismiss="alert">&times;</button>
    		<p>The following errors occurred:</p>
    		<ul id="form-errors">
    			{{ $errors->first('login', '<li>:message</li>')}}
    			{{ $errors->first('password', '<li>:message</li>')}}
    		</ul>
      </div>
  	@endif
  	

    <h1>{{Lang::line('login.hello')->get(Session::get('language', 'nl'))}}</h1>
    <h2>{{Lang::line('login.welcome')->get(Session::get('language', 'nl'))}}</h2>
    <figure class="move">
      {{ HTML::image('img/kmi_web144_light.png', 'alt. KMI_IRM-image') }}
		</figure>
    
    <h3>{{Lang::line('login.appl')->get(Session::get('language', 'nl'))}}</h3>
    
    <?php $kitchenstaff=Lang::line('login.kitchenstaff')->get(Session::get('language', 'nl')); ?> 
    <h4>{{Lang::line('login.info')->get(Session::get('language', 'nl'))}} {{HTML::link_to_route('guestcontact', $kitchenstaff);}}.</h4>

  </div>

      

      <hr>
@endsection