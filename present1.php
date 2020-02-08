<?php 
include('registration.php');

 ?>
<!DOCTYPE html>
<html>
<head>
	<title>Present</title>

	<link rel="stylesheet" type="text/css" href="Style2.css">
	<link rel="stylesheet" type="text/css" href="css/all.css">
	<link rel="stylesheet" type="text/css" href="C:\Users\User\Documents\Downloads\fontawesome-free-5.12.0-web\css\all.css">
</head>
<body>
	
	<div id="container">
		<div id="main">
	<header>
		<div class="container">
			<div class="row">
				<a href="Present1.php" class="logo"><img src="../Images/logo5.png"></a>
				<nav>
					<ul class="list1">
						<li><a href="Present.html">HOME</a></li>
						<li><a href="#n2">ABOUT US</a></li>
						<li><a href="#n4">CONTACT</a></li>
						<li><a href="#n4">FEATURES</a></li>

					</ul>
				</nav>
			</div>
		</div>
	</header>
	
			<section class="slider">
				<!--<?php //if(isset($_SESSION['userID']))
						{
							//echo '<p class="login-status">You are logged in </p>';
						}
						//else
						{
							//echo '<p class"login-status">You are logged out!</p>';
						}
				 ?>-->
				<div class="login-page">
					<div class="form" id="formi">
						<div class="forma">
						<form class="register-form" method="post" id="formi1" action="registration.php">
							<input type="text" placeholder="First Name*" required="required" id="fnm" name="fn" />
							<input type="text" placeholder="Last Name" name="ln" />
							<input type="email" placeholder="E-mail Address*" required="required" name="user" />
							<input type="password" placeholder="Password*" required="required" name="password" />
							<button type="submit" name="register">Create</button>
							<p class="sms">Already registered?<a href="#" class="clickLog"> Log in</a></p><br>
							<p class="s"><a href="#n5">Do you have an ID?</a></p>
						</form></div><div class="forma">
						<form class="login-form" method="post" id="formi2" action="login.php">
							<input type="email" placeholder="E-mail Address*" name="user1">
							<input type="password" placeholder="Password*" name="password1">
							<button type="submit" name="login-sub">Log in</button>
							<p class="sms">Not Registered? <a href="#" class="clickLog"> Register</a></p><br>
							<p class="s"><a href="#n5">Do you have an ID?</a></p>
						</form></div>
					</div>
				</div>
			</section>
			<section id="n2">
				<div class="about">
					<div id="us">
						<h1 class="exp">PRESENT - Free attendance tracking software</h1>
						<h2 id="exp-soft">For teachers , students , schools , child care facilities , martial art classes , employer attendance and more.</h2>
						<p class="report"><h3 id="none">By using Present teachers,employers can manage classes , track attendance , publish notification and important news.<h3></p>
					</div>
				</div>
			</section>
			<section id="n3">
				<div class="resht">
					
					<span class="spa">
						<div class="blk">
							<span class="icon"><i class="fas fa-calendar-alt fa-2x"></i></span><br><br>
							<h2>Tracking and reporting attendance</h2><br><br>
							<p><h3>Through <span id="blue">Present</span> is possible to add classes and students very easy and from anywhere you can access the internet.<h3></p>
						</div>
					</span>
					<span class="spa">
					 	<div class="blk">
					 		<span class="icon"><i class="fas fa-users fa-2x"></i></span><br><br>
							<h2>Easy & Peasy</h2><br><br>
							<p><h3>Students and employees will be able to follow their attendance reports and be notified for everything. They can log in throught this portal.<h3></p>
						</div>
					</span>
					<span class="spa">
						<div class="blk">
							<span class="icon"><i class="fas fa-user-secret fa-2x"></i></span><br><br>
							<h2>Privacy policy</h2><br>
							<p><h3>One of our main commitment is to safeguard the privacy of our users. By collecting personally identifiable information, we aim to proccess these data for the purposes of the website.<h3></p>
						</div>
					</span>
					
				</div>
			</section>
			<section id="n5">
				
				<div id="popup" class="popup">
					<div class="popup-content">
						<form class="login-form2"  action="loginStudent.php" method="post" >
							<a href="#n5"><i id="x" class="far fa-times-circle fa-2x"></i></a>
							<i class="fas fa-graduation-cap fa-3x"></i><br>
							<input type="id" placeholder="ID" name="student">
							<input type="password" placeholder="Password" name="password2">
							<button class="button2" type="submit" name="login-sub2" >Log in</button><br>
							<p class="s2"><a href="mailto:yourprof@yahoo.com">Forgot your password?</a></p>
						</form>
					</div>
				</div>
			
			<div class="pjesaLogin" id="pjesaLogin">
				<h2>Do you have an ID?</h2>
				<a href="#popup" id="button22" class="button22">Login</a>
			</div>
			</section>
			<section id="n4">
				<div class="upperFoot"><i class="fas fa-envelope fa-3x"></i>
					<div id="feature"><h3 id="onlyFet">Features<h3>
						<ul id="ft">
							<li>Free Attendance Entry Software</li>
							<li>Student , Class Dashboards</li>
							<li>Customizable Online Reporting</li>
							<li>Simple Data Import/Export</li>
					 	</ul>
					 </div>
				</div>
				<div class="upperFoot"><h2>Contact Us</h2><br><a href="mailto:eranda.kurtulaj@fti.edu.al">SEND US AN E-MAIL</a>
					
				</div>
			</section>

		</div>
	</div>
	
	<footer id="footer">
		<span id="foot">Made with <i class="fas fa-heart"></i> and <i class="fas fa-mug-hot"></i> in Tirana, Albania.</span>&copy; 2019 Present. All rights reserved. <a href="#main" id="up"><h1>^</h1></a>
	</footer>

	<!--jQuery code to change from login to register-->
	<script src='https://code.jquery.com/jquery-3.4.1.min.js'></script>
	<script>
		$('.sms a').click(function(){
		$('#formi1, #formi2').animate({height: "toggle",opacity: "toggle"},"slow");});

		document.getElementById("button22").addEventListener("click",function(){
			document.querySelector(".pjesaLogin").style.display="none";
			document.querySelector(".popup").style.display="flex";})
		document.querySelector("#x").addEventListener("click",function(){
			document.querySelector(".popup").style.display="none";
			document.querySelector(".pjesaLogin").style.display="flex";
		})
		//document.getElementById("fnm").focus();
	</script>

</body>
</html>