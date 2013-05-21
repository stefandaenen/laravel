@layout('home/home_admin')

@section('selectedContent')
    <div class="hero-unit">
            <?php $id = ''; ?>
            {{ Form::open('home_admin/deleteconfirmed', 'POST') }}
            <div class="header">
                {{Session::keep('userid');}}
                <h3 id="myModalLabel">Lang::line('useradminpage.deleteconfirmation')->get(Session::get('language', 'nl'))</h3>
            </div>
            <div class="body">
                <?php  $id = Session::get('userid'); ?>                            
                <p class="error-text">Lang::line('useradminpage.confirmationquestion')->get(Session::get('language', 'nl')) <?php echo $user=Employee::userfullname($id); ?> </p>
            </div>
            <div class="footer">
                {{ Form::submit(Lang::line('useradminpage.cancel')->get(Session::get('language', 'nl')), array('name' => 'action')) }}
                {{ Form::submit(Lang::line('useradminpage.delete')->get(Session::get('language', 'nl')), array('name' => 'action', 'class' => 'btn btn-danger')) }}
<!--                 <button class="btn" href="home_admin/gebruiker" >Cancel</button>
                <button class="btn btn-danger" href= <?php "home_admin/delete/" . $id ?> >Delete</button> -->
            </div>
        
    </div>
@endsection