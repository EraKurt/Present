<?php 
	session_start();
	require("dbh.php");
	$IdSubject;
	
	if(isset($_POST['details']))
	{
		$IdSubject=$_POST['IdSub'];
		$sql="SELECT * FROM lenda WHERE IdLenda=$IdSubject";
		if($res=mysqli_query($conn, $sql))
		{
			$num=mysqli_num_rows($res);
			if($num>0)
			{
				$row=mysqli_fetch_assoc($res);
				$_SESSION['LEND']=$row['Pershkrimi'];
				$_SESSION['idSub']=$IdSubject;
				header("Location: presentStudent2.php");
				exit();
			}
		}
		

	}
	
?>