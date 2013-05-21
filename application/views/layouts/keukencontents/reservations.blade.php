@layout('home/home_keuken')

@section('selectedContent')

  <div class="hero-unit">
	<h1>{{ Lang::line('menu.reservations')->get(Session::get('language', 'nl')) }}</h1>
  </div>

@endsection