@layout('home/home_admin')

@section('selectedContent')
	{{Form::open('/')}}
		{{Form::label('account', 'Admin_account');}}
		menu account selected in admin view
	{{Form::close()}}
@endsection