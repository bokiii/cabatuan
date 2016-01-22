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
					
					<div class="row wrap_inputs" id="studentAddModal">     
						
						<div class="col-md-12">  
					
							<div class="row">   
								<div class="col-md-4">   
									<div class="form-group">
										<label for="sur_name">Last Name</label>
										<input type="text" class="form-control for_validation" name="sur_name" id="sur_name" data-placement="top" title="title" data-content="content">
									</div>
								</div>   
								
								<div class="col-md-4">   
									<div class="form-group">
										<label for="first_name">First Name</label>
										<input type="text" class="form-control for_validation" name="first_name" id="first_name" data-placement="top" title="title" data-content="content">
									</div>
								
								</div>   
								
								<div class="col-md-4">     
									<div class="form-group">
										<label for="middle_name">Middle Name</label>
										<input type="text" class="form-control for_validation" name="middle_name" id="middle_name" data-placement="top" title="title" data-content="content">
									</div>
								</div>   
							</div>    
							
							<!--<div class="form-group">
								<label for="lrn">LRN</label>
								<input type="text" class="form-control for_validation" name="lrn" id="lrn" data-placement="top" title="title" data-content="content">
							</div>-->  
							
							<div class="form-group">
								<label for="sex">Sex</label>
								<!--<select id="sex" name="sex" class="form-control validation_for_select" data-placement="top" title="title" data-content="content">                                                           
									<option value></option>
									<option value="Male">Male</option>
									<option value="Female">Female</option>
								</select>-->      
								<br />						
								
								<label class="radio-inline">
									<input type="radio" class="sex" name="sex" value="Male"> Male
								</label>
								<label class="radio-inline">
									<input type="radio" class="sex" name="sex" value="Female"> Female
								</label>
								
							</div>  
							
							<div class="form-group">
								<label for="date_of_birth">Date of Birth</label>
								<!--<div class='input-group date' id='add_birth_date_picker'>
									<input type='text' name="date_of_birth" id="date_of_birth" class="form-control" />
									<span class="input-group-addon">
										<span class="glyphicon glyphicon-calendar"></span>
									</span>
								</div>-->  
								<div class="row">
									<div class="col-md-4">
										<select name="month" id="month" class="form-control validation_for_select" data-placement="top" title="title" data-content="content"> 
											<option value="">Month</option>
											<option value="01">Jan</option>
											<option value="02">Feb</option>
											<option value="03">Mar</option>
											<option value="04">Apr</option>
											<option value="05">May</option>
											<option value="06">Jun</option>
											<option value="07">Jul</option>
											<option value="08">Aug</option>
											<option value="09">Sep</option>
											<option value="10">Oct</option>
											<option value="11">Nov</option>
											<option value="12">Dec</option>
										</select>    
									</div>   
									<div class="col-md-4">
										<select name="day" id="day" class="form-control validation_for_select" data-placement="top" title="title" data-content="content"> 
											<option value="">Day</option>
											<option value="01">1</option>
											<option value="02">2</option>
											<option value="03">3</option>
											<option value="04">4</option>
											<option value="05">5</option>
											<option value="06">6</option>
											<option value="07">7</option>
											<option value="08">8</option>
											<option value="09">9</option>
											<option value="10">10</option>
											<option value="11">11</option>
											<option value="12">12</option>  
											<option value="13">13</option>
											<option value="14">14</option>
											<option value="15">15</option>
											<option value="16">16</option>
											<option value="17">17</option>
											<option value="18">18</option>
											<option value="19">19</option>
											<option value="20">20</option>
											<option value="21">21</option>
											<option value="22">22</option>
											<option value="23">23</option>
											<option value="24">24</option>
											<option value="25">25</option>
											<option value="26">26</option>
											<option value="27">27</option>
											<option value="28">28</option>
											<option value="29">29</option>
											<option value="30">30</option>
											<option value="31">31</option>
										</select>    
									</div>
									
									<div class="col-md-4">
										<select name="year" id="year" class="form-control validation_for_select" data-placement="top" title="title" data-content="content"> 
											<option value="">Year</option>
											<?php foreach($dates as $date) { ?>
												<option value="<?php echo $date; ?>"><?php echo $date; ?></option>
											<?php } ?>
										</select>    
									</div>   
									
								</div>
								
							</div>     
							
							<div class="form-group">
								<label for="place_of_birth">Place of Birth</label>
								<input type="text" class="form-control for_validation" name="place_of_birth" id="place_of_birth" data-placement="top" title="title" data-content="content">
							</div>
						
							<div class="form-group">
								<label for="age">Age</label>
								<input readonly type="text" class="form-control" name="age" id="age">
							</div>
							
							<div class="form-group">
								<label for="present_address">Present Address</label>
								<input type="text" class="form-control for_validation" name="present_address" id="present_address" data-placement="top" title="title" data-content="content">
							</div>   
							
							<div class="form-group">
								<label for="school_last_attended">School Last Attended</label>
								<input type="text" class="form-control for_validation" name="school_last_attended" id="school_last_attended" data-placement="top" title="title" data-content="content">
							</div>    
							
							<div class="form-group">
								<label for="school_address">School Address</label>
								<input type="text" class="form-control for_validation" name="school_address" id="school_address" data-placement="top" title="title" data-content="content">
							</div>   
					
							
							<div class="form-group">
								<label for="grade_or_year_level">Grade/Year Level</label>
								<select id="grade_or_year_level" name="grade_or_year_level" class="form-control validation_for_select" data-placement="top" title="title" data-content="content">                                                           
									<option value></option>
									<option value="Grade 7">Grade 7</option>
									<option value="Grade 8">Grade 8</option>
									<option value="Grade 9">Grade 9</option>
									<option value="Grade 10">Grade 10</option>
									<option value="Grade 11">Grade 11</option>  
									<option value="Grade 12">Grade 12</option>
								</select>
							</div>     

							<div class="form-group">
								<label for="school_year">School Year</label>
								<!--<input type="text" class="form-control" name="school_year" id="school_year">-->   
								<select class="form-control validation_for_select" name="school_year" id="school_year" data-placement="top" title="title" data-content="content">  
									<option value="">&nbsp;</option>  
									<?php foreach($school_years as $school_year) { ?>
										<option value="<?php echo $school_year; ?>"><?php echo $school_year; ?></option>
									<?php } ?>
								</select>
							</div>    	   

							<div class="form-group">
								<label for="tve_specialization">TVE Specialization (for Grade 9 and 4th Yr. Student Only)</label>
								<input type="text" class="form-control for_validation" name="tve_specialization" id="tve_specialization" data-placement="top" title="title" data-content="content">
							</div>    	
							
							<div class="form-group">
								<label for="father">Father</label>
								<input type="text" class="form-control for_validation" name="father" id="father" data-placement="top" title="title" data-content="content">
							</div>       
							
							<div class="form-group">
								<label for="mother">Mother</label>
								<input type="text" class="form-control for_validation" name="mother" id="mother" data-placement="top" title="title" data-content="content">
							</div>      
							
							<div class="form-group">
								<label for="person_to_notify">Person to Notify in Case of Emergency/Guardian</label>
								<input type="text" class="form-control for_validation" name="person_to_notify" id="person_to_notify" data-placement="top" title="title" data-content="content">
							</div>    
							
							<div class="form-group">
								<label for="address">Address</label>
								<input type="text" class="form-control for_validation" name="address" id="address" data-placement="top" title="title" data-content="content">
							</div>  
							
							<div class="form-group">
								<label for="contact_number">Tel. #/Cell #</label>   
								<div class="input-group">
									<div class="input-group-btn phone_select">
										<button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><span class="button_value">Select Phone</span> <span class="caret"></span></button>
										<ul class="dropdown-menu">   
											<li><a class="select_telephone" id="telephone" href="#">Tel #</a></li>
											<li><a class="select_telephone" id="cellphone" href="#">Cell #</a></li>
										</ul>
									</div><!-- /btn-group -->
									<input type="text" readonly class="form-control validation_for_phone_select" name="contact_number" id="contact_number" data-placement="top" title="title" data-content="content">  
									<input type="hidden" id="phone_selected"  name="phone_selected" value="not selected" />
								</div><!-- /input-group -->    
							</div>
		 
						</div> <!-- end col-md-12 -->
						
					</div>   
					
					<div class='my_alert_container'>  
					</div>
					
				</div>  
				
				<div class="modal-footer">  
					<button type="reset" class="btn btn-primary">Reset</button>  
					<button type="submit" class="btn btn-primary" id="enrollment_submit">Add</button>  
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
				  
					<div class="row wrap_update_inputs" id="studentUpdateModal">     
						
						<div class="col-md-12">  
					
							<div class="row">   
								<div class="col-md-4">   
									<div class="form-group">
										<label for="sur_name_update">Last Name</label>
										<input type="text" class="form-control for_validation" name="sur_name_update" id="sur_name_update" data-placement="top" title="title" data-content="content">
									</div>
								</div>   
								
								<div class="col-md-4">   
									<div class="form-group">
										<label for="first_name_update">First Name</label>
										<input type="text" class="form-control for_validation" name="first_name_update" id="first_name_update" data-placement="top" title="title" data-content="content">
									</div>
								
								</div>   
								
								<div class="col-md-4">     
									<div class="form-group">
										<label for="middle_name_update">Middle Name</label>
										<input type="text" class="form-control for_validation" name="middle_name_update" id="middle_name_update" data-placement="top" title="title" data-content="content">
									</div>
								</div>   
							</div>    
							
							<!--<div class="form-group">
								<label for="lrn_update">LRN</label>
								<input type="text" class="form-control for_validation" name="lrn_update" id="lrn_update" data-placement="top" title="title" data-content="content">
							</div>-->  
							
							<div class="form-group">
								<label for="sex">Sex</label>
								<!--<select id="sex" name="sex" class="form-control validation_for_select" data-placement="top" title="title" data-content="content">                                                           
									<option value></option>
									<option value="Male">Male</option>
									<option value="Female">Female</option>
								</select>-->      
								<br />						
								
								<label class="radio-inline">
									<input type="radio" class="sex_update" name="sex_update" value="Male"> Male
								</label>
								<label class="radio-inline">
									<input type="radio" class="sex_update" name="sex_update" value="Female"> Female
								</label>
								
							</div>  
							
							<div class="form-group">
								<label for="date_of_birth">Date of Birth</label>
								<!--<div class='input-group date' id='add_birth_date_picker'>
									<input type='text' name="date_of_birth" id="date_of_birth" class="form-control" />
									<span class="input-group-addon">
										<span class="glyphicon glyphicon-calendar"></span>
									</span>
								</div>-->  
								<div class="row">
									<div class="col-md-4">
										<select name="month_update" id="month_update" class="form-control validation_for_select" data-placement="top" title="title" data-content="content"> 
											<option class="blank_value" value="">Month</option>
											<option value="01">Jan</option>
											<option value="02">Feb</option>
											<option value="03">Mar</option>
											<option value="04">Apr</option>
											<option value="05">May</option>
											<option value="06">Jun</option>
											<option value="07">Jul</option>
											<option value="08">Aug</option>
											<option value="09">Sep</option>
											<option value="10">Oct</option>
											<option value="11">Nov</option>
											<option value="12">Dec</option>
										</select>    
									</div>   
									<div class="col-md-4">
										<select name="day_update" id="day_update" class="form-control validation_for_select" data-placement="top" title="title" data-content="content"> 
											<option class="blank_value" value="">Day</option>
											<option value="01">1</option>
											<option value="02">2</option>
											<option value="03">3</option>
											<option value="04">4</option>
											<option value="05">5</option>
											<option value="06">6</option>
											<option value="07">7</option>
											<option value="08">8</option>
											<option value="09">9</option>
											<option value="10">10</option>
											<option value="11">11</option>
											<option value="12">12</option>  
											<option value="13">13</option>
											<option value="14">14</option>
											<option value="15">15</option>
											<option value="16">16</option>
											<option value="17">17</option>
											<option value="18">18</option>
											<option value="19">19</option>
											<option value="20">20</option>
											<option value="21">21</option>
											<option value="22">22</option>
											<option value="23">23</option>
											<option value="24">24</option>
											<option value="25">25</option>
											<option value="26">26</option>
											<option value="27">27</option>
											<option value="28">28</option>
											<option value="29">29</option>
											<option value="30">30</option>
											<option value="31">31</option>
										</select>    
									</div>
									
									<div class="col-md-4">
										<select name="year_update" id="year_update" class="form-control validation_for_select" data-placement="top" title="title" data-content="content"> 
											<option class="blank_value" value="">Year</option>
											<?php foreach($dates as $date) { ?>
												<option value="<?php echo $date; ?>"><?php echo $date; ?></option>
											<?php } ?>
										</select>    
									</div>   
									
								</div>
								
							</div>     
							
							<div class="form-group">
								<label for="place_of_birth_update">Place of Birth</label>
								<input type="text" class="form-control for_validation" name="place_of_birth_update" id="place_of_birth_update" data-placement="top" title="title" data-content="content">
							</div>
						
							<div class="form-group">
								<label for="age_update">Age</label>
								<input readonly type="text" class="form-control" name="age_update" id="age_update">
							</div>
							
							<div class="form-group">
								<label for="present_address_update">Present Address</label>
								<input type="text" class="form-control for_validation" name="present_address_update" id="present_address_update" data-placement="top" title="title" data-content="content">
							</div>   
							
							<div class="form-group">
								<label for="school_last_attended_update">School Last Attended</label>
								<input type="text" class="form-control for_validation" name="school_last_attended_update" id="school_last_attended_update" data-placement="top" title="title" data-content="content">
							</div>    
							
							<div class="form-group">
								<label for="school_address_update">School Address</label>
								<input type="text" class="form-control for_validation" name="school_address_update" id="school_address_update" data-placement="top" title="title" data-content="content">
							</div>   
					 
							
							<div class="form-group">
								<label for="grade_or_year_level">Grade/Year Level</label>
								<select id="grade_or_year_level_update" name="grade_or_year_level_update" class="form-control validation_for_select" data-placement="top" title="title" data-content="content">                                                           
									<option class="blank_value" value></option>
									<option value="Grade 7">Grade 7</option>
									<option value="Grade 8">Grade 8</option>
									<option value="Grade 9">Grade 9</option>
									<option value="Grade 10">Grade 10</option>
									<option value="Grade 11">Grade 11</option>  
									<option value="Grade 12">Grade 12</option>
								</select>
							</div>     

							<div class="form-group">
								<label for="school_year">School Year</label>
								<!--<input type="text" class="form-control" name="school_year" id="school_year">-->   
								<select class="form-control validation_for_select" name="school_year_update" id="school_year_update" data-placement="top" title="title" data-content="content">  
									<option class="blank_value" value="">&nbsp;</option>  
									<?php foreach($school_years as $school_year) { ?>
										<option value="<?php echo $school_year; ?>"><?php echo $school_year; ?></option>
									<?php } ?>
								</select>
							</div>    	   

							<div class="form-group">
								<label for="tve_specialization">TVE Specialization (for Grade 9 and 4th Yr. Student Only)</label>
								<input type="text" class="form-control for_validation" name="tve_specialization_update" id="tve_specialization_update" data-placement="top" title="title" data-content="content">
							</div>    	
							
							<div class="form-group">
								<label for="father">Father</label>
								<input type="text" class="form-control for_validation" name="father_update" id="father_update" data-placement="top" title="title" data-content="content">
							</div>       
							
							<div class="form-group">
								<label for="mother">Mother</label>
								<input type="text" class="form-control for_validation" name="mother_update" id="mother_update" data-placement="top" title="title" data-content="content">
							</div>      
							
							<div class="form-group">
								<label for="person_to_notify">Person to Notify in Case of Emergency/Guardian</label>
								<input type="text" class="form-control for_validation" name="person_to_notify_update" id="person_to_notify_update" data-placement="top" title="title" data-content="content">
							</div>    
							
							<div class="form-group">
								<label for="address">Address</label>
								<input type="text" class="form-control for_validation" name="address_update" id="address_update" data-placement="top" title="title" data-content="content">
							</div>  
							
							<div class="form-group">
								<label for="contact_number">Tel. #/Cell # <span class="current_phone_type"></span></label>   
								<div class="input-group for_phone_update">
									<div class="input-group-btn phone_select">
										<button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><span class="button_value">Select Phone</span> <span class="caret"></span></button>
										<ul class="dropdown-menu">   
											<li><a class="select_telephone" id="telephone" href="#">Tel #</a></li>
											<li><a class="select_telephone" id="cellphone" href="#">Cell #</a></li>
										</ul>
									</div><!-- /btn-group -->
									<input type="text" readonly class="form-control validation_for_phone_select" name="contact_number_update" id="contact_number_update" data-placement="top" title="title" data-content="content">  
									<input type="hidden" id="phone_selected_update"  name="phone_selected_update" value="not selected" />
								</div><!-- /input-group -->    
							</div>
		 
						</div> <!-- end col-md-12 -->
						
					</div>   
					
				
					<input type="hidden" name="update_id" id="update_id" value=""/>  
					<div class='my_alert_container'>  
					</div>
				</div>
				<div class="modal-footer">  
					<button type="reset" class="btn btn-primary">Reset</button>  
					<button type="submit" id="update_form_submit" class="btn btn-primary" disabled>Update</button>  
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

