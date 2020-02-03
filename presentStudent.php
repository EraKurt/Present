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
</head>
<body>
	<h1>Welcome <?php echo $_SESSION['emStu'] ?><?php echo " ".$_SESSION['mbStu'] ?></h1>
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