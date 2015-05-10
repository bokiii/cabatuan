<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<form id="modal_form" action="<?php echo base_url(); ?>index.php/curriculum_controller/add_curriculum" method="post">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title" id="myModalLabel">Curriculum Year</h4>
				</div>
				<div class="modal-body">  
					
					<div class="form-group">
						<label for="curriculum" class="control-label">Curriculum</label>
						<input type="text" name="curriculum" class="form-control" id="curriculum">
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



<div class="main_container">
	<div class="container">   
		<div class="row">   
			<div class="col-md-12">   
			
				<div class="page-header">
					<h1>Curriculum</small></h1>
				</div>
			</div>
		</div>   
		
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
							</tr>
						</thead>   
						<tbody>   
							<tr>
								<td><input type="checkbox" name="curriculum_year_id[]" class="sub_check" /></td>
								<td>First Year</td>   
								<td>
									<a href="#"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></a>
								</td>
								<td>  
									<a href="#"><span class="glyphicon glyphicon-search" aria-hidden="true"></span></a>
								</td>
							</tr>   
							<tr>
								<td><input type="checkbox" name="curriculum_year_id[]" class="sub_check" /></td>
								<td>Second Year</td>     
								<td>
									<a href="#"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></a>
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
				
				<button type="button" class="my_button btn btn-danger">
					<span class="glyphicon glyphicon-minus-sign" aria-hidden="true"></span> Delete
				</button>
			
				<button type="button" class="my_button btn btn-primary" data-toggle="modal" data-target="#myModal">
					<span class="glyphicon glyphicon-plus-sign" aria-hidden="true"></span> Add
				</button>   
				
			</div>  
		</div>
		
		
	</div>  
</div> <!-- end main container -->