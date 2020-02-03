<?php

session_start();
require 'dbh.php';
  if(isset($_POST['login-sub']))
  {
  	//$conn=mysqli_connect('localhost', 'root', '', 'presentuser');
 	
 	

 	$mailUid=$_POST['user1'];
 	$pass=($_POST['password1']);

 	if(empty($mailUid) || empty($pass))
 	{
 		header("Location: present1.php?error=emptyfields");
		exit();
 	}
 	else
 	{
 		/*$sql="SELECT * FROM mesues WHERE email=?";
 		$stmt=mysqli_stmt_init($conn);
 		if(!mysqli_stmt_prepare($stmt, $sql))
		{
			header("Location: present1.php?error=sqlerror");
			exit();
		}
		else
		{
			mysqli_stmt_bind_param($stmt,"s", $mailUid);
			mysqli_stmt_execute($stmt);
			$result=mysqli_stmt_get_result($stmt);
			if($row=mysqli_fetch_assoc($result))
			{
				//$pass2=password_hash($pass, PASSWORD_DEFAULT);
				$pwdCheck=password_verify($pass, $row['password']);
				if($pwdCheck == false)
				{
					header("Location: present1.php?error=wrongpassword");  
					exit();
				}
				else if($pwdCheck==true)
				{
					session_start();
					$_SESSION['userID']=row['ID'];
					$_SESSION['userFN']=row['firstname'];
					$_SESSION['userLN']=row['lastname'];
					$_SESSION['userEmail']=row['email'];

					header("Location: ShtoKlase.php?login=success");  
					exit();
				}
				else
				{
					header("Location: present1.php?error=wrongpassword");  
					exit();
				}
			}
			else
			{
				header("Location: present1.php?error=nouser"); //in case no match in database with that email 
				exit();
			}
		}
 	}*/

 	//$pass2=password_hash($pass, PASSWORD_DEFAULT);
 	
					
 	$sql="SELECT * FROM mesues WHERE email='$mailUid' AND password='$pass'";
	$result=mysqli_query($conn, $sql);
	$num=mysqli_num_rows($result);
 	if($num==1)
 	{
 		$row1=mysqli_fetch_array($result);
        $name=$row1['firstname'];
        $lname=$row1['lastname'];
        $idMes=$row1['ID'];
 		$_SESSION['nmMesues']=$name;
 		$_SESSION['lnMesues']=$lname;
 		$_SESSION['user1']=$mailUid;
 		$_SESSION['id']=$idMes;
 		header("Location: Faqja2.php?login=success");  
		exit();
 	}
 	else
 	{
 		header("Location: present1.php?error=wrongpassword");  
		exit();
 	}
  }
}
  else
  {
  	header("Location: present1.php");//in case Log in button is not clicked
	exit();
  }
mysqli_close($conn);
?>
