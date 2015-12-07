<!-- Modal form for add -->
<div class="modal fade" id="myAddModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<form id="modal_add_form" action="<?php echo base_url(); ?>index.php/students_controller/add_student" method="post">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title" id="myModalLabel">Student</h4>
				</div>
				<div class="modal-body">  
					
					<div class="row" id="studentAddModal">     
						<div class="col-md-6">  
							
							<div class="row">   
								<div class="col-md-4">   
									<div class="form-group">
										<label for="sur_name">Sur Name</label>
										<input type="text" class="form-control" name="sur_name" id="sur_name" placeholder="Sur Name">
									</div>
								</div>   
								
								<div class="col-md-4">   
									<div class="form-group">
										<label for="first_name">First Name</label>
										<input type="text" class="form-control" name="first_name" id="first_name" placeholder="First Name">
									</div>
								
								</div>   
								
								<div class="col-md-4">     
									<div class="form-group">
										<label for="middle_name">Middle Name</label>
										<input type="text" class="form-control" name="middle_name" id="middle_name" placeholder="Middle Name">
									</div>
								</div>   
							</div>    
							
							<div class="form-group">
								<label for="lrn">LRN</label>
								<input type="text" class="form-control" name="lrn" id="lrn" placeholder="LRN">
							</div>  
							
							<div class="form-group">
								<label for="sex">Sex</label>
								<input type="text" class="form-control" name="sex" id="sex" placeholder="Sex">
							</div>  
							
							<div class="form-group">
								<label for="date_of_birth">Date of Birth</label>
								<div class='input-group date' id='add_birth_date_picker'>
									<input type='text' name="date_of_birth" id="date_of_birth" class="form-control" placeholder="Date of Birth" />
									<span class="input-group-addon">
										<span class="glyphicon glyphicon-calendar"></span>
									</span>
								</div>
							
							</div>   
							
							<div class="form-group">
								<label for="place_of_birth">Place of Birth</label>
								<input type="text" class="form-control" name="place_of_birth" id="place_of_birth" placeholder="Place of Birth">
							</div>
						
							<div class="form-group">
								<label for="age">Age</label>
								<input readonly type="text" class="form-control" name="age" id="age" placeholder="Age">
							</div>
							
							<div class="form-group">
								<label for="present_address">Present Address</label>
								<input type="text" class="form-control" name="present_address" id="present_address" placeholder="Present Address">
							</div>   
							
							<div class="form-group">
								<label for="school_last_attended">School Last Attended</label>
								<input type="text" class="form-control" name="school_last_attended" id="school_last_attended" placeholder="School Last Attended">
							</div>    
							
							<div class="form-group">
								<label for="school_address">School Address</label>
								<input type="text" class="form-control" name="school_address" id="school_address" placeholder="School Address">
							</div>   
						</div>    
						
						<div class="col-md-6">   
							
							<div class="form-group">
								<label for="grade_or_year_level">Grade/Year Level</label>
								<input type="text" class="form-control" name="grade_or_year_level" id="grade_or_year_level" placeholder="Grade/Year Level">
							</div>      
							
							<div class="form-group">
								<label for="school_year">School Year</label>
								<input type="text" class="form-control" name="school_year" id="school_year" placeholder="School Year">
							</div>    	   

							<div class="form-group">
								<label for="tve_specialization">TVE Specialization (for Grade 9 and 4th Yr. Student Only)</label>
								<input type="text" class="form-control" name="tve_specialization" id="tve_specialization" placeholder="TVE Specialization (for Grade 9 and 4th Yr. Student Only)">
							</div>    	
							
							<div class="form-group">
								<label for="father">Father</label>
								<input type="text" class="form-control" name="father" id="father" placeholder="Father">
							</div>       
							
							<div class="form-group">
								<label for="mother">Mother</label>
								<input type="text" class="form-control" name="mother" id="mother" placeholder="Mother">
							</div>      
							
							<div class="form-group">
								<label for="person_to_notify">Person to Notify in Case of Emergency/Guardian</label>
								<input type="text" class="form-control" name="person_to_notify" id="person_to_notify" placeholder="Person to Notify">
							</div>    
							
							<div class="form-group">
								<label for="address">Address</label>
								<input type="text" class="form-control" name="address" id="address" placeholder="Address">
							</div>  
							
							<div class="form-group">
								<label for="contact_number">Tel. #/Cell #</label>
								<input type="text" class="form-control" name="contact_number" id="contact_number" placeholder="Tel. #/Cell #">
							</div> 
							
						</div>
						
					</div>   
					
					<div class='my_alert_container'>  
					</div>
					
				</div>  
				
				<div class="modal-footer">  
					<button type="reset" class="btn btn-primary">Reset</button>  
					<button type="submit" class="btn btn-primary">Add</button>  
				</div> 
			</form>
		</div>
	</div>  
