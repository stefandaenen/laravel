@layout('layouts/admincontents/useradmintemplate')

@section('innertitle')
  <p>{{ Lang::line('useradminpage.newuser')->get(Session::get('language', 'nl')) }}</p>
@endsection

@section('useradmincontent')

	    {{ Form::open('home_admin/savenewuser', 'POST') }}
      <p>
        {{ Form::label('username', Lang::line('useradminpage.username')->get(Session::get('language', 'nl')))}}
        {{ Form::text('username', Input::old('username'), array('class'=>'input-xlarge'))}}
      </p>
      <p>
        {{ Form::label('firstname', Lang::line('useradminpage.firstname')->get(Session::get('language', 'nl')))}}
        {{ Form::text('firstname', Input::old('firstname'), array('class'=>'input-xlarge'))}}
      </p>
      <p>
        {{ Form::label('lastname', Lang::line('useradminpage.lastname')->get(Session::get('language', 'nl')))}}
        {{ Form::text('lastname', Input::old('lastname'), array('class'=>'input-xlarge'))}}
      </p>
      <p>
        {{ Form::label('email', Lang::line('useradminpage.email')->get(Session::get('language', 'nl')))}}
        {{ Form::text('email', Input::old('email'), array('class'=>'input-xlarge'))}}
      </p>
      <p>
        {{ Form::label('type', Lang::line('useradminpage.type')->get(Session::get('language', 'nl')))}}
        {{Form::select('type', array('gebruiker'=>Lang::line('type.gebruiker')->get(Session::get('language', 'nl')), 'keuken' => Lang::line('type.keuken')->get(Session::get('language', 'nl')), 'admin' => Lang::line('type.admin')->get(Session::get('language', 'nl'))), 'gebruiker'); }}
<!--         <?php 
           echo Form::select('type', array('gebruiker'=>Lang::line('type.gebruiker')->get(Session::get('language', 'nl')), 'keuken' => Lang::line('type.keuken')->get(Session::get('language', 'nl')), 'admin' => Lang::line('type.admin')->get(Session::get('language', 'nl'))), 'gebruiker');
       
        ?> -->
        
      </p>
      <p>
        {{ Form::label('password', Lang::line('useradminpage.newpassword')->get(Session::get('language', 'nl')))}}
        {{ Form::password('password', array('class'=>'input-xlarge'))}}
      </p>
      <p>
        {{ Form::label('password_confirmation', Lang::line('useradminpage.confirmpassword')->get(Session::get('language', 'nl')))}}
        {{ Form::password('password_confirmation', array('class'=>'input-xlarge'))}}
      </p>

      <p>{{ Form::submit(Lang::line('buttons.save')->get(Session::get('language', 'nl')), array('class'=>'btn btn-primary'))}}</p>
    {{ Form::close() }}
  </div>

@endsection