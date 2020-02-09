<?php

	
	session_start();
	//$conn=mysqli_connect('localhost', 'root', '', 'presentuser');
	require 'dbh.php';
	

	if(isset($_POST['register'])){
	$firstname=test_input($_POST['fn']);
	$lastname=test_input($_POST['ln']);
	$email=test_input($_POST['user']);
	$pass=test_input($_POST['password']);

	$sql="SELECT * FROM mesues WHERE email='$email'";
	$result=mysqli_query($conn, $sql);
	$num_rows=mysqli_num_rows($result);

	if($num_rows==1)
		echo "Email already taken . Try another one.";
	else
	{
		if(empty($firstname) || empty($lastname) || empty($email) || empty($pass)){
			header("Location: present1.php?error=emptyfields&fn=".$firstname."&ln=".$lastname."&user=".$email);
			exit();
		}
		else if(!filter_var($email,FILTER_VALIDATE_EMAIL) && !preg_match("/^[a-zA-Z0-9]*$/", $firstname)) 
		{
			header("Location: present1.php?error=invalidmail");
			exit();
		}

		else if(!filter_var($email,FILTER_VALIDATE_EMAIL))//instead of the pattern 
		{
			header("Location: present1.php?error=invalidmail&fn=".$firstname."&ln=".$lastname);
			exit();
		}
		/*else if(!preg_match("/^[a-zA-Z0-9]*$/", $firstname))
		{
			header("Location: present1.php?error=invalidfirstname&ln=".$lastname."&user=".$email);
			exit();
		}
		else if(!preg_match("/^[a-zA-Z0-9]*$/", $lastname))//think it twice
		{
			header("Location: present1.php?error=invalidlastname&fn=".$firstname."&user=".$email);
			exit();
		}*/
		else if(!preg_match("/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d]{8,}$/", $pass))
		{
			header("Location: present1.php?error=AtLeastOneUpperCaseAtLeastOneNumber8Chars+");
			exit();
		}

else{//checks if an existing email is already in the database **
		$sql="SELECT email FROM mesues WHERE email=?";//if si kusht kontrolli eshte edhe nje tjeter param , we use AND edhe "ss" in line te .._bind_param()
		$stmt=mysqli_stmt_init($conn);
		if(!mysqli_stmt_prepare($stmt, $sql))
		{
			header("Location: present1.php#?error=sqlerror");
			exit();
		}
		else{
			mysqli_stmt_bind_param($stmt,"s", $email);//determines the statement we want to bind ,the user given parameters, "s" connected with ? in line with $sql
			mysqli_stmt_execute($stmt);//rezultati na kthen nese ekziston ne database ose jo nje email i njejte
			mysqli_stmt_store_result($stmt);//stores the result of checking in the database /fetching from DB
			$resultCheck=mysqli_stmt_num_rows($stmt);//how many matching rows , bcs we get the result in row nums
			if($resultCheck > 0)//technically 1 row is enough
			{
				header("Location: present1.php?error=emailTaken&fn=".$firstname);
				exit();
			}
			else{
					/*$sql2="INSERT INTO mesues(firstname, lastname, email, password) VALUES (?, ?, ?, ?)";
					$stmt=mysqli_stmt_init($conn);
					if(!mysqli_stmt_prepare($stmt, $sql))
					{
						header("Location: present1.php?error=sqlerror");
						exit();
					}
					else
					{
						 //then include in the next line the encrypted password
						mysqli_stmt_bind_param($stmt,"sss",$firstname, $lastname, $email, $hashedPwd);
						mysqli_stmt_execute($stmt);
						header("Location: present1.php?signup=success");
						exit();
						
					}*/
					//$hashedPwd=password_hash($pass, PASSWORD_DEFAULT); 
				$reg="INSERT INTO mesues(firstname, lastname, email, password) VALUES ('$firstname', '$lastname', '$email', '$pass')";
				
				if(mysqli_query($conn, $reg))
				{
					$_SESSION['user1']=$email;
					$_SESSION['nmMesues']=$firstname;
	 				$_SESSION['lnMesues']=$lastname;
	 				$_SESSION['id']=mysqli_insert_id($conn);
					header("Location: Faqja2.php?signup=success");
						exit();
				}
				
			}
			
	}mysqli_stmt_close($stmt);
	
}
}
	mysqli_close($conn);
}
/*else
{
	header("Location: present.php");//in case Create button is not clicked
	exit();
}*/
	
function test_input($data) {
  $data = trim($data);//Strip unnecessary characters (extra space, tab, newline) from the user input data 
  $data = stripslashes($data);//Remove backslashes (\) from the user input data
  $data = htmlspecialchars($data);//The htmlspecialchars() function converts special characters to HTML entities
  return $data;
}


 ?>