<!-- Modal form for add -->
<div class="modal fade" id="listAddModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<form id="list_add_form" action="<?php echo base_url(); ?>index.php/teacher_subjects_controller/add_teacher_subject" method="post">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title" id="myModalLabel">Subjects <small>(press ctrl to select and deselect)</small></h4>
				</div>
				<div class="modal-body">  
					
					<?php echo $curriculum_subjects; ?>    
					
					<input type="hidden" name="teacher_id" value="<?php echo $teacher_id; ?>" />
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


<div class="main_container" ng-controller='teacherSubject'>
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
		
		<form id="delete_form" action="<?php echo base_url(); ?>index.php/teacher_subjects_controller/delete_teacher_subject" method='post'>
			<div class="row">  
				<div class="col-md-12">
				
					<div class="table-responsive">
						<table class="table">
							<thead>  
								<tr>
									<th><input type="checkbox" class="main_check" /></th>
									<th>Subject</th>     
									<th>Curriculum</th>  
								</tr>
							</thead>   
							<tbody>   
								<tr ng-repeat="teacherSubject in teacherSubjects | filter: query">
									<td><input type="checkbox" name="teacher_subject_id[]" value="{{teacherSubject.id}}" class="sub_check" /></td>
									<td>{{teacherSubject.subject}}</td>      
									<td>{{teacherSubject.curriculum}}</td>   
								</tr>
							</tbody>
						</table>
					</div>
				
				</div>
			</div>   
			
			<div class="row">    
				<div class="col-md-12">   
					
					<button type="button" class="my_button btn btn-primary" data-toggle="modal" data-target="#listAddModal">
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
				<button type="button" ng-click="getTeacherSubjects()" class="btn btn-primary teacher_subject_angular_trigger">Get Teacher Subjects</button>   
			</div>
		</div>
		
	</div>  
</div> <!-- end main container -->    












