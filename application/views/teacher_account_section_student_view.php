<!-- Modal for Section Students -->
<div class="modal fade" id="sectionStudentsModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div id="section_students" ng-controller='viewTeacherStudents'>  
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title" id="myModalLabel">School Year {{schoolYear}} (<?php echo $subject; ?>)</h4>
				</div>
				<div class="modal-body">  
					
					<div class="my_search_box">
						<div class="row">   
							<div class="col-md-12">  
								<form class="form-inline">
									<div class="form-group">
										<label class="sr-only" for="student_query">Query</label>
										<input ng-model="student_query" type="text" class="form-control" id="student_query" placeholder="Search Student">
									</div>
								</form>
							</div>  
						</div>  
					</div>
					
					<div class="row">  
						<div class="table-responsive">   
							<table class="table table-hover table-bordered">   
								<thead>  
									<th>Student</th>   
									<th>First Quarter</th>   
									<th>Second Quarter</th>   
									<th>Third Quarter</th>   
									<th>Fourth Quarter</th>   
									<th>Final Grade</th> 
									<th>Remarks</th>
									<th>Update Grade</th>
								</thead>  
								<tbody>  
									
									<tr ng-repeat="student in students | filter: student_query">        
										<td>{{student.student_name}}</td>     
										<td class="first_quarter"><input type="text" class="form-control update_student_grade" name="first_quarter" value="{{student.first_quarter}}"></td>
										<td class="second_quarter"><input type="text" class="form-control update_student_grade" name="second_quarter" value="{{student.second_quarter}}"></td>
										<td class="third_quarter"><input type="text" class="form-control update_student_grade" name="third_quarter" value="{{student.third_quarter}}"></td>
										<td class="fourth_quarter"><input type="text" class="form-control update_student_grade" name="fourth_quarter" value="{{student.fourth_quarter}}"></td>      
										<td class="final_grade"><input type="text" class="form-control update_student_grade" name="final_grade" value="{{student.final_grade}}"></td>      
										<td class="remarks"><input type="text" class="form-control update_student_grade" name="remarks" value="{{student.remarks}}"></td>     
										<td><a class="update_subject_grade" href="<?php echo base_url(); ?>index.php/teacher_account_section_students_controller/update_subject_grade?student_subject_grade_id={{student.student_subject_grade_id}}"><button type="button" class="btn btn-info">Update</button></a></td>                                                     
									</tr>    
								
								</tbody>
							</table>
						</div>
					</div>
				</div>  
				
				<div class="modal-footer">  
					  
				</div>   
			</div>
		</div>
	</div>  
</div>

<div class="main_container" id="section_students_container" ng-controller='teacherAccountSectionStudents'>
	<div class="container">   
		
		<div class="row">   
			<div class="col-md-12">   
				<div class="page-header">
					<h1>School <small>years</small></h1>  
					<p>(Teacher - <?php echo $teacher_name; ?>), (Subject - <?php echo $subject; ?>), (Section - <?php echo $section; ?>)</p>
				</div>
			</div>  
		</div>             
		
		<div class="my_search_box">
			<div class="row">   
				<div class="col-md-12">  
					<form class="form-inline">
						<div class="form-group">
							<label class="sr-only" for="query">Query</label>
							<input ng-model="query" type="text" class="form-control" id="query" placeholder="Search School Year">
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
								<th>School Year</th>  
								<th>View Students</th>  
							</tr>
						</thead>   
						<tbody>   
							<tr ng-repeat="schoolYear in schoolYears | filter: query">
								<td>{{schoolYear.school_year}}</td>      
								<td ng-controller="viewTeacherStudents">
									<a id="<?php echo $section_id; ?>" class="viewSectionStudentsLink" href="#"><span class="glyphicon glyphicon-search"></span></a>
								</td>
							</tr>     
						</tbody>
					</table>   
					<p id="subject_id" class="hidden"><?php echo $subject_id; ?></p>
				</div>
			
			</div>
		</div>   

	</div>  
</div> <!-- end main container -->    












