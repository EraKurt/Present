<?php 
	session_start(); 
	require("header.php");
	require "dbh.php";
	if(!isset($_SESSION['IdStu']))
	{
		header("Location: present1.php");
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Student Page</title>
	<link rel="stylesheet" type="text/css" href="StyleStudent.css">
	<style type="text/css">
		 button.button2
{
	top: 70px;
	left: 80%;
	position: absolute;
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
button.button2:hover
{
	background: black;
	transition: 0.5s ;
	color: rgba(253,208,220,0.9)
}
	</style>
</head>
<body>
	<h1>Welcome <?php echo $_SESSION['emStu'] ?><?php echo " ".$_SESSION['mbStu'] ?></h1>
	<i><a href="logout.php"><button id="butoni" type="submit" name="logout" class="button2">Logout</button></a></i>
	<div class="lendStud">
		<?php 
			$sql="SELECT * FROM ((studentlende INNER JOIN student ON studentlende.IdStudent=student.IdStudent) INNER JOIN lenda ON studentlende.IdLende=lenda.IdLenda) WHERE student.IdStudent=".$_SESSION['IdStu'];
			if($result=mysqli_query($conn, $sql))
			{
				$num=mysqli_num_rows($result);
				if($num>0)
				{
					while($row=mysqli_fetch_assoc($result))
					{
						$thisrow="<div class='lendeMung'><p id='emLende'>".$row['Pershkrimi']."</p><p id='infoLenda'><h2><span>Start day: ".$row['DataFillimit']." </span><span> End day: ".$row['DataMbarimit']."</span></h2></span></p></div>";
						echo $thisrow;
					}
				}
			}
		?>
	 </div><div class="lendStud" id="lendStud1"> Mungesat per lendet </div>
</body>
</html>