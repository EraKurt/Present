<?php 
	//require("ShtoKlase.php");
	include("dbh.php");
	session_start();

	if(isset($_POST['shfaqStu']))
	{
		$hideIdLd=$_POST['hideIdLenda'];//Id e lendes na duhet per te shtuar dhe shfaqur studentet e kesaj lende specifike
		$_SESSION['idLend']=$hideIdLd;
		$sql="SELECT * FROM lenda WHERE IdLenda=$hideIdLd";
		if($result=mysqli_query($conn, $sql))
		{
			$num=mysqli_num_rows($result);
			if($num>0)
			{
				$row=mysqli_fetch_assoc($result);
				$_SESSION['emriLendes']=$row['Pershkrimi'];
				header("Location: ShfaqStudentPerLende.php");
				exit();
			}
		}
	}

	

	?>