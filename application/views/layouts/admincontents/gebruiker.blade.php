@layout('home/home_admin')

@section('selectedContent')
	<div class="hero-unit">
		<p>{{Lang::line('useradminpage.useradministrationpage')->get(Session::get('language', 'nl'))}}</p>

		<div class="btn-toolbar">

<!-- Search -->
		    {{ Form::open('home_admin/searchuser', 'POST', array('class'=>'form-search')) }}
		    	<div class="input-append">
		    		{{ $searchfor = Lang::line('useradminpage.searchfor')->get(Session::get('language', 'nl')) }}
		    	{{ Form::text('input', Input::old('input'), array('class'=>'input-medium search-query', 'placeholder'=>$searchfor))}}
		    		{{ $search =Lang::line('useradminpage.search')->get(Session::get('language', 'nl')) }}
		    	{{ HTML::decode(Form::button('<i class="icon-search"></i> <strong>'.$search.'</strong>', array('class' => 'btn'))) }}    	
		    	</div>
		    {{ Form::close() }}
<!-- New user button -->
		    {{ Form::open('home_admin/newuser', 'POST', array('class'=>'navbar-form pull-right')) }}
		    	{{ $newuser =Lang::line('useradminpage.newuser')->get(Session::get('language', 'nl')) }}
		    	{{ HTML::decode(Form::button('<i class="icon-user"></i> <strong>'.$newuser.'</strong>', array('class' => 'btn btn-primary'))) }}
		    {{ Form::close() }}
		</div>
<!-- Show usertable -->
		<div class="well">
		<!-- show flash messages -->
			 	@if(Session::has('message'))
			 		<div class="alert alert-success">
					  <p id="message">{{Session::get('message')}}</p>
					</div>
				@elseif(Session::has('messagefail'))
					<div class="alert alert-error">
					  <p id="message">{{Session::get('messagefail')}}</p>
					</div>		
		 		@endif
		    <table class="table table-striped">
		      <thead>
		        <tr>
		          <th>#</th>
		          <th>{{Lang::line('useradminpage.lastname')->get(Session::get('language', 'nl'))}}</th>
		          <th>{{Lang::line('useradminpage.firstname')->get(Session::get('language', 'nl'))}}</th>
		          <th>{{Lang::line('useradminpage.username')->get(Session::get('language', 'nl'))}}</th>
		          <th>{{Lang::line('useradminpage.edit')->get(Session::get('language', 'nl'))}}</th>
		          <th>{{Lang::line('useradminpage.delete')->get(Session::get('language', 'nl'))}}</th>
		          <!-- <th>Details</th> -->
		          <th style="width: 36px;"></th>
		        </tr>
		      </thead>
<!-- When someone entered a search, shhow it here -->
		 @if(Session::has('searchinput'))
		 	 <tbody>
			 	<?php $searchinput = Session::get('searchinput'); ?>
			 	<?php $line=0; ?>
				<?php foreach ($employees->results as $employee): ?>
					<?php $line++; ?>
					<tr>
						<td><?php echo $line ?></td>
		      			<td><?php echo $employee->lastname; ?></td>
		      			<td><?php echo $employee->firstname; ?></td>		      			
			    		<td><?php echo $employee->username; ?></td>
		      			<td><?php echo HTML::decode(HTML::link('home_admin/edit/'.$employee->id, '<i class="icon-pencil"></i>' )); ?></td>
		      			<td><?php echo HTML::decode(HTML::link('admin/delete/'.$employee->id, '<i class="icon-trash"></i>' )); ?></td>
		      			<!-- <td><a href="#myModal" role="button" data-toggle="modal"><i class="icon-trash"></i></a></td> -->
		      			<!-- <td><?php echo HTML::decode(HTML::link('admin/details/'.$employee->id, '<i class="icon-plus-sign"></i>' )); ?></td> -->
			    	</tr>
				<?php endforeach; ?> 
				<?php if ($line === 0) {
					echo Lang::line('flashmessages.nosearchresult')->get(Session::get('language', 'nl'));
				}?>   
  
		      </tbody>
		    
<!-- else Show all users  -->
		 @else
		      <tbody>
		      	
		      	<?php $line=0; ?>
				<?php foreach ($employees->results as $employee): ?>
					<?php $line++; ?>
					<tr>
						<td><?php echo $line ?></td>
		      			<td><?php echo $employee->lastname; ?></td>
		      			<td><?php echo $employee->firstname; ?></td>		      			
			    		<td><?php echo $employee->username; ?></td>
		      			<td><?php echo HTML::decode(HTML::link('home_admin/edit/'.$employee->id, '<i class="icon-pencil"></i>' )); ?></td>
		      			<!-- <td><a href="#myModal" role="button" data-toggle="modal" id={{$employee->id}}><i class="icon-trash"></i></a></td> -->
		      			<td><?php echo HTML::decode(HTML::link('admin/delete/'.$employee->id, '<i class="icon-trash"></i>' )); ?></td>
		      			<!-- <td><?php echo HTML::decode(HTML::link('admin/details/'.$employee->id, '<i class="icon-plus-sign"></i>' )); ?></td> -->
			    	</tr>
				<?php endforeach; ?>        
		      </tbody>
		@endif
		    </table>
		</div>
		<?php echo $employees->links(); ?>	 <!-- pagination -->

		<!-- TODO: pass the employee id to delete... problem to pass id ... modal not used now -->
		<div class="modal small hide fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		    <div class="modal-header">
		        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
		        <h3 id="myModalLabel">Delete Confirmation</h3>
		    </div>
		    <div class="modal-body">
		        <p class="error-text">Are you sure you want to delete the user? </p>
		    </div>
		    <div class="modal-footer">
		        <button class="btn" data-dismiss="modal" aria-hidden="true">Cancel</button>
		        <button class="btn btn-danger" data-dismiss="modal" >Delete</button>
		    </div>
		</div>

	</div>
@endsection