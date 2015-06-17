<div class="main_container" ng-controller='teacherAccountSubjectSection'>
	<div class="container">   
		
		<div class="row">   
			<div class="col-md-12">   
				<div class="page-header">
					<h1><?php echo $last_name . ", " . $first_name . " " . $middle_name . " (" . $subject . ")";  ?> <small>assigned sections</small></h1>
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
								<th>Section</th>     
								<th>Curriculum</th>     
								<th>Students</th>
							</tr>
						</thead>   
						<tbody>   
							<tr ng-repeat="teacherSubjectSection in teacherSubjectSections | filter: query">
								<td>{{teacherSubjectSection.section}}</td>      
								<td>{{teacherSubjectSection.curriculum}}</td>     
								<td>  
									<a href="<?php echo base_url(); ?>index.php/teacher_account_section_students_controller?section_id={{teacherSubjectSection.section_id}}&teacher_subject_id=<?php echo $teacher_subject_id; ?>" ><span class="glyphicon glyphicon-search" aria-hidden="true"></span></a>                                                                                                  
								</td>  									
							</tr>
						</tbody>
					</table>
				</div>
			
			</div>
		</div>   
		

	</div>  
</div> <!-- end main container -->    












