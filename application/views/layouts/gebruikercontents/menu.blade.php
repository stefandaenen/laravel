@layout('home/home_gebruiker')

@section('selectedContent')
	{{Form::open('/')}}
		{{Form::label('menu', 'gebruiker_menu');}}
		menu selected in gebruiker view
	{{Form::close()}}
@endsection