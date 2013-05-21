@layout('home/home_admin')

@section('selectedContent')
	{{Form::open('/')}}
		{{Form::label('home', 'Home_Page');}}
		blabla
	{{Form::close()}}
@endsection