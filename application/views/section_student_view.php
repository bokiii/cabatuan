<!-- Modal for Section Students -->
<div class="modal fade" id="sectionStudentsModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div id="section_students" ng-controller='viewStudents'>  
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title" id="myModalLabel">School Year {{schoolYear}} (<?php echo $subject; ?>)</h4>
				</div>
				<div class="modal-body">  
					<div class="table-responsive">   
						<table class="table table-hover">   
							<thead>  
								<th>Student</th>   
								<th>First Quarter</th>   
								<th>Second Quarter</th>   
								<th>Third Quarter</th>   
								<th>Fourth Quarter</th>
							</thead>  
							<tbody>  
								<tr ng-repeat="student in students">  
									<td>{{student.student_name}}</td>     
									<td>{{student.first_quarter}}</td>
									<td>{{student.second_quarter}}</td>
									<td>{{student.third_quarter}}</td>
									<td>{{student.fourth_quarter}}</td>
								</tr>
							</tbody>
						</table>
					</div>
				</div>  
				
				<div class="modal-footer">  
				</div>   
			</div>
		</div>
	</div>  
</div>

<div class="main_container" id="section_students_container" ng-controller='sectionStudents'>
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
								<td ng-controller="viewStudents">
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












