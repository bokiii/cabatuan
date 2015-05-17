<!-- Modal form for add -->
<div class="modal fade" id="myAddModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<form id="modal_add_form" action="<?php echo base_url(); ?>index.php/teachers_controller/add_teacher" method="post">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title" id="myModalLabel">Teacher</h4>
				</div>
				<div class="modal-body">  
					
					<div class="form-group">
						<label for="first_name" class="control-label">First Name</label>
						<input type="text" name="first_name" class="form-control" id="first_name">
					</div>        

					<div class="form-group">
						<label for="last_name" class="control-label">Last Name</label>
						<input type="text" name="last_name" class="form-control" id="last_name">
					</div>       

					<div class="form-group">
						<label for="middle_name" class="control-label">Middle Name</label>
						<input type="text" name="middle_name" class="form-control" id="middle_name">
					</div>		   

					<div class="form-group">
						<label for="address" class="control-label">Address</label>
						<input type="text" name="address" class="form-control" id="address">
					</div>			   

					<div class="form-group">
						<label for="civilstatus" class="control-label">Civil Status</label>
						<input type="text" name="civilstatus" class="form-control" id="civilstatus">
					</div>					   

					<div class="form-group">
						<label for="religion" class="control-label">Religion</label>
						<input type="text" name="religion" class="form-control" id="religion">
					</div>		   

					<div class="form-group">
				
						<label for="birth_date" class="control-label">Birth Date</label>
						<div class='input-group date' id='add_birth_date_picker'>
							<input type='text' name="birth_date" id="birth_date" class="form-control" />
							<span class="input-group-addon">
								<span class="glyphicon glyphicon-calendar"></span>
							</span>
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
			<form id="modal_update_form" action="<?php echo base_url(); ?>index.php/teachers_controller/update_teacher" method="post">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title" id="myModalLabel">Curriculum Year</h4>
				</div>
				<div class="modal-body">  
					
					<div class="form-group">
						<label for="first_name_update" class="control-label">First Name</label>
						<input type="text" name="first_name_update" class="form-control" id="first_name_update" value="">
					</div>        

					<div class="form-group">
						<label for="last_name_update" class="control-label">Last Name</label>
						<input type="text" name="last_name_update" class="form-control" id="last_name_update" value="">
					</div>       

					<div class="form-group">
						<label for="middle_name_update" class="control-label">Middle Name</label>
						<input type="text" name="middle_name_update" class="form-control" id="middle_name_update" value="">
					</div>		   

					<div class="form-group">
						<label for="address_update" class="control-label">Address</label>
						<input type="text" name="address_update" class="form-control" id="address_update" value="">
					</div>			   

					<div class="form-group">
						<label for="civilstatus_update" class="control-label">Civil Status</label>
						<input type="text" name="civilstatus_update" class="form-control" id="civilstatus_update" value="">
					</div>					   

					<div class="form-group">
						<label for="religion_update" class="control-label">Religion</label>
						<input type="text" name="religion_update" class="form-control" id="religion_update" value="">
					</div>		   

					<div class="form-group">
						<!--<label for="birth_date_update" class="control-label">Birth Date</label>
						<input type="text" name="birth_date_update" class="form-control" id="birth_date_update" value="">-->
						
						<label for="birth_date_update" class="control-label">Birth Date</label>
						<div class='input-group date' id='update_birth_date_picker'>
							<input type='text' name="birth_date_update" id="birth_date_update" class="form-control" />
							<span class="input-group-addon">
								<span class="glyphicon glyphicon-calendar"></span>
							</span>
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



<div class="main_container" ng-controller='teacher'>
	<div class="container">   
		
		<div class="row">   
			<div class="col-md-12">   
				<div class="page-header">
					<h1>Teachers <small></small></h1>
				</div>
			</div>  
		</div>         
		
		<div class="my_search_box">
			<div class="row">   
				<div class="col-md-12">  
					<form class="form-inline">
						<div class="form-group">
							<label class="sr-only" for="query">Query</label>
							<input ng-model="query" type="text" class="form-control" id="query" placeholder="Search Teacher">
						</div>
					</form>
				</div>  
			</div>  
		</div>   
		
		<form id="delete_form" action="<?php echo base_url(); ?>index.php/teachers_controller/delete_teacher" method='post'>
			<div class="row">  
				<div class="col-md-12">
				
					<div class="table-responsive">
						<table class="table">
							<thead>  
								<tr>
									<th><input type="checkbox" class="main_check" /></th>
									<th>Name</th>  
									<th>Address</th>   
									<th>Civil Status</th>  
									<th>Religion</th>  
									<th>Birth Date</th>   
									<th>Edit Data</th>  
									<th>Manage Subjects</th>  
									<th>Manage Sections</th>
								</tr>
							</thead>   
							<tbody>   
								<tr ng-repeat="teacher in teachers | filter: query">
									<td><input type="checkbox" name="teacher_id[]" value="{{teacher.id}}" class="sub_check" /></td>
									<td>{{teacher.last_name}}, {{teacher.first_name}} {{teacher.middle_name}}</td>    
									<td>{{teacher.address}}</td>	 
									<td>{{teacher.civilstatus}}</td>										
									<td>{{teacher.religion}}</td>	   
									<td>{{teacher.birth_date}}</td>	
									<td>
										<a class="my_update_link" href="<?php echo base_url(); ?>index.php/teachers_controller/get_teacher_update_content_by_id?id={{teacher.id}}"><span class="glyphicon glyphicon-pencil" aria-hidden="true" data-toggle="modal" data-target="#myUpdateModal"></span></a>
									</td>
									<td>  
										<a href="#"><span class="glyphicon glyphicon-search" aria-hidden="true"></span></a>
									</td>  
									<td>  
										<a href="#"><span class="glyphicon glyphicon-search" aria-hidden="true"></span></a>
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
				<button type="button" ng-click="getTeachers()" class="btn btn-primary teacher_angular_trigger">Get Teachers</button>   
			</div>
		</div>
		
	</div>  
</div> <!-- end main container -->    












