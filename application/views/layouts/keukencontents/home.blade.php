@layout('home/home_keuken')

@section('selectedContent')
	{{Form::open('/')}}
		{{Form::label('home', 'Keuken_home');}}
		Home view for keuken
	{{Form::close()}}
@endsection