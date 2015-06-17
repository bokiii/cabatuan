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
							</tr>
						</thead>   
						<tbody>   
							<tr ng-repeat="student in students | filter: query">
								<td class="student_name">{{student.sur_name}}, {{student.first_name}} {{student.middle_name}}</td>   
								<td ng-bind-html="student.viewAcademic"></td>     
							</tr>  
						</tbody>
					</table>
				</div>
			
			</div>
		</div>   
	
	</div>  
</div> <!-- end main container -->    












