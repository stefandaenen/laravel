@layout('home/home_admin')

@section('selectedContent')
	{{Form::open('/')}}
		{{Form::label('menu', 'Admin_Menu');}}
		menu Menu selected in admin view
	{{Form::close()}}
@endsection