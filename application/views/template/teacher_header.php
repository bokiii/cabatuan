<!DOCTYPE HTML>
<html lang="en-US" ng-app="cabatuan">
<head>
	<meta charset="UTF-8">
	<title>Student Information System</title>  
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	
	<meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="<?php echo base_url(); ?>images/hide.ico">
	

	<link rel="stylesheet" href="<?php echo base_url(); ?>bootstrap/css/bootstrap.css" />     
	<link rel="stylesheet" href="<?php echo base_url(); ?>bootstrap/css/bootstrap-datetimepicker.css" /> 
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
				
				<ul class="nav navbar-nav navbar-right">
					<li class="dropdown">
						<a href="<?php echo base_url(); ?>index.php/teacher_account_controller">Home</a>                                  
					</li>  
					<!--<li class="dropdown">
						<a href="<?php echo base_url(); ?>index.php/teachers_controller">Teachers</a>
					</li>   
					<li class="dropdown">
						<a href="<?php echo base_url(); ?>index.php/curriculum_controller">Curriculum Years</a>
					</li>-->   
					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Account<span class="caret"></span></a>
						<ul class="dropdown-menu" role="menu"> 
							<li><a href="<?php echo base_url(); ?>index.php/auth_controller">Logout</a></li>
						</ul>
					</li>
					
				</ul>   
				
			</div><!--/.navbar-collapse -->
		</div>	
	</nav>    
	
	
	
	
	
	
	
	
	
	