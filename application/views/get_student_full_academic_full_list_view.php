<div class="main_container" ng-controller="currentEnrolledStudentControllerFullList">   
	<div class="container">    
		<div class="row">   
			<div class="col-md-12">   
				<div class="page-header">
					<h1><?php echo $last_name . ", " . $first_name . " " . $middle_name; ?></h1>
				</div>
			</div>    
			
			
		</div>       
		
		<div class="row">   
			<div class="col-md-12">  
			
				<div role="tabpanel" ng-repeat="listAcademic in fullListAcademics.list_academics">

					<!-- Nav tabs -->
					<ul class="nav nav-tabs" role="tablist">
						<li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">REPORT ON LEARNING PROCESS AND ACHIEVEMENT ({{listAcademic.curriculum}} {{listAcademic.school_year}} {{listAcademic.section}})</a></li>
						<!--<li role="presentation"><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">Profile</a></li>-->
					</ul>

					<!-- Tab panes -->
					<div class="tab-content">
						<div role="tabpanel" class="tab-pane active" id="home"> 
							
							<div class="table-responsive">
								<table class="table table-bordered academic">
									<thead>  
										<th rowspan="2">Learning Areas</th>
										<th colspan="4">Quarter</th>
										<th rowspan="2">Final Grade</th>
										<th rowspan="2">Remarks</th>
									</thead>    
									<tbody>  
										<tr>  
											<td>&nbsp;</td>
											<td>1</td>
											<td>2</td>
											<td>3</td>  
											<td>4</td>
											<td>&nbsp;</td>
											<td>&nbsp;</td>
										</tr>   
										<tr ng-repeat="academicData in listAcademic.subjects_and_grades[0]">  
											<td>{{academicData.subject}}</td>  
											<td>{{academicData.first_quarter}}</td>  
											<td>{{academicData.second_quarter}}</td>  
											<td>{{academicData.third_quarter}}</td>  
											<td>{{academicData.fourth_quarter}}</td>
											<td>{{academicData.final_grade}}</td>  
											<td>{{academicData.remarks}}</td>
										</tr>  
										
									</tbody>
								</table>  
							</div>
						
						</div>
						<!--<div role="tabpanel" class="tab-pane" id="profile">...</div>-->
					
					</div>
				</div>  
				
				
			</div> <!-- end col-md-12 -->
		</div>
	</div> <!-- end container -->
</div> <!-- end main container -->












