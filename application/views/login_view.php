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