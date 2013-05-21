@layout('layouts/master')

@section('title')
	OnlineMenu
@endsection

@section('homelink')
  <a class="brand" href="/laravel/public/home_keuken">OnlineMenu </a>
@endsection

@section('nav')
	<li>{{ HTML::link('/home_gebruiker/menu', Lang::line('menu.menu')->get(Session::get('language', 'nl')))}}</li>
	<li>{{ HTML::link('/home_gebruiker/broodjes', Lang::line('menu.broodjes')->get(Session::get('language', 'nl')))}}</li>
	<li class="dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown">{{Lang::line('menu.account')->get(Session::get('language', 'nl'));}} <b class="caret"></b></a>
        <ul class="dropdown-menu">
          <li>{{ HTML::link('/home_gebruiker/profile', Lang::line('menu.profile')->get(Session::get('language', 'nl')))}}</li>
          <li>{{ HTML::link('/home_gebruiker/password', Lang::line('menu.passwordupdate')->get(Session::get('language', 'nl')))}}</li>
          <li>{{ HTML::link('/home_gebruiker/reservations', Lang::line('menu.reservations')->get(Session::get('language', 'nl')))}}</li>
          <li>{{ HTML::link('/home_gebruiker/favorites', Lang::line('menu.favorites')->get(Session::get('language', 'nl')))}}</li>
        </ul>
    </li>
	<li>{{ HTML::link('/home_gebruiker/contact', 'Contact')}}</li>	
	<li class="dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown">{{Lang::line('menu.taal')->get(Session::get('language', 'nl'));}} <b class="caret"></b></a>
        <ul class="dropdown-menu">
          <li>{{ HTML::link('/language/en/home_gebruiker', 'en')}}</li>
          <li>{{ HTML::link('/language/fr/home_gebruiker', 'fr')}}</li>
          <li>{{ HTML::link('/language/nl/home_gebruiker', 'nl')}}</li>                  
        </ul>
    </li>
@endsection

@section('login')
	{{ Form::open('login/checklogout', 'POST', array('class' => 'navbar-form pull-right')) }}
		<?php $logoutbutton=Lang::line('menu.logoutbutton')->get(Session::get('language', 'nl')); ?> 
		{{ Form::submit($logoutbutton) }}
	{{ Form::close() }}
@endsection

@section('content')
	@yield('selectedContent')
@endsection