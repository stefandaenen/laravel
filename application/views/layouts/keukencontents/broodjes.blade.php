@layout('home/home_keuken')

@section('selectedContent')
	{{Form::open('/')}}
		{{Form::label('broodjes', 'Keuken_broodjes');}}
		broodjes view for keuken
	{{Form::close()}}
@endsection