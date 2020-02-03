<?php  
//session_start();
include("dbh.php");
include("ShtoStudent.php");
	require 'header.php';
	if(!isset($_SESSION['user1']))
	header("Location: present1.php");
	//exit();

?>
<!DOCTYPE html>
<html>
<head>
	<title>Register a class</title>
	
	<link rel="stylesheet" type="text/css" href="StyleLende.css">
</head>
<body>
<h1>Welcome <?php echo $_SESSION['nmMesues'] ?><?php echo " ".$_SESSION['lnMesues'] ?><br> Add a class</h1>
<i><a href="logout.php"><button id="butoni" type="submit" name="logout" class="button2">Logout</button></a><a href="Faqja2.php"><button class="button2" type="submit" name="shtoklase">Add class</button></a></i>
<?php 
	if(isset($_POST['logout']))
	{
		header("Location: logout.php");  
		exit();
	}
	if(isset($_POST['shtoklase']))
	{
		header("Location: Faqja2.php?ShtoKlase");  
		exit();
	}
?>
	<div class="shfaqKlase">
		<!--<table border="1" style="background-color: lightpink;">
			<thead>
				<th>Description: </th>
				<th>Start date: </th>
				<th>End date: </th>
				<th colspan="2">Weekday: </th>
				<th>Student: </th>
				<th>Delete: </th>

			</thead>
			<tbody>
				<?php 
					/*$sql="SELECT * FROM lenda WHERE IdMesues=".$_SESSION['id'];
					if($result=mysqli_query($conn, $sql))
					{
						$num=mysqli_num_rows($result);
						if($num>0)
						{
							while($row=mysqli_fetch_assoc($result))
							{
								$thisrow="<tr><td>".$row['Pershkrimi']."</td><td>".$row['DataFillimit']."</td><td>".$row['DataMbarimit']."</td>";
								$sql2="SELECT * FROM weekday WHERE IdLenda=".$row['IdLenda'];
								$result2=mysqli_query($conn, $sql2);
								$thisrow.="<td colspan='2'>";
								$thisrow.="<table><tbody>";
								while($rowDay=mysqli_fetch_assoc($result2))
								{
									$thisrow.="<tr><td>".$rowDay['DitetJaves']."</td></tr>";
								}
								$thisrow.="</tbody></table>";
								$thisrow.="</td><td><form action='ShtoStudent.php' method='post'><input type='hidden' name='hideIdLenda' value='".$row['IdLenda']."'><input style='margin:10px;' type='submit' name='shfaqStu' value='Student List'></form></td><td><form action='DeleteLende.php' method='post'><input type='hidden' name='hidID' value='".$row['IdLenda']."'><input type='submit' name='fshi' value='Delete Subject'></form></td></tr>";
								echo $thisrow;
								
							}
						}
					}
					else
						echo "Error:".$sql." ".mysqli_error($conn);*/
				?>
			</tbody>-->
			<div class="header">
				<span style="color: rgba(112,16,92,0.9);font-size: 35px;">Subject: </span>
			</div>
			<?php 
				$sql="SELECT * FROM lenda WHERE IdMesues=".$_SESSION['id'];
					if($result=mysqli_query($conn, $sql))
					{
						$num=mysqli_num_rows($result);
						if($num>0)
						{
							while($row=mysqli_fetch_assoc($result))
							{
								$thisrow="<div class='njeLende'><div class='njeLende1'><p id='lendet'>".$row['Pershkrimi']."</p><p><span>Start day: ".$row['DataFillimit']."</span><span>End date: ".$row['DataMbarimit']."</span></p><p>Weekdays: <br>";
								$sql2="SELECT * FROM weekday WHERE IdLenda=".$row['IdLenda'];
								$result2=mysqli_query($conn, $sql2);
								while($rowDay=mysqli_fetch_assoc($result2))
								{
									$thisrow.="<span id='dJava'>".$rowDay['DitetJaves']."</span>";
								}
								
								$thisrow.="</p></div><div id='njeLende1'><p id='butLenda'><h1><form action='ShtoStudent.php' method='post'><input type='hidden' name='hideIdLenda' value='".$row['IdLenda']."'><input style='margin:10px;' type='submit' name='shfaqStu' class='buttoni2' value='Student List'></form></td><td><form action='DeleteLende.php' method='post'><input type='hidden' name='hidID' value='".$row['IdLenda']."'><input class='buttoni2' type='submit' name='fshi' value='Delete Subject'></form></h1><p></div><hr></div>";
								echo $thisrow;
							}
						}
					}
					else
						echo "Error:".$sql." ".mysqli_error($conn);

			?>
	</div>
<div><h1>Era</h1></div>
</body>
</html>