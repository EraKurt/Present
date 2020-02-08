<?php 
	session_start();
	require("dbh.php");
	require 'header.php';
	if(!isset($_SESSION['IdStu']))
	{
		header("Location: present1.php");
		exit();
	}

	
	
	?>
<!DOCTYPE html>
<html>
<head>
	<title>Student3</title>
	<style type="text/css">
table#t1
{
	position: fixed;
	top: 300px;
	left: 150px;
	
	background-color: rgba(250,255,255,0.9);
	color:black;border: 1px solid rgba(13,210,210,1);

}
table#t2
{
	position: fixed;
	top: 300px;
	left: 730px;
	
	background-color: rgba(250,255,255,0.9);
	color:black;border: 1px solid rgba(13,210,210,1);

}
table#t3
{
	position: fixed;
	top: 300px;
	left: 1300px;
	
	background-color: rgba(250,255,255,0.9);
	color:black;border: 1px solid rgba(13,210,210,1);

}
th, td
{
	width: 150px;
	height: 25px;
	text-align: center;
	font-size: 22px;
}
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
<body style="background-color: rgba(1,90,88,0.5);">
	<i><a href="logout.php"><button id="butoni" type="submit" name="logout" class="button2">Logout</button></a></i><i><a href="presentStudent.php"><button id="butoni" type="submit" name="back" class="button2" style="top: 135px;">Go Back</button></a></i>
	<p><h1>Details for <?php echo $_SESSION['emStu'] ?><?php echo " ".$_SESSION['mbStu']?> in <?php echo $_SESSION['LEND'] ?> subject.</h1></p>
	<p>
		
			<!--	<tr><td>1</td><td>1</td></tr>
				<tr><td>2</td><td>2</td></tr>

			</tbody>
		</table>-->

		<table id='t1' border='1' ><thead><th>Date</th><th>Seminar</th></thead>
			<tbody>
			<?php 
			$idStu=$_SESSION['IdStu'];
			$IdSubject=$_SESSION['idSub'];//id lendes
			$drow1="";
			$sql1="SELECT * FROM seance WHERE IdLende=$IdSubject AND IdStudent=$idStu AND Tipi='S' AND Present=0";
			
			if($res=mysqli_query($conn, $sql1))
			{$num=mysqli_num_rows($res);
				if($num>0)
				{
					while($row1=mysqli_fetch_assoc($res))
					{
						$drow1.="<tr><td>".$row1['Data']."</td><td>"."abs"."</td></tr>";
					}$drow1.="<tr><td>Total:</td><td>".$num."</td></tr>";
					
					echo $drow1;
				}
			}
			else echo "Error tab1 : ".mysqli_error($conn);
		?>
	
		</tbody>
	</table>
		<table id="t2" border="1">
			<thead>
				<th>Date</th>
				<th>Laboratoire</th>
			</thead>
			<tbody>
					<tbody>
			<?php 
			$idStu=$_SESSION['IdStu'];
			$IdSubject=$_SESSION['idSub'];//id lendes
			$drow1="";
			$sql1="SELECT * FROM seance WHERE IdLende=$IdSubject AND IdStudent=$idStu AND Tipi='L' AND Present=0";
			
			if($res=mysqli_query($conn, $sql1))
			{$num=mysqli_num_rows($res);
				if($num>0)
				{
					while($row1=mysqli_fetch_assoc($res))
					{
						$drow1.="<tr><td>".$row1['Data']."</td><td>"."abs"."</td></tr>";
					}$drow1.="<tr><td>Total:</td><td>".$num."</td></tr>";
					
					echo $drow1;
				}
			}
			else echo "Error tab1 : ".mysqli_error($conn);
		?>

			</tbody>
		</table>
		<table id="t3" border="1">
			<thead>
				<th>Date</th>
				<th>Final Project</th>
			</thead>
			<tbody>
				<?php 
					$idStu=$_SESSION['IdStu'];
					$IdSubject=$_SESSION['idSub'];//id lendes
					$drow1="";
					$sql1="SELECT * FROM seance WHERE IdLende=$IdSubject AND IdStudent=$idStu AND Tipi='FP' AND Present=0";
					
					if($res=mysqli_query($conn, $sql1))
					{$num=mysqli_num_rows($res);
						if($num>0)
						{
							while($row1=mysqli_fetch_assoc($res))
							{
								$drow1.="<tr><td>".$row1['Data']."</td><td>"."abs"."</td></tr>";
							}$drow1.="<tr><td>Total:</td><td>".$num."</td></tr>";
							
							echo $drow1;
						}
					}
					else echo "Error tab1 : ".mysqli_error($conn);
				?>
			</tbody>
		</table>
	</p>

</body>
</html>
