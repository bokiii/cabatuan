<!-- Model for view Academic Status -->

<div class="modal fade" id="academicStatusModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			
			<form ng-controller='studentAccountAcademic' id="view_academic" id="enrolled" method="post" action="<?php echo base_url(); ?>index.php/students_controller/delete_student_enrolled_academic">
			
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title" id="myModalLabel">Academic Status</h4>
				</div>
				<div class="modal-body">
					
					<table class="table table-hover">
						<thead>  
							<tr>  
								<th>Curriculum Year</th>  
								<th>Section</th>  
								<th>School Year</th>  
								<th>View</th>
							</tr>
						</thead>   
						<tbody>   
							<tr ng-repeat="listAcademic in listAcademics">
								<td>{{listAcademic.curriculum}}</td>
								<td>{{listAcademic.section}}</td>
								<td>{{listAcademic.school_year}}</td>
								<td ng-bind-html="listAcademic.viewLink"></td>
							</tr>  
						</tbody>
					</table>   
					
				</div>   
				
			</form>
			
		</div>
	</div>
</div>  



<!-- Modal for student update account -->     

<!-- Modal for Student Account -->
<div class="modal fade" id="StudentAccountModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    
		<form id="student_account_form" ng-controller='studentAccount' action="<?php echo base_url(); ?>index.php/student_account_controller/set_student_account" method="post">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title" id="myModalLabel">{{studentName}}</h4>
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
					
					<input type="hidden" name="student_id" value="{{studentId}}"/>
					
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



<div class="main_container" id="student_angular_container" ng-controller='studentAccountController'>
	<div class="container">   
		
		<div class="row">  
			<div class="col-md-12"> 
			
				<div class="table-responsive">
					<table class="table table-hover">
						<thead>  
							<tr>
								<th>Student</th>  
								<th>Academic Status</th>    
								<th>Account</th>
							</tr>
						</thead>   
						<tbody>   
							<tr ng-repeat="student in students | filter: query">
								<td class="student_name">{{student.sur_name}}, {{student.first_name}} {{student.middle_name}}</td>   
								<!--<td ng-bind-html="student.viewAcademic"></td>-->     
								<td><a class="btn btn-info" href="<?php echo base_url(); ?>index.php/student_account_controller/get_student_academic_full_list" role="button">View Academic Status</a></td>
								<td>
									<button id="{{student.id}}" type="button" class="btn btn-{{student.button_type}} student_account">{{student.button_value}}</button>
								</td>
							</tr>  
						</tbody>
					</table>
				</div>
			
			</div>
		</div>   
	
	</div>  
</div> <!-- end main container -->    












