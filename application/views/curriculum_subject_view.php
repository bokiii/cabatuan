<!-- Modal form for add -->
<div class="modal fade" id="myAddModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<form id="modal_add_form" action="<?php echo base_url(); ?>index.php/curriculum_subjects_controller/add_curriculum_subject" method="post">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title" id="myModalLabel">Curriculum Subject</h4>
				</div>
				<div class="modal-body">  
					
					<div class="form-group">
						<label for="subject" class="control-label">Subject</label>
						<input type="text" name="subject" class="form-control" id="subject" placeholder="Subject">
					</div>           
					
					<input type="hidden" name="curriculum_id" value="<?php echo $curriculum_id; ?>" />
					
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
			<form id="modal_update_form" action="<?php echo base_url(); ?>index.php/curriculum_subjects_controller/update_curriculum_subject" method="post">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title" id="myModalLabel">Curriculum Subject</h4>
				</div>
				<div class="modal-body">  
					<div class="form-group">
						<label for="subject_update" class="control-label">Subject</label>
						<input type="text" name="subject_update" class="form-control" id="subject_update" value="">  
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



<div class="main_container" ng-controller='curriculumSubject'>
	<div class="container">   
		
		<div class="row">   
			<div class="col-md-12">   
				<div class="page-header">
					<h1><?php echo $curriculum; ?> <small>Subjects</small></h1>
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
		
		
		<form id="delete_form" action="<?php echo base_url(); ?>index.php/curriculum_subjects_controller/delete_curriculum_subject" method='post'>
			<div class="row">  
				<div class="col-md-12">
				
					<div class="table-responsive">
						<table class="table table-hover">
							<thead>  
								<tr>
									<th><input type="checkbox" class="main_check" /></th>
									<th>Subject</th>  
									<th>Edit Data</th>  
								</tr>
							</thead>   
							<tbody>   
								<tr ng-repeat="curriculumSubject in curriculumSubjects | filter: query">
									<td><input type="checkbox" name="curriculum_subject_id[]" value="{{curriculumSubject.id}}" class="sub_check" /></td>
									<td>{{curriculumSubject.subject}}</td>   
									<td>
										<a class="my_update_link" href="<?php echo base_url(); ?>index.php/curriculum_subjects_controller/get_curriculum_subject_update_content_by_id?id={{curriculumSubject.id}}"><span class="glyphicon glyphicon-pencil" aria-hidden="true" data-toggle="modal" data-target="#myUpdateModal"></span></a>
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
				<button type="button" ng-click="getCurriculumSubjects()" class="btn btn-primary curriculum_subject_angular_trigger">Get Curriculum Subjects</button>   
			</div>
		</div>
		
	</div>  
</div> <!-- end main container -->    












