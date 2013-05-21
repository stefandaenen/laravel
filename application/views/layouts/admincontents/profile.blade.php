@layout('home/home_admin')

@section('selectedContent')

  <div class="hero-unit">
    <h1>{{ Lang::line('menu.profile')->get(Session::get('language', 'nl')) }}</h1>

    <!-- show succes message or failure -->
    @if(Session::has('message'))
      <div class="alert alert-success">
        <p id="message">{{Session::get('message')}}</p>
      </div>
    @elseif(Session::has('messagefail'))
      <div class="alert alert-error">
        <p id="message">{{Session::get('messagefail')}}</p>
      </div>
    @endif

    @if($errors->has())
      <div class="alert alert-error">
        <button type="button" class="close" data-dismiss="alert">&times;</button>
        <p>{{Lang::line('contact.errorsinfo')->get(Session::get('language', 'nl'))}}</p>
        <ul id="form-errors">               
          {{ $errors->first('username', '<li>:message</li>')}}
          {{ $errors->first('firstname', '<li>:message</li>')}}
          {{ $errors->first('lastname', '<li>:message</li>')}}
          {{ $errors->first('email', '<li>:message</li>')}}
        </ul>
      </div>
    @endif

    {{ Form::open('home_admin/profile', 'POST', array('id'=>'tab'))}}
      <p>
        {{ Form::label('username', 'Username')}}
        {{ Form::text('username', $name, array('class'=>'input-xlarge'))}}
      </p>
      <p>
        {{ Form::label('firstname', 'Firstname')}}
        {{ Form::text('firstname', $firstname, array('class'=>'input-xlarge'))}}
      </p>
      <p>
        {{ Form::label('lastname', 'Lastname')}}
        {{ Form::text('lastname', $lastname, array('class'=>'input-xlarge'))}}
      </p>
      <p>
        {{ Form::label('email', 'Email')}}
        {{ Form::text('email', $email, array('class'=>'input-xlarge'))}}
      </p>
      <p>{{ Form::submit('Update', array('class'=>'btn btn-primary'))}}</p>
    {{ Form::close() }}
  </div>

@endsection