<!-- Modal form for teacher account -->   
<div class="modal fade" id="teacherAccountModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    
		<form id="teacher_account_form" ng-controller='teacherAccount' action="<?php echo base_url(); ?>index.php/teacher_account_controller/set_teacher_account" method="post">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title" id="myModalLabel">{{teacherName}}</h4>
				</div> 
				
				<div class="modal-body">

					<div class="form-group">
						<label for="username" class="control-label">Username</label>
						<input type="text" name="username" value="{{username}}" class="form-control" id="username" placeholder="Username">
					</div>     
					
					<div class="form-group">
						<label for="password" class="control-label">Password</label>
						<input type="text" name="password" value="{{password}}" class="form-control" id="password" placeholder="Password">
					</div>    
					
					<input type="hidden" name="teacher_id" value="{{teacherId}}"/>
					
					<input style="display:none" type="text" name="fakeusernameremembered"/>
					<input style="display:none" type="password" name="fakepasswordremembered"/>

				</div>
				
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
					<button type="submit" class="btn btn-primary">Save changes</button>
				</div>
			</div>      
		</form>

  </div>
</div>


<div class="main_container" ng-controller='teacherAccountController'>
	<div class="container">   
		
		<div class="row">   
			<div class="col-md-12">   
				<div class="page-header">
					<h1><span class="teacher_name"><?php echo $last_name . ", " . $first_name . " " . $middle_name;  ?></span> <small>Subjects</small> &nbsp; <button id="<?php echo $this->session->userdata('teacher_id'); ?>" type="button" class="btn btn-info teacher_active_account">Update Account</button></h1> 
				</div>
			</div>  
		</div>         
		
		<div class="my_search_box">
			<div class="row">   
				<div class="col-md-12">  
					<form class="form-inline">
						<div class="form-group">
							<label class="sr-only" for="query">Query</label>
							<input ng-model="query" type="text" class="form-control" id="query" placeholder="Search Subject">
						</div>
					</form>
				</div>  
			</div>  
		</div>   
		
		
		<div class="row">  
			<div class="col-md-12">
			
				<div class="table-responsive">
					<table class="table table-hover">
						<thead>  
							<tr>
								<th>Subject</th>     
								<th>Curriculum</th>     
								<th>Assigned Sections</th>
							</tr>
						</thead>   
						<tbody>   
							<tr ng-repeat="teacherSubject in teacherSubjects | filter: query">
								<td>{{teacherSubject.subject}}</td>      
								<td>{{teacherSubject.curriculum}}</td>     
								<td>  
									<a href="<?php echo base_url(); ?>index.php/teacher_account_subject_sections_controller?teacher_subject_id={{teacherSubject.id}}"><span class="glyphicon glyphicon-search" aria-hidden="true"></span></a>
								</td>  									
							</tr>
						</tbody>
					</table>
				</div>
			
			</div>
		</div>   
		
	
	</div>  
</div> <!-- end main container -->    












