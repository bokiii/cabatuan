<div class="main_container" ng-controller='teacherAccountController'>
	<div class="container">   
		
		<div class="row">   
			<div class="col-md-12">   
				<div class="page-header">
					<h1><?php echo $last_name . ", " . $first_name . " " . $middle_name;  ?> <small>Subjects</small></h1>
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












