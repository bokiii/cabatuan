<!DOCTYPE HTML>
<html lang="en-US">
<head>
	<meta charset="UTF-8">
	<title>Student Information System</title>  
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	
	<meta name="description" content="">
    <meta name="author" content="mastermind" >
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
				<form id="login_form" method="post" action="<?php echo base_url(); ?>index.php/auth_controller/process_auth" class="navbar-form navbar-right">
					<div class="form-group">
						<input type="text" name="username" placeholder="Username" class="form-control">
					</div>
					<div class="form-group">
						<input type="password" name="password" placeholder="Password" class="form-control">
					</div>   
					<input style="display:none" type="text" name="fakeusernameremembered"/>
					<input style="display:none" type="password" name="fakepasswordremembered"/>
					<button type="submit" class="btn btn-success">Sign in</button>
				</form>
			</div><!--/.navbar-collapse -->
		</div>
	</nav>

	
	<div class="jumbotron slide-wrapper">
		<div class="container">      
			<div class="row">     
				<div class="col-md-12">  

					<div id="mycarousel" class="carousel slide" data-ride="carousel">
						<!-- Add Slide Indicators -->
						<ol class="carousel-indicators">
							<li data-target="#mycarousel" data-slide-to="0" class="active"></li>
							<li data-target="#mycarousel" data-slide-to="1"></li>
							<li data-target="#mycarousel" data-slide-to="2"></li>
						</ol>

						<!-- Add Carousel Wrapper for Slides -->
						<div class="carousel-inner">
							
							<div class="item active">
								<img src="../images/firstSlide.png" alt="first banner">
								<!--<div class="carousel-caption">
									<h1>Caption One</h1>
								</div>-->
							</div>  
							
							<div class="item">
								<img src="../images/secondSlide.png" alt="second banner">
								<!--<div class="carousel-caption">
									<h1>Caption Two</h1>
								</div>-->
							</div>  
							
							<div class="item">
								<img src="../images/thirdSlide.png" alt="third banner">
								<!--<div class="carousel-caption">
									<h1>Caption Three</h1>
								</div>-->
							</div>  
							
						</div>

						<!-- Add Left & Right Navigation Controls -->
						<a class="left carousel-control" href="#mycarousel" data-slide="prev">
							<span class="glyphicon glyphicon-chevron-left"></span>
						</a>  
						
						<a class="right carousel-control" href="#mycarousel" data-slide="next">
							<span class="glyphicon glyphicon-chevron-right"></span>
						</a>  
						
					</div> <!-- end caroussel-->
				
				</div>
			</div>
		
		</div>  <!-- end container --> 
	
	</div>
	
	
	<div class="container">   
		<ul class="nav nav-tabs">
			<li role="presentation" class="active"><a class="home_tab" id="first_tab" href="#">Enrollment Form</a></li>
			<!--<li role="presentation"><a class="home_tab" id="second_tab" href="#">Second Tab</a></li>
			<li role="presentation"><a class="home_tab" id="third_tab" href="#">Third Tab</a></li>   
			<li role="presentation"><a class="home_tab" id="fourth_tab" href="#">Fourth Tab</a></li>  
			<li role="presentation"><a class="home_tab" id="fifth_tab" href="#">Fifth Tab</a></li>-->
		</ul>
	</div>
	
	
	<div class="container active_tab first_tab tabs">   
		
		<div class="row">   
			<div class="col-md-12">   
				<div class="page-header">
				  <h1>Enrollment Form<small> for Grade 7..</small></h1>
				</div>
			</div>
		</div>   
		
		<form id='register_enrollee_form' method='post' action="<?php echo base_url(); ?>index.php/login/register_enrollee">
			<div class="row">     
				<div class="col-md-6">  
					
					<div class="row">   
						<div class="col-md-4">   
							<div class="form-group">
								<label for="sur_name">Sur Name</label>
								<input type="text" class="form-control" name="sur_name" id="sur_name">
							</div>
						</div>   
						
						<div class="col-md-4">   
							<div class="form-group">
								<label for="first_name">First Name</label>
								<input type="text" class="form-control" name="first_name" id="first_name">
							</div>
						
						</div>   
						
						<div class="col-md-4">     
							<div class="form-group">
								<label for="middle_name">Middle Name</label>
								<input type="text" class="form-control" name="middle_name" id="middle_name">
							</div>
						</div>   
					</div>    
					
					<div class="form-group">
						<label for="lrn">LRN</label>
						<input type="text" class="form-control" name="lrn" id="lrn">
					</div>  
					
					<div class="form-group">
						<label for="sex">Sex</label>
						<select id="sex" name="sex" class="form-control">                                                           
							<option value></option>
							<option value="Male">Male</option>
							<option value="Female">Female</option>
						</select>
					</div>  
					
					<div class="form-group">
						<label for="date_of_birth">Date of Birth</label>
						<div class='input-group date' id='add_birth_date_picker'>
							<input type='text' name="date_of_birth" id="date_of_birth" class="form-control" />
							<span class="input-group-addon">
								<span class="glyphicon glyphicon-calendar"></span>
							</span>
						</div>
					</div>     
					
					<div class="form-group">
						<label for="place_of_birth">Place of Birth</label>
						<input type="text" class="form-control" name="place_of_birth" id="place_of_birth">
					</div>
				
					<div class="form-group">
						<label for="age">Age</label>
						<input readonly type="text" class="form-control" name="age" id="age">
					</div>
					
					<div class="form-group">
						<label for="present_address">Present Address</label>
						<input type="text" class="form-control" name="present_address" id="present_address">
					</div>   
					
					<div class="form-group">
						<label for="school_last_attended">School Last Attended</label>
						<input type="text" class="form-control" name="school_last_attended" id="school_last_attended">
					</div>    
					
					<div class="form-group">
						<label for="school_address">School Address</label>
						<input type="text" class="form-control" name="school_address" id="school_address">
					</div>   
				</div>    
				
				<div class="col-md-6">   
					
					<div class="form-group">
						<label for="grade_or_year_level">Grade/Year Level</label>
						<select id="grade_or_year_level" name="grade_or_year_level" class="form-control">                                                           
							<option value></option>
							<option value="Grade 7">Grade 7</option>
							<option value="Grade 8">Grade 8</option>
							<option value="Grade 9">Grade 9</option>
							<option value="Grade 10">Grade 10</option>
							<option value="Grade 11">Grade 11</option>  
							<option value="Grade 12">Grade 12</option>
						</select>
					</div>     

					<div class="form-group">
						<label for="school_year">School Year</label>
						<input type="text" class="form-control" name="school_year" id="school_year">
					</div>    	   

					<div class="form-group">
						<label for="tve_specialization">TVE Specialization (for Grade 9 and 4th Yr. Student Only)</label>
						<input type="text" class="form-control" name="tve_specialization" id="tve_specialization">
					</div>    	
					
					<div class="form-group">
						<label for="father">Father</label>
						<input type="text" class="form-control" name="father" id="father">
					</div>       
					
					<div class="form-group">
						<label for="mother">Mother</label>
						<input type="text" class="form-control" name="mother" id="mother">
					</div>      
					
					<div class="form-group">
						<label for="person_to_notify">Person to Notify in Case of Emergency/Guardian</label>
						<input type="text" class="form-control" name="person_to_notify" id="person_to_notify">
					</div>    
					
					<div class="form-group">
						<label for="address">Address</label>
						<input type="text" class="form-control" name="address" id="address">
					</div>  
					
					<div class="form-group">
						<label for="contact_number">Tel. #/Cell #</label>
						<!--<input type="tel" class="form-control" name="contact_number" id="contact_number">-->  
						
						<div class="input-group">
							<div class="input-group-btn phone_select">
								<button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><span class="button_value">Select Phone</span> <span class="caret"></span></button>
								<ul class="dropdown-menu">   
									<li><a class="select_telephone" id="telephone" href="#">Tel #</a></li>
									<li><a class="select_telephone" id="cellphone" href="#">Cell #</a></li>
								</ul>
							</div><!-- /btn-group -->
							<input type="text" readonly class="form-control" name="contact_number" id="contact_number">
						</div><!-- /input-group -->    
					</div>
 
				</div> <!-- end col-md-6 -->
				
			</div>     
			
			<div class="row">  
				<div class="col-md-12">  
					<div id="captcha_image_container">  
						
						<div id="image_captcha" class="left">  
							<?php echo $image; ?>  
						</div>
					
						<div class="left">  
							<a href="<?php echo base_url(); ?>index.php/login/refresh_captcha" class="refresh_captcha"><img src="<?php echo base_url() . "images/refresh.png" ?>" class="img-responsive" alt="Refresh" /></a>
						</div>  
						
						<div class="clear"></div>
					
					</div>
					
				</div>    
			</div>   
			
			<div class="row">  
				<div class="col-md-3">   
					<br />
					<div class="form-group">
						<label for="captcha_entered">Captcha</label>
						<input type="text" class="form-control" name="captcha_entered" id="captcha_entered">
					</div> 
				</div>   
				
				<div class="col-md-3">   
					<br />
					<div class="form-group">
						<label for="email_address">Email Address</label>
						<input type="text" class="form-control" name="email_address" id="email_address">
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
	
	<!--<div class="container second_tab tabs">    
		<p>Content for the second tab</p>
	</div>   
	
	<div class="container third_tab tabs">    
		<p>Content for the third tab</p>
	</div>    
	
	<div class="container fourth_tab tabs">    
		<p>Content for the fourth tab</p>
	</div>  

	<div class="container fifth_tab tabs">    
		<p>Content for the fifth tab</p>
	</div>-->  
	
	<div class="container">  
		<hr>
		<footer>
			<p>&copy; BitMasters Tech. <?php echo date('Y'); ?></p>
		</footer>
	</div>
	
	<!-- scripts below -->
	<script type="text/javascript" src="<?php echo base_url(); ?>scripts/jquery2.js"></script>   
	<script type="text/javascript" src="<?php echo base_url(); ?>scripts/jquery.form.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>bootstrap/js/bootstrap.js"></script>     
	<script type="text/javascript" src="<?php echo base_url(); ?>bootstrap/js/moment-with-locales.js"></script> 
	<script type="text/javascript" src="<?php echo base_url(); ?>bootstrap/js/bootstrap-datetimepicker.js"></script> 
	<script type="text/javascript" src="<?php echo base_url(); ?>scripts/bootbox.min.js"></script>
	
	<script src="<?php echo base_url(); ?>scripts/holder.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="<?php echo base_url(); ?>scripts/ie10-viewport-bug-workaround.js"></script>
	
	<!--main script is below-->
	<script type="text/javascript" src="<?php echo base_url(); ?>scripts/script.js"></script>  

	

	<!-- link scripts for angular js below -->  
	<script type="text/javascript" src="<?php echo base_url(); ?>scripts/lib/angular/angular.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>scripts/js/app.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>scripts/js/services.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>scripts/js/controllers.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>scripts/js/filters.js"></script>    
	
	
</body>
</html>     







































