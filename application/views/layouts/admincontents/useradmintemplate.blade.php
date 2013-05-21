@layout('home/home_admin')

@section('selectedContent')

  <div class="hero-unit">

    @yield('innertitle')
    

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
          {{ $errors->first('type', '<li>:message</li>')}}
          {{ $errors->first('password', '<li>:message</li>')}}
          {{ $errors->first('password_confirmation', '<li>:message</li>')}}          
        </ul>
      </div>
    @endif

@yield('useradmincontent')

@endsection