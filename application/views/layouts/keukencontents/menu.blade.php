@layout('home/home_keuken')

@section('selectedContent')
	{{Form::open('/')}}
		{{Form::label('menu', 'Keuken_menu');}}
		Menu view for keuken
	{{Form::close()}}
@endsection