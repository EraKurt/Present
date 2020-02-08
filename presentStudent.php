<?php 
	session_start(); 
	require("header.php");
	require "dbh.php";
	if(!isset($_SESSION['IdStu']))
	{
		header("Location: present1.php");
	}

	if(isset($_POST['find']))
	{
		$searchText=$_POST['search'];
		$drow="";
		$sql2="SELECT * FROM (studentlende INNER JOIN lenda ON studentlende.IdLende=lenda.IdLenda) WHERE lenda.Pershkrimi LIKE '%$searchText%' AND studentlende.IdStudent=".$_SESSION['IdStu'];
		$drow.="<div class='lendStud' id='lendStud1' style='width: 500px;right:50px;background-color: rgba(181,228,240,0.5);'>";
		if($res=mysqli_query($conn, $sql2))
		{
			if(mysqli_num_rows($res)>0)
			{
				while($row2=mysqli_fetch_assoc($res))
				{
					
					$drow.="<div class='lendeMung1'><p id='emLende'>".$row2['Pershkrimi']."</p><p id='infoLenda'><h3>Start day: ".$row2['DataFillimit']."</p><p>  End day: ".$row2['DataMbarimit']."</h3></p><p><h3>Weekdays: </h3><br>";
								$sql2="SELECT * FROM weekday WHERE IdLenda=".$row2['IdLenda'];
								$result2=mysqli_query($conn, $sql2);
								while($rowDay=mysqli_fetch_assoc($result2))
								{
									$drow.="<i id='dJava1'><h3 style='display:inline;'> ".$rowDay['DitetJaves']." </h3></i>";
								}
								$drow.="</p><p><a href='#emLende".$row2['IdLenda']."'><input type='submit' name='details1' value='Go' style='height: 30px;cursor:pointer;width: 60px;border-radius: 10px;background-color: lightblue;'></a></p></div>";
				}$drow.="</div>";
				echo $drow;
			}
		}else echo "Error : ".mysqli_error($conn);
		

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
	<form method="post" action="presentStudent.php" style="position: absolute;top: 150px;right: 40px; ">
		<input type="text" name="search" id="search" placeholder="Search Subject" style="color:black;height: 30px;width:230px;border:1px solid lightblue;background-color: rgba(181,228,240,0.5);">
		<input type="submit" name="find" value="Find" style="height: 30px;cursor:pointer;width: 60px;border-radius: 10px;background-color: lightblue;">
	</form>
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

						$thisrow="<div class='lendeMung'><p style='font-size: 25px;color: red;text-align: center;' id='emLende".$row['IdLenda']."'>".$row['Pershkrimi']."</p><p id='infoLenda'><h2><span>Start day: ".$row['DataFillimit']." </span><span> End day: ".$row['DataMbarimit']."</span></h2></span></p><p><h2><span>Weekdays: </h2><br>";
								$sql2="SELECT * FROM weekday WHERE IdLenda=".$row['IdLenda'];
								$result2=mysqli_query($conn, $sql2);
								while($rowDay=mysqli_fetch_assoc($result2))
								{
									$thisrow.="<span id='dJava'>".$rowDay['DitetJaves']."</span>";
								}
								
								$thisrow.="</span></p><p><form action='presentStudent3.php' method='post'><input type='hidden' name='IdSub' value='".$row['IdLenda']."'><input type='submit' name='details' value='Details' style='height: 30px;cursor:pointer;width: 60px;border-radius: 10px;background-color: lightblue;'></form></p></div>";
						echo $thisrow;
					}
				}
			}
		?>
	 </div>
</body>
</html>