</div>  

<!-- Modal Form for Update-->
<div class="modal fade" id="myUpdateModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<form id="modal_update_form" action="<?php echo base_url(); ?>index.php/students_controller/update_student" method="post">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title" id="myModalLabel">Curriculum Year</h4>
				</div>
				<div class="modal-body">  
				  
					<div class="row" id="studentUpdateModal">     
						<div class="col-md-6">  
							
							<div class="row">   
								<div class="col-md-4">   
									<div class="form-group">
										<label for="sur_name_update">Sur Name</label>
										<input type="text" class="form-control" name="sur_name_update" id="sur_name_update" placeholder="Sur Name">
									</div>
								</div>   
								
								<div class="col-md-4">   
									<div class="form-group">
										<label for="first_name_update">First Name</label>
										<input type="text" class="form-control" name="first_name_update" id="first_name_update" placeholder="First Name">
									</div>
								
								</div>   
								
								<div class="col-md-4">     
									<div class="form-group">
										<label for="middle_name_update">Middle Name</label>
										<input type="text" class="form-control" name="middle_name_update" id="middle_name_update" placeholder="Middle Name">
									</div>
								</div>   
							</div>    
							
							<div class="form-group">
								<label for="lrn_update">LRN</label>
								<input type="text" class="form-control" name="lrn_update" id="lrn_update" placeholder="LRN">
							</div>  
							
							<div class="form-group">
								<label for="sex_update">Sex</label>
								<input type="text" class="form-control" name="sex_update" id="sex_update" placeholder="Sex">
							</div>  
							
							<div class="form-group">
								<label for="date_of_birth_update">Date of Birth</label>
								<div class='input-group date' id='update_birth_date_picker'>
									<input type='text' name="date_of_birth_update" id="date_of_birth_update" class="form-control" placeholder="Date of Birth" />
									<span class="input-group-addon">
										<span class="glyphicon glyphicon-calendar"></span>
									</span>
								</div>
							
							</div>   
							
							<div class="form-group">
								<label for="place_of_birth_update">Place of Birth</label>
								<input type="text" class="form-control" name="place_of_birth_update" id="place_of_birth_update" placeholder="Place of Birth">
							</div>
						
							<div class="form-group">
								<label for="age_update">Age</label>
								<input type="text" class="form-control" name="age_update" id="age_update" placeholder="Age">
							</div>
							
							<div class="form-group">
								<label for="present_address_update">Present Address</label>
								<input type="text" class="form-control" name="present_address_update" id="present_address_update" placeholder="Present Address">
							</div>   
							
							<div class="form-group">
								<label for="school_last_attended_update">School Last Attended</label>
								<input type="text" class="form-control" name="school_last_attended_update" id="school_last_attended_update" placeholder="School Last Attended">
							</div>    
							
							<div class="form-group">
								<label for="school_address_update">School Address</label>
								<input type="text" class="form-control" name="school_address_update" id="school_address_update" placeholder="School Address">
							</div>   
						</div>    
						
						<div class="col-md-6">   
							
							<div class="form-group">
								<label for="grade_or_year_level_update">Grade/Year Level</label>
								<input type="text" class="form-control" name="grade_or_year_level_update" id="grade_or_year_level_update" placeholder="Grade/Year Level">
							</div>      
							
							<div class="form-group">
								<label for="school_year_update">School Year</label>
								<input type="text" class="form-control" name="school_year_update" id="school_year_update" placeholder="School Year">
							</div>    	   

							<div class="form-group">
								<label for="tve_specialization_update">TVE Specialization (for Grade 9 and 4th Yr. Student Only)</label>
								<input type="text" class="form-control" name="tve_specialization_update" id="tve_specialization_update" placeholder="TVE Specialization (for Grade 9 and 4th Yr. Student Only)">
							</div>    	
							
							<div class="form-group">
								<label for="father_update">Father</label>
								<input type="text" class="form-control" name="father_update" id="father_update" placeholder="Father">
							</div>       
							
							<div class="form-group">
								<label for="mother_update">Mother</label>
								<input type="text" class="form-control" name="mother_update" id="mother_update" placeholder="Mother">
							</div>      
							
							<div class="form-group">
								<label for="person_to_notify_update">Person to Notify in Case of Emergency/Guardian</label>
								<input type="text" class="form-control" name="person_to_notify_update" id="person_to_notify_update" placeholder="Person to Notify">
							</div>    
							
							<div class="form-group">
								<label for="address_update">Address</label>
								<input type="text" class="form-control" name="address_update" id="address_update" placeholder="Address">
							</div>  
							
							<div class="form-group">
								<label for="contact_number_update">Tel. #/Cell #</label>
								<input type="text" class="form-control" name="contact_number_update" id="contact_number_update" placeholder="Tel. #/Cell #">
							</div> 
							
						</div>
						
					</div>   
					
				
					<input type="hidden" name="update_id" id="update_id" value=""/>  
					<div class='my_alert_container'>  
					</div>
				</div>
				<div class="modal-footer">  
					<button type="reset" class="btn btn-primary">Reset</button>  
					<button type="submit" class="btn btn-primary">Update</button>  
				</div> 
			</form>
		</div>
	</div>  