<!-- Modal for view Academic Status -->

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
	</div>  
	
	<div class="container">   
		<ul class="nav nav-tabs">
			<li role="presentation" class="active"><a class="home_tab" id="first_tab" href="#">Enrolled Students</a></li>
			<li role="presentation"><a class="home_tab" id="second_tab" href="#">Unenrolled Students</a></li>
			<li role="presentation"><a class="home_tab" id="third_tab" href="#">Verify a Student</a></li>   
		</ul>
	</div>  
	
	<br />
	
	<div class="container active_tab first_tab tabs">   
		
		<div class="my_search_box">
			<div class="row">   
				<div class="col-md-12">  
					<form class="form-inline">
						<div class="form-group">
							<label class="sr-only" for="query">Query </label>
							<input ng-model="query" type="text" class="form-control" placeholder="Search Student">
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
			
		</form> <!-- end delete form -->
	
	</div>  

	<div class="container second_tab tabs">   
		
		<div class="my_search_box">
			<div class="row">   
				<div class="col-md-12">  
					<form class="form-inline">
						<div class="form-group">
							<label class="sr-only" for="query">Query </label>
							<input ng-model="unenrolledQuery" type="text" class="form-control" placeholder="Search Student">
						</div>      	
					</form>     
					
				</div>  
			</div>  
		</div>   
		
		<div class="row">   
			<div class="col-md-12">   
				
				
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
										<tr ng-repeat=" unenrolled in unenrolledStudents | filter: unenrolledQuery">
											<td class="has_student_id"><input type="checkbox" name="student_id[]" value="{{unenrolled.id}}" class="sub_check" /></td>
											<td class="student_name">{{unenrolled.sur_name}}, {{unenrolled.first_name}} {{unenrolled.middle_name}}</td>   
											<td>
												<a class="my_update_link" href="<?php echo base_url(); ?>index.php/students_controller/get_student_update_content_by_id?id={{unenrolled.id}}"><span class="glyphicon glyphicon-pencil" aria-hidden="true" data-toggle="modal" data-target="#myUpdateModal"></span></a>
											</td>   
											<td ng-bind-html="unenrolled.status"></td>  
											<td ng-bind-html="unenrolled.viewAcademic"></td>     
											<td>
												<button id="{{unenrolled.id}}" type="button" class="btn btn-{{unenrolled.button_type}} student_account">{{unenrolled.button_value}}</button>
											</td>
										</tr>  
									</tbody>
								</table>
							</div>
						
						</div>
					</div>   
					
					<div class="row">    
						<div class="col-md-12">   
							
							<button type="button" class="my_button btn btn-primary pull-right" data-toggle="modal" data-target="#myAddModal">
								Add
							</button>      
							
							<button id="my_form_delete_button" type="submit" class="my_button btn btn-danger pull-right">
								Delete
							</button>
							
						</div>  
					</div>    
				
				</form> <!-- end delete form -->
				
				
			</div>      
		</div>   
	</div> <!-- end second tab -->  
	
	<div class="container third_tab tabs">   
		<form method="post" id="verify_student_form" action="<?php echo base_url(); ?>index.php/students_controller/verify_student_registration">  
			<div class="row">   
				<div class="col-md-6">  
					<div class="form-group">
						<label for="code">Confirmation Code</label>
						<input type="text" class="form-control" name="code" id="code">
					</div>
				</div>
			</div>       
			<div class="row">  
				<div class="row">  
					<div class="col-md-12">  
						<button type="submit" class="btn btn-info" id="code_submit" disabled>Confirm</button>
					</div>
				</div>   
			</div>
		</form> 
	</div> <!-- end second tab -->
	
	
</div> <!-- end main container -->    












