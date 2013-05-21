@layout('home/home_gebruiker')

@section('selectedContent')
	{{Form::open('/')}}
		{{Form::label('home', 'gebruiker_home');}}
		home view for gebruiker
	{{Form::close()}}
@endsection