</div>

<!-- Modal Form for Enroll-->  
<div class="modal fade" id="enrollModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<form ng-controller='student' id="student_enrollment_form" action="<?php echo base_url(); ?>index.php/students_controller/enroll_student" method="post">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title" id="myModalLabel">Enrollment Process</h4>
				</div>
				<div class="modal-body">
					
					<div class="row">     
						<div class="col-md-4">    
							<div class="form-group">
								<label for="curriculum_selection" class="control-label">Select Curriculum Year</label>
								<select name="curriculum_selection" ng-model="curriculum_id" ng-change="curriculumChange()" id="curriculum_selection" class="form-control">
									<option value></option>
									<option ng-repeat="curriculum in curriculums" value="{{curriculum.id}}">{{curriculum.curriculum}}</option>
								</select>
							</div>       
						</div>   
						
						<div class="col-md-4">    
							<div class="form-group">
								<label for="section_selection" class="control-label">Select Section</label>
								<select name="section_selection" disabled ng-model="section_id"  id="section_selection" class="form-control">
									<option value></option>
									<option ng-repeat="curriculumSection in curriculumSections" value="{{curriculumSection.id}}">{{curriculumSection.section}}</option>
								</select>
							</div>       
						</div>       

						<div class="col-md-4">    
							<div class="form-group">
								<label for="school_year" class="control-label">School Year</label>
								<input type="text" class="form-control" name="school_year" id="school_year" placeholder="School Year">
							</div>       
						</div>  

						<input type="hidden" name="student_id_selection" id="student_id_selection" value=""/>  
						
					</div>        

				
					<div class="row">   
						<div class="col-md-12">      
							<div class="hidden alert alert-danger" role="alert">Select curriculum year, section and enter school year to proceed...</div>
						</div>
					</div>
					

				</div>
				<div class="modal-footer">
					<button type="submit" class="btn btn-primary">Enroll</button>
				</div>    
			</form>
		</div>
	</div>
</div>

<!-- Model for view Academic Status -->

