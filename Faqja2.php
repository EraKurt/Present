<?php 
	session_start(); 
	require("header.php");
	if(!isset($_SESSION['user1']))
	header("Location: present1.php");
?>
<!DOCTYPE html>
<html>
<head>
	<title>Register Class</title>
	<style type="text/css">
		*,html,body/*This means we are going to style everything inside , bcs the website has some margins by def*/
		{
			margin: 0;
			padding: 0;
		}

		html,body
		{
			height: 100%
		}
		body
		{
			height: 100vh;
			background-image:linear-gradient(rgba(46, 46, 46, 0.8),rgba(46, 46, 46, 0.8)),url('../Images/wallpaper3.jpg');
			background-size: cover;  /*rgba(46, 46, 46, 0.5),rgba(46, 46, 46, 0.5)*/
			background-attachment: fixed;
		}
		#icon
		{
			top: 20%;
			left: 13%;
			position: absolute;
			margin: 200px;
			border:4px solid rgba(239,120,252,0.9);
			border-radius: 40px;
			/*padding: 20px 50px 50px;*/
			height: 180px;
			width: 250px;
			color:/*rgba(3,1,50,0.9)*/white;
			font-weight: bolder;
			font-family: ;
			font-size: 30px;
			text-align: center;
			background-color: /*rgba(122,197,252,0.7)*/transparent;
			border: none;
		}
		#icon1
		{
			top: 20%;
			left: 55%;
			position: absolute;
			margin: 200px 200px 200px 150px;
			border:4px solid rgba(3,151,182,0.8);
			border-radius: 40px;
			/*padding: 20px 50px 50px;*/
			height: 180px;
			width: 230px;
			color:/*rgba(3,1,50,0.9)*/white;
			font-weight: bolder;
			font-family: ;
			font-size: 30px;
			text-align: center;
			background-color: /*rgba(254,160,184,0.7)*/transparent;
			border: none;
		}
		#plus
		{
			color: violet;
			font-size: 180px;
			background-color: /*rgba(122,197,252,0.7)*/transparent;
			width: 250px;
			height: 200px;
			cursor: pointer;
			
		}
		#plus:hover
		{
			border:5px solid rgba(122,197,252,0.7);
			background-color: rgba(254,218,221,0.2);

		}
		#plus1
		{
			color: /*rgba(4,172,181,0.8)*/violet;
			font-size: 200px;
			background-color: /*rgba(254,160,184,0.7)*/transparent;
			width: 250px;
			height: 200px;
			cursor: pointer;
		}
		#plus1:hover
		{
			border:5px solid rgba(122,197,252,0.7);
			background-color: rgba(254,218,221,0.2);
		}
		#butoni
		{
			top: 70px;
			left: 80%;
			position: absolute;
			width: 150px;
			height: 80px;
			border:2px solid white;
			border-radius: 50px;
			text-decoration: none;
			text-align: center;
			color: #fff;
			background-color:rgba(252,204,139,0.9) ;
			font-size: 20px;
			cursor: pointer;
			text-decoration-line: none;
			font-weight: bolder;
		}
		#butoni:hover
		{
			background-color: rgba(160, 253, 68, 0.9);
		}
		#butoni a
		{
			text-decoration-line: none;
			
		}
		.popup
		{
			background:rgba(249,249,249,0.3); /*rgba(254,219,184,0.6)*/

			width: 100%;
			height: 100%;
			position:absolute;
			margin-top: 200px;
			top: 0;
			display: none;
			justify-content: center;
			align-items: center;
			text-align: center;
		}
		.popup-content
		{
			height: 400px;
			width: 500px;
			background: rgba(29,54,69,0.9) /*rgba(1,92,148,0.9)*/;
			padding: 20px;
			border-radius: 10px;
			position: relative;
			color: rgba(254,219,184,1);
		}
		.login-form2 input,select
		{
			margin: 30px auto;
			display: block;
			width: 50%;
			height: 20%;
			margin-top: 30px;
			padding: 8px;
			border:1px solid gray;
			background-color: transparent;
		}
		 input.button2
		{
			font-family: "Roboto",sans-serif;
			text-transform: uppercase;
			outline: 0;
			background: rgba(253,208,220,0.9);
			width: 100%
			border:0;
			padding: 15px 50px;
			color: black;
			font-size: 14px;
			cursor: pointer;
			border-radius: 200px;
			margin-bottom: 10px;
		}
		input.button2:hover
		{
			background: black;
			transition: 0.5s ;
			color: rgba(253,208,220,0.9)
		}
		input.lenda
		{
			font-family: "Roboto",sans-serif;
			outline: 1;
			background: #f2f2f2;
			width: 100%;
			border: 0;
			margin: 0 0 15px;
			padding: 15px;
			box-sizing: border-box;
			font-size: 14px;
		}
		a
		{
			text-decoration-line: none;
			color: inherit;
		}
		button
		{
			border-radius: 30px;
		}
	</style>
	<link rel="stylesheet" type="text/css" href="css/all.css">
</head>
<body>
	<form method="post" action="Faqja2.1.php" class="login-form2">
	<i><button id="butoni" type="submit" name="logout"><a href="logout.php">Logout</a></button></i>
	<div id="shtoKlase" class="shtoKlase"><a href="#">
		<div id="icon"><h4>Add a new subject</h4>
		<button id="plus" name="plus2"><a href="#popup">+</a></button>
		</div></a>
		<a href="#">
		<div id="icon1"><h4>Subject list</h4><!--Kjo do te na dergoje te ShtoKlase.php , qe ne fakt afishon listen e klasave -->
		<button id="plus1" name="plus1">+</button>
		</div></a>
	</div>
</form>
<div id="popup" class="popup">
	<div class="popup-content">
	<form action="Faqja2.1.php" method="post" class="rregjKlase">
		<input type="text"  class="lenda" name="lenda" placeholder="Give the subject name here" required="required">
		<input type="date" class="lenda" name="dataFillimit" placeholder="Beg-date" required="required">
		<input type="date" name="dataMbarimit" class="lenda" placeholder="End-date">
		<select name="selectDays[]" multiple="multiple">
			<option>Days Met</option>
			<option value="Monday">Monday</option>
			<option value="Tuesday">Tuesday</option>
			<option value="Wednsday">Wednsday</option>
			<option value="Thursday">Thursday</option>
			<option value="Friday">Friday</option>
			<option value="Saturday">Saturday</option>
			<option value="Sunday">Sunday</option>
		</select>
		<input type="button" class="button2" name="close" id="close" value="Close">
		<input type="submit" class="button2" name="addKlase" value="Add Class">
	</form>
</div>
</div>
<script type="text/javascript">
	document.getElementById("plus").addEventListener("click",function(){
			document.querySelector(".shtoKlase").style.display="none";
			document.querySelector(".popup").style.display="flex";})
		document.querySelector("#close").addEventListener("click",function(){
			document.querySelector(".popup").style.display="none";
			document.querySelector(".shtoKlase").style.display="flex";
		})
</script>
</body>
</html>