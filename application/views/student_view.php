<!-- Modal form for add -->
<div class="modal fade" id="myAddModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<form id="modal_add_form" action="<?php echo base_url(); ?>index.php/curriculum_controller/add_curriculum" method="post">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title" id="myModalLabel">Student</h4>
				</div>
				<div class="modal-body">  
					
					<div class="row">     
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
								<input type="text" class="form-control" name="date_of_birth" id="date_of_birth" placeholder="Date of Birth">
							</div>   
							
							<div class="form-group">
								<label for="place_of_birth">Place of Birth</label>
								<input type="text" class="form-control" name="place_of_birth" id="place_of_birth" placeholder="Place of Birth">
							</div>
						
							<div class="form-group">
								<label for="age">Age</label>
								<input type="text" class="form-control" name="age" id="age" placeholder="Age">
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
			<form id="modal_update_form" action="<?php echo base_url(); ?>index.php/curriculum_controller/update_curriculum" method="post">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title" id="myModalLabel">Curriculum Year</h4>
				</div>
				<div class="modal-body">  
					<div class="form-group">
						<label for="curriculum_update" class="control-label">Curriculum</label>
						<input type="text" name="curriculum_update" class="form-control" id="curriculum_update" value="">  
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



<div class="main_container" ng-controller='curriculumYear'>
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
		
		
		<form id="delete_form" action="<?php echo base_url(); ?>index.php/curriculum_controller/delete_curriculum" method='post'>
			<div class="row">  
				<div class="col-md-12">
				
					<div class="table-responsive">
						<table class="table">
							<thead>  
								<tr>
									<th><input type="checkbox" class="main_check" /></th>
									<th>Curriculum Year</th>  
									<th>Edit Data</th>  
									<th>Manage Subjects</th>  
									<th>Manage Sections</th>
								</tr>
							</thead>   
							<tbody>   
								<!--<tr ng-repeat="curriculum in curriculums | filter: query">
									<td><input type="checkbox" name="curriculum_year_id[]" value="{{curriculum.id}}" class="sub_check" /></td>
									<td>{{curriculum.curriculum}}</td>   
									<td>
										<a class="my_update_link" href="<?php echo base_url(); ?>index.php/curriculum_controller/get_curriculum_update_content_by_id?id={{curriculum.id}}"><span class="glyphicon glyphicon-pencil" aria-hidden="true" data-toggle="modal" data-target="#myUpdateModal"></span></a>
									</td>
									<td>  
										<a href="<?php echo base_url(); ?>index.php/curriculum_subjects_controller?curriculum_id={{curriculum.id}}"><span class="glyphicon glyphicon-search" aria-hidden="true"></span></a>
									</td>   
									<td>  
										<a href="<?php echo base_url(); ?>index.php/curriculum_sections_controller?curriculum_id={{curriculum.id}}"><span class="glyphicon glyphicon-search" aria-hidden="true"></span></a>
									</td>   
								</tr>-->   
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
				<button type="button" ng-click="getCurriculums()" class="btn btn-primary curriculum_angular_trigger">Get Curriculums</button>   
			</div>
		</div>
		
	</div>  
</div> <!-- end main container -->    












