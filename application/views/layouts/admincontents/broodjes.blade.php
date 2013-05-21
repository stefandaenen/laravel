@layout('home/home_admin')

@section('selectedContent')
	{{Form::open('/')}}
		{{Form::label('broodjes', 'Admin_broodjes');}}
		menu broodjes selected in admin view
	{{Form::close()}}
@endsection