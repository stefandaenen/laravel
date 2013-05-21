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
    <div class="hero-unit">
        
        <h1>{{Lang::line('contact.hello')->get(Session::get('language', 'nl'))}}</h1>
        
        <h2>{{Lang::line('contact.messsagesucces')->get(Session::get('language', 'nl'))}}</h2>
        <figure>

          {{ HTML::image('img/kmi_web144_light.png', 'alt. KMI_IRM-image') }}
          
    </figure>
        
        <h3>{{Lang::line('contact.reply')->get(Session::get('language', 'nl'))}}</h3>
        
        
      </div>

      <hr>
@endsection