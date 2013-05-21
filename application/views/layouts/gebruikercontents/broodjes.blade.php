@layout('home/home_gebruiker')

@section('selectedContent')
	{{Form::open('/')}}
		{{Form::label('broodjes', 'gebruiker_broodjes');}}
		broodjes view for gebruiker
	{{Form::close()}}
@endsection