@layout('home/home_gebruiker')

@section('selectedContent')

  <div class="hero-unit">
	<h1>{{ Lang::line('menu.reservations')->get(Session::get('language', 'nl')) }}</h1>
  </div>

@endsection