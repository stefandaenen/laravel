@layout('home/home_keuken')

@section('selectedContent')
	{{Form::open('/')}}
		{{Form::label('lijst', 'Keuken_lijst');}}
		lijst selected in keuken view
	{{Form::close()}}
@endsection