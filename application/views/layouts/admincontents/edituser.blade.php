@layout('layouts/admincontents/useradmintemplate')

@section('innertitle')
  <p>{{ Lang::line('useradminpage.edituser')->get(Session::get('language', 'nl')) }}</p>
@endsection

@section('useradmincontent')

      {{ Form::open('home_admin/editform', 'POST') }}
      <p>
        {{ Form::label('username', Lang::line('useradminpage.username')->get(Session::get('language', 'nl')))}}
        {{ Form::text('username', $username, array('class'=>'input-xlarge'))}}
      </p>
      <p>
        {{ Form::label('firstname', Lang::line('useradminpage.firstname')->get(Session::get('language', 'nl')))}}
        {{ Form::text('firstname', $firstname, array('class'=>'input-xlarge'))}}
      </p>
      <p>
        {{ Form::label('lastname', Lang::line('useradminpage.lastname')->get(Session::get('language', 'nl')))}}
        {{ Form::text('lastname', $lastname, array('class'=>'input-xlarge'))}}
      </p>
      <p>
        {{ Form::label('email', Lang::line('useradminpage.email')->get(Session::get('language', 'nl')))}}
        {{ Form::text('email', $email, array('class'=>'input-xlarge'))}}
      </p>
      <p>
        {{ Form::label('type', Lang::line('useradminpage.type')->get(Session::get('language', 'nl')))}}
        {{Form::select('type', array('gebruiker'=>Lang::line('type.gebruiker')->get(Session::get('language', 'nl')), 'keuken' => Lang::line('type.keuken')->get(Session::get('language', 'nl')), 'admin' => Lang::line('type.admin')->get(Session::get('language', 'nl'))), Str::lower($type)); }}        
      </p>
      <p>
        {{ Form::label('menucredit', Lang::line('useradminpage.credit')->get(Session::get('language', 'nl')))}}
        {{ Form::text('menucredit', $menucredit, array('class'=>'input-xlarge'))}}
      </p>
      <p>
        {{ Form::label('creditlimit', Lang::line('useradminpage.creditlimit')->get(Session::get('language', 'nl')))}}
        {{ Form::text('creditlimit', $creditlimit, array('class'=>'input-xlarge'))}}
      </p>
      <p>
        {{ Form::label('status', Lang::line('useradminpage.status')->get(Session::get('language', 'nl')))}}
        {{ Form::select('status', array('0'=>'non active', '1'=>'active'), $status); }}        
      </p>
      <p>{{ Form::submit('Save', array('class'=>'btn btn-primary'))}}</p>
      
    {{ Form::close() }}

    <!-- show when successful -->
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
            {{ $errors->first('password', '<li>:message</li>')}}
            {{ $errors->first('password_confirmation', '<li>:message</li>')}}
          </ul>
        </div>
        @endif

     <a href="#myModal" role="button" data-toggle="modal" ><i class="icon-key"></i> Reset Password</a>

      <div class="modal small hide fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <h3 id="myModalLabel">Reset Password for this user.</h3>
        </div>
        <div class="content">
          <?php echo render('layouts.admincontents.dynamicpassword') ?>
        </div>

    </div>

  </div>


    




@endsection