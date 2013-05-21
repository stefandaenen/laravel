@layout('home/home_admin')

@section('selectedContent')
	{{Form::open('/')}}
		{{Form::label('lijst', 'Admin_lijst');}}
		menu lijst selected in admin view
	{{Form::close()}}
@endsection