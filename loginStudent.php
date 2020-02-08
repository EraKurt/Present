<?php 
	session_start();
	require 'dbh.php';
	

	if(isset($_POST['login-sub2']))
	{
		$idStu=$_POST['student'];
		$pass=$_POST['password2'];
		
		if(empty($idStu) || empty($pass))
	 	{
	 		header("Location: present1.php?error=emptyfields");
			exit();
	 	}
	 	else
	 	{
	 		$sql="SELECT * FROM student WHERE IdStudent='$idStu' AND Fjalekalimi='$pass' ";
	 			if($result=mysqli_query($conn, $sql)){
	 			$num=mysqli_num_rows($result);
	 			if($num>0)
	 			{
	 				$row=mysqli_fetch_array($result);
	 				$emri=$row['Emri'];
	 				$mbiemri=$row['Mbiemri'];
	 				$id=$row['IdStudent'];
	 				$idM=$row['IdMesues'];
	 				$sql1="SELECT * FROM mesues WHERE ID=$idM";
	 				$res=mysqli_query($conn, $sql1);
	 				$row1=mysqli_fetch_assoc($res);
	 				$emM=$row1['firstname'];
	 				$mbB=$row1['lastname'];
	 				$_SESSION['emStu']=$emri;
	 				$_SESSION['mbStu']=$mbiemri;
	 				$_SESSION['IdStu']=$idStu;
	 				$_SESSION['myTeacherE']=$emM;
	 				$_SESSION['myTeacherM']=$mbB;
	 				header("Location: presentStudent.php?login=success");  
					exit();
	 			}
	 			else
			 	{
			 		header("Location: present1.php?error=wrongpassword");  
					exit();
			 	}
	 		}
	 		
	 	}
	}
	else
  {
  	header("Location: present1.php?notClicked");//in case Log in button is not clicked
	exit();
  }
	 
mysqli_close($conn);

?>