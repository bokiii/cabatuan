<!DOCTYPE HTML>
<html lang="en-US" ng-app="cabatuan">
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

	<div class="row">
		<div class="col-md-12">   
			<div class="for_print">  
				<h1>Confirmation Code</h1>  
				<h3></h3>
			</div>    
		</div>
	</div>

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
			<li role="presentation" class="active"><a class="home_tab" id="first_tab" href="#">Feed</a></li>
			<li role="presentation"><a class="home_tab" id="second_tab" href="#">History</a></li>
			<li role="presentation"><a class="home_tab" id="third_tab" href="#">Academic Calendar</a></li>   
			<li role="presentation"><a class="home_tab" id="fourth_tab" href="#">About Us</a></li>  
			<li role="presentation"><a class="home_tab" id="fifth_tab" href="#">Enrollment Form</a></li>   
			<li role="presentation"><a class="home_tab" id="sixth_tab" href="#">K to 12</a></li>
		</ul>
	</div>
	
	
	<div class="container active_tab first_tab tabs" id="home_login_angular_container" ng-controller='home_login_controller'>   
		
		<div class="row">   
			<div class="col-md-12">   
				<div class="page-header">
				  <h1>News<small> feeds..</small></h1>
				</div>
			</div>   
		</div>        
		
		<div class="row news_lists" ng-repeat="new in news">  
			<div class="col-md-12">  
				<div class="panel panel-default">
					<div class="panel-body">
						{{new.news}}
					</div>
					<div class="panel-footer">{{new.created}}</div>
				
				</div>
			</div>  
		</div>     
	
		
	</div> <!-- end first tab -->
	
	<div class="container second_tab tabs">    
		
		<div class="row">   
			<div class="col-md-12">   
				<div class="page-header">
				  <h1>Historical Sketch</h1>
				</div>
			</div>
		</div>        
		
		<div class="row">   
			<div class="col-md-12">   
				<p>Cabatuan National Comprehensive High School The acting Governor of Iloilo, the Late Patricio V. Confesor, initiated the move to open in Cabatuan a branch of Iloilo High School which was then the only High School which move materialized and so on April 1945 the Cabatuan Regional High School was born. The school offered a refresher course in secondary education. The first graduation was held in june 1945 where Enrique Binayas and Ana Sumagaysay were valedictorian and salutatorian, respectively. The first administrator was Mr. Jose Gonzales.</p>	
				<p>The following school year 1945-46, the school offered complete classes from first year to fourth year. The first batch of the formal graduates was lead by Editha Jiloca as valedictorian and Besta Quinon as salutatorian. In 1948, the school was renamed Cabatuan National High School. The late Mayor Wenceslao Grio and Mr. Gilcerio Dejecacion paved the way for the acquisition of the present site of the school. The school site comprised of 8.6 hectares, was donated by the Vistavilla brothers (Constantino, Benjamin, and Ariston) and the former Congressman Patricio Confesor.</p>
				<p>Mr. Jose Gonzales, the first principal, was transferred to his hometown Lambunao. A new Administrator, Mr. Jose Gorriceta stayed in the school until 1951. From 1951-1968. Mr. Tomas Torreblanca became the principal and during his term, he was able to change the old nipa building to wooden building salvaged from the demolished buildings of Iloilo High School.</p>
				<p>With the retirement of Mr. Torreblanca, Miss Remedios Miranda, the assistant to the principal, took over the administration of the school. Her administration lasted only for three months because she was promoted as principal to another school. On June 21,1968, the school was nationalized with the passage of the Republic Act No. 5544, converting Cabatuan High School to Cabatuan National Comprehensive High School. The law was authored by former Congressman Gloria M. Tabiana of the third district of Iloilo, through the efforts of Mayor Francisco Tobias.</p>
				<p>With the promotion of Miss Miranda, Miss Lilia G.Fancubela , then Guidance coordinator of the school, was named Teacher-in-Charge Designate of the school from October 1,1969 to June 1970. During her incumbency , Miss Fancubela affected the leveling of the ground in the front of the administration building and the fencing of the school.</p>
				<p>On July 1, 1970, Mr. Jose Ledesma took over as the New Administrator until his retirement in March 30, 1971. On March 30, 1971, Miss Anita Jamero assumed the stewardship of the school until June 30, 1971 because of her deserved promotion in position. It was during the administration of Mr. Crispin Vacante on July 1, 1971 that the physical set-up of the school remarkably changes. A number of buildings mushroomed on the campus and several improvements are effected. His administration ended with his untimely death on January 01, 1980.</p>
				<p>Immediately Miss Lucia T. Murga,assistant principal was designated Officer-in-Charge of the school until March 1980. On March 7, 1980, Mr. Florentino P. Gonzales became the administrator of the school. His term expired on August 15, 1982. Miss Lilia G. Fancubela made her ¨sentimental return¨ to the school on August 16, 1982. During her 14-year incumbency as the school head, an imposing administration building was constructed. Annexed to both sides of the building are two other buildings housing the english and mathematics classes. She completed the construction of the Social Studies Building. With the help of PTA , she finally solved the water problem of the school by securing the donation by the family of the late Leodegario Cuarte of a lot ,where source of water is located.</p>
				<p>Again through the financial assistance of the PTA, she effected the construction of a 3-room building now used for agriculture classes. Annexed to the building is another 3-room building constructed out of the school funds. She also effected the repair of the canteen and the H.E Building. The old PTA-Science building was converted to Filipino building. A portion of old quadrangle building was utilized as Values Education Building and the relocation of the CAT-I armory was made possible. She also effected the construction of the new building housing the supply office and the stock room. Through her coordination with the Alumni Association and the PTA of the school, the fence of the school has been made permanent. Through the capital outlay, she effected the construction of a Filipino Building designed to be a double storey. The first floor composed of seven classrooms is utilized for Filipino classes. Another modern and imposing building constructed during Miss Fancubela’s incumbency is the P4.6 million, two-storey Science Development building through the Economic Support Fund. The construction of a two Science Laboratory buildings is a 2-classroom building constructed through to the CDF of Cong. Tirador and Senate President Ernesto Maceda. A 3-classroom building was put up behind the Filipino Building. The PTA added 2-classrooms adjacent to the building.</p>
				<p>For having been evaluated as one of the top Science and Technology-oriented high school in the philippines , CNCHS became a recipient of 15 computer units. the new facilities housed in the computer room furnished by the PTA and Alumni Association of the school is used for the practicum of students taking up computer education. On July 1, 2003, Mr. Vencer was detailed in the Regional Office of the Department of Education. Designated as Officer-in-Charge of Cabatuan National Comprehensive High School was Victor S. Maroma.</p>
				<p>He was instrumental in the repair and repainting of some school buildings. The school acquired a vehicle for the use of the school and students. He solicited the help of Sen. Manny Villar in Acquiring a five-classroom school building. Tapping the help of the alumni of the school,he started the construction of the multimillion-peso alumni hall. He also effected the construction of additional span of catwalk and multi-purpose study shed through the donation of the school alumni. On September 10, 2003, Cabatuan National Comprehensive High School was officially informed to be under the supervision of the Division Of Iloilo. October 4,2004, the Division Office of the Department of Education designated new Officer-in-Charge, Mr. Bonifacio p. Prias to his new assignment. Mr. Prias was the Principal of New Lucena High School, Cabilauan , New Lucena, Iloilo.</p>
				<p>On September 12,2005, the Division Office of the Department of Education designated Mrs. Nenita G. Pueyo as an Officer-in-Charge. She implemented the Remedial class in Tool Subjects such as English, Science, Mathematics and Remedial Reading classes to First Year students belonging to Section 12 and 13. The number of functional comfort room was increased through the donation of the federated PTCA Officers and generous alumni school. The dilapidated PTA building was repaired through the release of the DepEd Regional Office. The multi-purpose covered gym was completed. The Stage and the cementing of main path walk was also completed through the efforts of Hon.Arthur Defensor and Hon.Ramon C. Yee which was solicited during the term of Mr. Victor S. Maroma and the Implementation was during the incumbency of Mrs. Nenita G. Pueyo.</p>
				<p>Mr.Dante Roldan took over the management of the school upon the retirement of Mrs. Nenita G.Pueyo from June 15,2006 to July 15,2007. Projects not finished during administration of Mr.Dante Roldan were turned-over to the Responsibility of the new Principal, Mr.Jerome P.Gatungay who was installed into office on July 16,2007. In SY 2008-2009, the school was classified as one of the Tech.Voc High Schools in the Country. The first Year of implementation started with 14 sections. In the succeeding school year , Mr.Gatungay made the school the first Tech-Voc High School in Region IV with a Wi-Fi zone making internet accessible to teachers and students. The first Hometel unit was constructed , YECS canteen was extended and the school canteen was rehabilitated. These included the revival of the piggery and poultry projects, rice, corn, and tilapia production in the Agricultural area. In SY 2010-2011, Cabatuan hosted the 3rd Congressional District Association Meet paving the way to the rehabilitation of the stage at the back of the administration building and the improvement of the track and field ground. Basketball and volleyball courts also underwent face lifting. It was during this school year when the alumni association constructed the first phase alumni hall. The school also hosted the Division YES-O congress on October 1-2, 2011. Before the end of SY 2010-2011, the school was taken over by Education Supervisor I of TLE, Mr.Ruben S.Libutaque as Officer-in-Charge of the School. Mr.Jerome P.Gatungay was detailed at the Division Office .Mr.Libutaque continued the unfinished task his predecessor from January 4, to April 27, 2011. His legacy during his short stay in school was the improvement of the front landscaped of the math -english buildings and the Administration building. He was also instrumental in the organization of active and dynamic School Governing Council(SSG).The council which is chaired by Mrs.Amelita Maroma, is responsible for implementing the projects and programs school.</p>
				<p>The new principal ,Mr.Rex C.Villaruel took over the office on April 28,2011.He started the school year 2011-2012 by rehabilitating the comfort rooms for the students’ use. These were replaced by new toilet bowls and urinals in collaboration with the school governing council Headed by Mrs. Amelita Maroma. The full implementation of the Tech-Voc happened also this school year. The PTA started the construction of the ICT building. The PTA headed by Engr.Domingo Datoon Jr. The first semester ended with the hostings of the school of the 4th Regional Tech-Voc.Skills Olympics.The library was rehabilitated and part was turned into a function hall . The funding was donated by Maroma Brothers namely; Jose jr. and Robert thus named as”The Maroma Function Room”.</p>
				<p>The School hosted the National Technolympics on April 9-14,2012.Through the lobbying of Mr.Villaruel and with the strong support of the Parents-Teachers Association and other stakeholders, the construction of the P1.5M ICT Laboratory building was realized. In SY 2013-2014, the second ICT Lab was operational to students and teachers. CNCHS was also identified as the site of the proposed Teen Center Town. The Teen Center was joint project of the Iloilo Provincial Government , the Municipality of Cabatuan , the Cabatuan National Comprehensive High School, and the Municipal Federation of the Sangguniang Kabataan. It sits in the old office of the CNCHS Consumer’s Cooperative.</p>
				<p>It was also during the term of Mr. Villaruel that the construction of the P5M state-of-the-Art(SOTA) Building was started and was carried over by the new principalship of the school due to the retirement from the service of the Mr.Villaruel. Aside from its imposing structure, the SOTA also housed the state-of-the-art equipment and facilities intended as laboratory for food Technology students.</p>
				<p>By virtue of his retirement from the service, Mr.Rex G. Villaruel exited as the school principal on November 30, 2013. Another principal was appointed by the office of the school division superintendent for the said position. Mr.Valente L.Lauro took the helm leadership of the school on December 3,2013. On his first year as principal, Mr. Lauro continued the implementation of the projects started by his predecessor. In May 2014, The SOTA building was completed and was inaugurated on August 8,2014.Other projects like the Home Economics Building 2 was completed through the financial assistance of the school’s stakeholders and the assistance of the school governing council with Mrs.Amelita D.Maroma as chairperson.</p>
				<p>An additional two spans were added to the school covered gym through the P2m financial assistance of Cong.Arthur”toto” Defensor, Jr.A portion of the amount was appropriated for the repair of the Industrial Arts Building.</p>
				<p>In school year 2014-2015, the school’s teen center was adjudged the Best Teen Center team in the province of iloilo by the provincial population office. The collected efforts of the team, school, and loxcal Government unit of cabatuan paved a way for the winning award.</p>
				<p>Another facility has been added to CNCHS when Engr. Martinde la Rosa Jr., valedictorian of class 1957 financed the construction of a Multi-Media Center located at the second floor of the H.E. Building. The Center will also be used as classroom and venue for conferences, meetings and seminars.</p>
				<p>Another project implemented by Mr. Lauro was the concreting of the embankment at the back portion of the newly repaired Industrial Arts Building. The concrete embankment protects the side portion of the school ground from the school erosion especially during heavy rains.</p>
				<p>Also noteworthy to mention were landscaping projects of the front area of the SOTA building and the embankment of the back area of Araling Panlipunan building initiated by by the Teachers Employees Association (TEA) of the school headed by Dr. Maria Zelpha C. Carmelo, president. Vice Governor Boboy Tupas granted P50,000.00 to the school an dthe amount was used for the improvement of the pavement in front of the Administration building. Moreover, through the support and assistance of the Senior Council, Alumni Association Inc., and CNCHS Multi-Purpose Cooperative, the concreting of the side area of the covered gym was realized.</p>
				<p>On February 26-28, 2015, the school hosted the Regional Science Congress. This is a 3-day encampment of the youth for environmental protection. The activity was participated in by 3,451 students and teachers from the different secondary schools of the 18 divisions in Region VI. On-going project of the school is the putting of lights around the football field which is financed bby the alumni Association Inc. in preparation for the coming 12th General Alumni Homecoming on April 5, 2015.</p>
				<p>The school under the leadership of Mr. Lauro, still envisions that more projects and programs be given and implemented to CNCHS for the academic achievements and technical-vocational development of its students most especially in preparation for the K to 12 program.</p>
			</div>
		</div>   

		
	
	</div>   
	
	<div class="container third_tab tabs">    
		<p>Content for the third tab</p>
	</div>    
	
	<div class="container fourth_tab tabs">    
		
		<div class="row">   
			<div class="col-md-12">   
				<div class="page-header">
				  <h1>Basic Information</h1>
				</div>
			</div>
		</div>    
		
		<div class="row">   
			<div class="col-md-12">  
				<div class="table-responsive">
					<table style="border: 0;" class="table">
						<tr>
							<td>School ID</td>
							<td>302473</td>
						</tr>
						<tr>
							<td>Address</td>
							<td>Serrano St., Cabatuan, Iloilo</td>
						</tr>
						<tr>
							<td>Contact No.</td>
							<td>(033) 523-7852</td>
						</tr>
						<tr>
							<td>Mission</td>
							<td>
								<p>To protect and promote the right of every Filipino to quality, equitable, culture-based and complete education where:</p>
								<ul>
									<li>Students learn in a child friendly gender-sensitive, safe and motivating environment.</li>
									<li>Teachers facilitate learning and constantly nurture every learner.</li>
									<li>Administrators and staff, as steward of the institution ensure an enabling and supportive environment for effective environment to happen.</li>
									<li>Family community and other stakeholders are actively engaged and share responsibility in developing life-long learners.</li>
								</ul>
							</td>
						</tr>
						<tr>
							<td>Core Values</td>
							<td>Maka-Diyos, Maka-tao, Maka-kalikasan, Maka-bansa</td>
						</tr>
						<tr>
							<td>Vision</td>
							<td>Series of Activities</td>
						</tr>
						<tr>
							<td>Student Population</td>
							<td>70th Foundation Celebration (July 5, 2016)</td>
						</tr>
						<tr>
							<td>No. of Teachers</td>
							<td>128</td>
						</tr>
						<tr>
							<td>Support Staff</td>
							<td>16</td>
						</tr>
					</table>
				</div>
			</div>
		</div>
		
	</div>  

	<div class="container fifth_tab tabs">    
		<div class="row">   
			<div class="col-md-12">   
				<div class="page-header">
				  <h1>Enrollment Form<small> for Grade 7..</small></h1>
				</div>
			</div>
		</div>   
		
		<form id='register_enrollee_form' method='post' action="<?php echo base_url(); ?>index.php/login/register_enrollee">
			<div class="row wrap_inputs">     
				<div class="col-md-6">  
					
					<div class="row">   
						<div class="col-md-4">   
							<div class="form-group">
								<label for="sur_name">Last Name</label>
								<input type="text" class="form-control for_validation" name="sur_name" id="sur_name" data-placement="top" title="title" data-content="content">
							</div>
						</div>   
						
						<div class="col-md-4">   
							<div class="form-group">
								<label for="first_name">First Name</label>
								<input type="text" class="form-control for_validation" name="first_name" id="first_name" data-placement="top" title="title" data-content="content">
							</div>
						
						</div>   
						
						<div class="col-md-4">     
							<div class="form-group">
								<label for="middle_name">Middle Name</label>
								<input type="text" class="form-control for_validation" maxlength="2" name="middle_name" id="middle_name" data-placement="top" title="title" data-content="content">
							</div>
						</div>   
					</div>    
					
					<div class="form-group">
						<label for="lrn">LRN</label>
						<input type="text" class="form-control for_validation" name="lrn" id="lrn" data-placement="top" title="title" data-content="content">
					</div>  
					
					<div class="form-group">
						<label for="sex">Sex</label>
						<!--<select id="sex" name="sex" class="form-control validation_for_select" data-placement="top" title="title" data-content="content">                                                           
							<option value></option>
							<option value="Male">Male</option>
							<option value="Female">Female</option>
						</select>-->      
						<br />						
						
						<label class="radio-inline">
							<input type="radio" class="sex" name="sex" value="Male"> Male
						</label>
						<label class="radio-inline">
							<input type="radio" class="sex" name="sex" value="Female"> Female
						</label>
						
					</div>  
					
					<div class="form-group">
						<label for="date_of_birth">Date of Birth</label>
						<!--<div class='input-group date' id='add_birth_date_picker'>
							<input type='text' name="date_of_birth" id="date_of_birth" class="form-control" />
							<span class="input-group-addon">
								<span class="glyphicon glyphicon-calendar"></span>
							</span>
						</div>-->  
						<div class="row">
							<div class="col-md-4">
								<select name="month" id="month" class="form-control validation_for_select" data-placement="top" title="title" data-content="content"> 
									<option value="">Month</option>
									<option value="01">Jan</option>
									<option value="02">Feb</option>
									<option value="03">Mar</option>
									<option value="04">Apr</option>
									<option value="05">May</option>
									<option value="06">Jun</option>
									<option value="07">Jul</option>
									<option value="08">Aug</option>
									<option value="09">Sep</option>
									<option value="10">Oct</option>
									<option value="11">Nov</option>
									<option value="12">Dec</option>
								</select>    
							</div>   
							<div class="col-md-4">
								<select name="day" id="day" class="form-control validation_for_select" data-placement="top" title="title" data-content="content"> 
									<option value="">Day</option>
									<option value="01">1</option>
									<option value="02">2</option>
									<option value="03">3</option>
									<option value="04">4</option>
									<option value="05">5</option>
									<option value="06">6</option>
									<option value="07">7</option>
									<option value="08">8</option>
									<option value="09">9</option>
									<option value="10">10</option>
									<option value="11">11</option>
									<option value="12">12</option>  
									<option value="13">13</option>
									<option value="14">14</option>
									<option value="15">15</option>
									<option value="16">16</option>
									<option value="17">17</option>
									<option value="18">18</option>
									<option value="19">19</option>
									<option value="20">20</option>
									<option value="21">21</option>
									<option value="22">22</option>
									<option value="23">23</option>
									<option value="24">24</option>
									<option value="25">25</option>
									<option value="26">26</option>
									<option value="27">27</option>
									<option value="28">28</option>
									<option value="29">29</option>
									<option value="30">30</option>
									<option value="31">31</option>
								</select>    
							</div>
							
							<div class="col-md-4">
								<select name="year" id="year" class="form-control validation_for_select" data-placement="top" title="title" data-content="content"> 
									<option value="">Year</option>
									<?php foreach($dates as $date) { ?>
										<option value="<?php echo $date; ?>"><?php echo $date; ?></option>
									<?php } ?>
								</select>    
							</div>   
							
						</div>
						
					</div>     
					
					<div class="form-group">
						<label for="place_of_birth">Place of Birth</label>
						<input type="text" class="form-control for_validation" name="place_of_birth" id="place_of_birth" data-placement="top" title="title" data-content="content">
					</div>
				
					<div class="form-group">
						<label for="age">Age</label>
						<input readonly type="text" class="form-control" name="age" id="age">
					</div>
					
					<div class="form-group">
						<label for="present_address">Present Address</label>
						<input type="text" class="form-control for_validation" name="present_address" id="present_address" data-placement="top" title="title" data-content="content">
					</div>   
					
					<div class="form-group">
						<label for="school_last_attended">School Last Attended</label>
						<input type="text" class="form-control for_validation" name="school_last_attended" id="school_last_attended" data-placement="top" title="title" data-content="content">
					</div>    
					
					<div class="form-group">
						<label for="school_address">School Address</label>
						<input type="text" class="form-control for_validation" name="school_address" id="school_address" data-placement="top" title="title" data-content="content">
					</div>   
				</div>    
				
				<div class="col-md-6">   
					
					<div class="form-group">
						<label for="grade_or_year_level">Grade/Year Level</label>
						<select id="grade_or_year_level" name="grade_or_year_level" class="form-control validation_for_select" data-placement="top" title="title" data-content="content">                                                           
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
						<!--<input type="text" class="form-control" name="school_year" id="school_year">-->   
						<select class="form-control validation_for_select" name="school_year" id="school_year" data-placement="top" title="title" data-content="content">  
							<option value="">&nbsp;</option>  
							<?php foreach($school_years as $school_year) { ?>
								<option value="<?php echo $school_year; ?>"><?php echo $school_year; ?></option>
							<?php } ?>
						</select>
					</div>    	   

					<div class="form-group">
						<label for="tve_specialization">TVE Specialization (for Grade 9 and 4th Yr. Student Only)</label>
						<input type="text" class="form-control for_validation" name="tve_specialization" id="tve_specialization" data-placement="top" title="title" data-content="content">
					</div>    	
					
					<div class="form-group">
						<label for="father">Father</label>
						<input type="text" class="form-control for_validation" name="father" id="father" data-placement="top" title="title" data-content="content">
					</div>       
					
					<div class="form-group">
						<label for="mother">Mother</label>
						<input type="text" class="form-control for_validation" name="mother" id="mother" data-placement="top" title="title" data-content="content">
					</div>      
					
					<div class="form-group">
						<label for="person_to_notify">Person to Notify in Case of Emergency/Guardian</label>
						<input type="text" class="form-control for_validation" name="person_to_notify" id="person_to_notify" data-placement="top" title="title" data-content="content">
					</div>    
					
					<div class="form-group">
						<label for="address">Address</label>
						<input type="text" class="form-control for_validation" name="address" id="address" data-placement="top" title="title" data-content="content">
					</div>  
					
					<div class="form-group">
						<label for="contact_number">Tel. #/Cell #</label>   
						<div class="input-group">
							<div class="input-group-btn phone_select">
								<button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><span class="button_value">Select Phone</span> <span class="caret"></span></button>
								<ul class="dropdown-menu">   
									<li><a class="select_telephone" id="telephone" href="#">Tel #</a></li>
									<li><a class="select_telephone" id="cellphone" href="#">Cell #</a></li>
								</ul>
							</div><!-- /btn-group -->
							<input type="text" readonly class="form-control validation_for_phone_select" name="contact_number" id="contact_number" data-placement="top" title="title" data-content="content">  
							<input type="hidden" id="phone_selected"  name="phone_selected" value="not selected" />
						</div><!-- /input-group -->    
					</div>
 
				</div> <!-- end col-md-6 -->
				
			</div>     
			
			<div class="row">  
				<div class="col-md-12">  
					<button type="submit" class="btn btn-info" id="enrollment_submit" disabled>Submit</button>
				</div>
			</div>   
			
		</form> 
	
	</div>   
	
	<div class="container sixth_tab tabs">    
		<p>Content for the sixth tab</p>
	</div>
	
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
	<script type="text/javascript" src="<?php echo base_url(); ?>scripts/lib/angular/angular.min.js"></script>   
	<script type="text/javascript" src="<?php echo base_url(); ?>scripts/lib/angular/angular-sanitize.min.js"></script> 
	<script type="text/javascript" src="<?php echo base_url(); ?>scripts/js/app.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>scripts/js/services.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>scripts/js/controllers.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>scripts/js/filters.js"></script>  
	
	
</body>
</html>     







































