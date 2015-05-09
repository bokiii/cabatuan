<!DOCTYPE HTML>
<html lang="en-US">
<head>
	<meta charset="UTF-8">
	<title>Student Information System</title>  
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	
	<meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="<?php echo base_url(); ?>images/hide.ico">
	

	<link rel="stylesheet" href="<?php echo base_url(); ?>bootstrap/css/bootstrap.css" />    
	<link rel="stylesheet" href="<?php echo base_url(); ?>styles/jumbotron.css" />   
	
	<!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="<?php echo base_url(); ?>scripts/ie8-responsive-file-warning.js"></script><![endif]-->
   <script type="text/javascript" src="<?php echo base_url(); ?>scripts/ie-emulation-modes-warning.js"></script>   

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="<?php echo base_url(); ?>scripts/html5shiv.min.js"></script>
      <script src="<?php echo base_url(); ?>scripts/respond.min.js"></script>
    <![endif]-->
	
	<!-- main style is below--> 
	<link rel="stylesheet" href="<?php echo base_url(); ?>styles/style.css" />     
	
</head>
<body>   
	

	<nav class="navbar navbar-inverse navbar-fixed-top">
		<div class="container">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="#">CNCHS Information System</a>
			</div>
			<div id="navbar" class="navbar-collapse collapse">
				<form class="navbar-form navbar-right">
					<div class="form-group">
						<input type="text" placeholder="Username" class="form-control">
					</div>
					<div class="form-group">
						<input type="password" placeholder="Password" class="form-control">
					</div>
					<button type="submit" class="btn btn-success">Sign in</button>
				</form>
			</div><!--/.navbar-collapse -->
		</div>
	</nav>

    <!-- Main jumbotron for a primary marketing message or call to action -->
	<div class="jumbotron">
		<div class="container">
			<h1>Hello, guest!</h1>
			<p>We are glad to introduce to Cabatuan National Comprehensive High School Information System. This is where the students and techers view and manage their information online..</p>
			<p><a class="btn btn-primary btn-lg" href="#" role="button">Learn more &raquo;</a></p>
		</div>
	</div>
	
	<div class="container">
		<div class="row">   
			<div class="col-md-12">   
				<div class="page-header">
				  <h1>Enrollment Form<small> for enrollees..</small></h1>
				</div>
			</div>
		</div>   
	
	</div>   
	
	<div class="container">   
		<form>
			<div class="row">     
				<div class="col-md-6">  
					
					<div class="row">   
						<div class="col-md-4">   
							<div class="form-group">
								<label for="sur_name">Sur Name</label>
								<input type="text" class="form-control" name="sur_name" id="sur_name" placeholder="Sur Name">
							</div>
						</div>   
						
						<div class="col-md-4">   
							<div class="form-group">
								<label for="first_name">First Name</label>
								<input type="text" class="form-control" name="first_name" id="first_name" placeholder="First Name">
							</div>
						
						</div>   
						
						<div class="col-md-4">     
							<div class="form-group">
								<label for="middle_name">Middle Name</label>
								<input type="text" class="form-control" name="middle_name" id="middle_name" placeholder="Middle Name">
							</div>
						</div>   
					</div>    
					
					<div class="form-group">
						<label for="lrn">LRN</label>
						<input type="text" class="form-control" name="lrn" id="lrn" placeholder="LRN">
					</div>  
					
					<div class="form-group">
						<label for="sex">Sex</label>
						<input type="text" class="form-control" name="sex" id="sex" placeholder="Sex">
					</div>  
					
					<div class="form-group">
						<label for="date_of_birth">Date of Birth</label>
						<input type="text" class="form-control" name="date_of_birth" id="date_of_birth" placeholder="Date of Birth">
					</div>   
					
					<div class="form-group">
						<label for="place_of_birth">Place of Birth</label>
						<input type="text" class="form-control" name="place_of_birth" id="place_of_birth" placeholder="Place of Birth">
					</div>
				
					<div class="form-group">
						<label for="age">Age</label>
						<input type="text" class="form-control" name="age" id="age" placeholder="Age">
					</div>
					
					<div class="form-group">
						<label for="present_address">Present Address</label>
						<input type="text" class="form-control" name="present_address" id="present_address" placeholder="Present Address">
					</div>   
					
					<div class="form-group">
						<label for="school_last_attended">School Last Attended</label>
						<input type="text" class="form-control" name="school_last_attended" id="school_last_attended" placeholder="School Last Attended">
					</div>    
					
					<div class="form-group">
						<label for="school_address">School Address</label>
						<input type="text" class="form-control" name="school_address" id="school_address" placeholder="School Address">
					</div>   
				</div>    
				
				<div class="col-md-6">   
					
					<div class="form-group">
						<label for="grade_or_year_level">Grade/Year Level</label>
						<input type="text" class="form-control" name="grade_or_year_level" id="grade_or_year_level" placeholder="Grade/Year Level">
					</div>      
					
					<div class="form-group">
						<label for="school_year">School Year</label>
						<input type="text" class="form-control" name="school_year" id="school_year" placeholder="School Year">
					</div>    	   

					<div class="form-group">
						<label for="tve_specialization">TVE Specialization (for Grade 9 and 4th Yr. Student Only)</label>
						<input type="text" class="form-control" name="tve_specialization" id="tve_specialization" placeholder="TVE Specialization (for Grade 9 and 4th Yr. Student Only)">
					</div>    	
					
					<div class="form-group">
						<label for="father">Father</label>
						<input type="text" class="form-control" name="father" id="father" placeholder="Father">
					</div>       
					
					<div class="form-group">
						<label for="mother">Mother</label>
						<input type="text" class="form-control" name="mother" id="mother" placeholder="Mother">
					</div>      
					
					<div class="form-group">
						<label for="person_to_notify">Person to Notify in Case of Emergency/Guardian</label>
						<input type="text" class="form-control" name="person_to_notify" id="person_to_notify" placeholder="Person to Notify">
					</div>    
					
					<div class="form-group">
						<label for="address">Address</label>
						<input type="text" class="form-control" name="address" id="address" placeholder="Address">
					</div>  
					
					<div class="form-group">
						<label for="contact_number">Tel. #/Cell #</label>
						<input type="text" class="form-control" name="contact_number" id="contact_number" placeholder="Tel. #/Cell #">
					</div> 
					
				</div>
				
			</div>   
			
			<div class="row">  
				<div class="col-md-12">  
					<button type="submit" class="btn btn-info">Submit</button>
				</div>
			</div>
			
		
		</form>    
	</div>  

	<div class="container">  
		<hr>
		<footer>
			<p>&copy; Mastermind Technology Incorporated <?php echo date('Y'); ?></p>
		</footer>
	
	</div>
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	<!-- scripts below -->
	<script type="text/javascript" src="<?php echo base_url(); ?>scripts/jquery2.js"></script>   
	<script type="text/javascript" src="<?php echo base_url(); ?>bootstrap/js/bootstrap.js"></script>  
	
	<script src="<?php echo base_url(); ?>scripts/holder.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="<?php echo base_url(); ?>scripts/ie10-viewport-bug-workaround.js"></script>
	

	<!--main script is below-->
	<script type="text/javascript" src="<?php echo base_url(); ?>scripts/script.js"></script>   
</body>
</html>