<div class="modal fade" id="academicStatusModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			
			<form ng-controller='academic' id="view_academic" id="enrolled" method="post" action="<?php echo base_url(); ?>index.php/students_controller/delete_student_enrolled_academic">
			
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title" id="myModalLabel">Academic Status</h4>
				</div>
				<div class="modal-body">
					
					<table class="table table-hover">
						<thead>  
							<tr>  
								<th><input type="checkbox" class="main_check" /></th>
								<th>Curriculum Year</th>  
								<th>Section</th>  
								<th>School Year</th>  
								<th>View</th>
							</tr>
						</thead>   
						<tbody>   
							<tr ng-repeat="listAcademic in listAcademics">
								<td><input type="checkbox" name="enrolled_student_id[]" value="{{listAcademic.id}}" class="sub_check" /></td>
								<td>{{listAcademic.curriculum}}</td>
								<td>{{listAcademic.section}}</td>
								<td>{{listAcademic.school_year}}</td>
								<td ng-bind-html="listAcademic.viewLink"></td>
							</tr>  
						</tbody>
					</table>   
					
					
				
				</div>   
				
				<div class="modal-footer">
					<button id="academic_list_form_delete_button" type="submit" class="my_button btn btn-danger">
						<span class="glyphicon glyphicon-minus-sign" aria-hidden="true"></span> Delete
					</button>
				</div>      
			
			</form>
			
		</div>
	</div>
</div>

<!-- Modal for Student Account -->
<div class="modal fade" id="StudentAccountModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    
		<form id="student_account_form" ng-controller='studentAccount' action="<?php echo base_url(); ?>index.php/students_controller/set_student_account" method="post">
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


<div class="main_container" id="student_angular_container" ng-controller='student'>
	<div class="container">   
		
		<div class="row">   
			<div class="col-md-12">   
				<div class="page-header">
					<h1>Students <small></small></h1>
				</div>
			</div>  
		</div>         
		
		<div class="my_search_box">
			<div class="row">   
				<div class="col-md-12">  
					<form class="form-inline">
						<div class="form-group">
							<label class="sr-only" for="query">Query</label>
							<input ng-model="query" type="text" class="form-control" id="query" placeholder="Search Student">
						</div>
					</form>
				</div>  
			</div>  
		</div>   
		
		
		<form id="delete_form" action="<?php echo base_url(); ?>index.php/students_controller/delete_student" method='post'>
			<div class="row">  
				<div class="col-md-12">
				
					<div class="table-responsive">
						<table class="table table-hover">
							<thead>  
								<tr>
									<th><input type="checkbox" class="main_check" /></th>
									<th>Student</th>  
									<th>Edit Data</th>  
									<th>Enrollment</th>  
									<th>Academic Status</th>   
									<th>Account</th>
								</tr>
							</thead>   
							<tbody>   
								<tr ng-repeat="student in students | filter: query">
									<td class="has_student_id"><input type="checkbox" name="student_id[]" value="{{student.id}}" class="sub_check" /></td>
									<td class="student_name">{{student.sur_name}}, {{student.first_name}} {{student.middle_name}}</td>   
									<td>
										<a class="my_update_link" href="<?php echo base_url(); ?>index.php/students_controller/get_student_update_content_by_id?id={{student.id}}"><span class="glyphicon glyphicon-pencil" aria-hidden="true" data-toggle="modal" data-target="#myUpdateModal"></span></a>
									</td>   
									<td ng-bind-html="student.status"></td>  
									<td ng-bind-html="student.viewAcademic"></td>     
									<td>
										<button id="{{student.id}}" type="button" class="btn btn-{{student.button_type}} student_account">{{student.button_value}}</button>
									</td>
								</tr>  
							</tbody>
						</table>
					</div>
				
				</div>
			</div>   
			
			<div class="row">    
				<div class="col-md-12">   
					
					<button type="button" class="my_button btn btn-primary" data-toggle="modal" data-target="#myAddModal">
						<span class="glyphicon glyphicon-plus-sign" aria-hidden="true"></span> Add
					</button>      
					
					<button id="my_form_delete_button" type="submit" class="my_button btn btn-danger">
						<span class="glyphicon glyphicon-minus-sign" aria-hidden="true"></span> Delete
					</button>
					
				</div>  
			</div>    
		
		</form> <!-- end delete form -->
		
		<!-- below is the hidden div for the angular trigger -->
		<div class="row my_hidden_div">   
			<div class="col-md-12">   
				<button type="button" ng-click="getStudents()" class="btn btn-primary student_angular_trigger">Get Students</button>   
			</div>
		</div>
		
	</div>  
</div> <!-- end main container -->    












