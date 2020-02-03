<?php 
	require "dbh.php";
	session_start();

	if(isset($_POST['addStud']))
	{	
		//Id e lendes na duhet per te shtuar dhe shfaqur studentet e kesaj lende specifike
		//$_SESSION['idLend']=$_POST['hideIdLenda'];
		$hideIdLd=$_SESSION['idLend'];
		$firstname=$_POST['firstname'];
		$lastname=$_POST['lastname'];
		$klasa=$_POST['klasa'];
		$pass=$_POST['password'];
		$idMesues=$_SESSION['id'];
		$sql="SELECT * FROM student WHERE IdMesues=$idMesues";
		if($result=mysqli_query($conn, $sql))
		{
			$num=mysqli_num_rows($result);
			if($num>0)
			{$nr=1;
				while($row=mysqli_fetch_assoc($result))
				{
					if(($row['Emri']==$firstname)&&($row['Mbiemri']==$lastname))
					{
						//$_SESSION['idStud2']=$row['IdStudent'];
						$sql3="SELECT * FROM studentlende WHERE IdLende=$hideIdLd";
						if($res=mysqli_query($conn, $sql3))
						{	$num2=mysqli_num_rows($res);
							if($num2>0)
							{$nr2=1;
								while($row1=mysqli_fetch_assoc($res))
								{
									if($row1['IdStudent']==$row['IdStudent'])
									{
										//ne rast se ekziston studenti te kjo lenda nuk e shtojme
										header("Location: ShfaqStudentPerLende.php#?StudentExists");
										exit();
									}
									else{
										if($nr2==$num2)
										{	//ne rast se ekziston studenti ne databaze por jo te lenda , e shtojme te lenda
											$idSt=$row['IdStudent'];
											$sql4="INSERT INTO studentlende(IdStudent, IdLende) VALUES('$idSt', '$hideIdLd')";
											if(mysqli_query($conn, $sql4)){
													header("Location: ShfaqStudentPerLende.php?success=addExistingStudent");
													exit();
											}
											else echo "Error: ".mysqli_error($conn); 
										}$nr2++;
									}
								}
							}
							else
							{
								$idSt=$row['IdStudent'];
											$sql4="INSERT INTO studentlende(IdStudent, IdLende) VALUES('$idSt', '$hideIdLd')";
											if(mysqli_query($conn, $sql4)){
													header("Location: ShfaqStudentPerLende.php?success=addExistingStudent");
													exit();
											}
							}
						} else echo "Error: ".mysqli.error($conn);
					}else 
					{
						
						if($nr==$num){
						$sql1="INSERT INTO student(Emri, Mbiemri, Klasa, Fjalekalimi, IdMesues) VALUES ('$firstname', '$lastname', '$klasa', '$pass', '$idMesues')";
							if(mysqli_query($conn, $sql1))
							{	//ne rast se studenti nuk ekziston fare ne databaze e shtojme , pasi e kemi krahasuar me studentet ekzistues ne databaze
								$idStudent=mysqli_insert_id($conn);
								$sql2="INSERT INTO studentlende(IdStudent, IdLende) VALUES ('$idStudent', '$hideIdLd')";
								if(mysqli_query($conn, $sql2)){
									header("Location: ShfaqStudentPerLende.php?success=addStudent");
									exit();
								}
								else 
									echo "Error: ".mysqli_error($conn);
							}
						}else echo "Error: ".mysqli_error($conn);
						$nr++;
					}
				}
			}
			else
			{	//rasti kur nuk kemi ende asnje student ne databaze
				$sql1="INSERT INTO student(Emri, Mbiemri, Klasa, Fjalekalimi, IdMesues) VALUES ('$firstname', '$lastname', '$klasa', '$pass', '$idMesues')";
						if(mysqli_query($conn, $sql1))
						{
							$idStudent=mysqli_insert_id($conn);
							$sql2="INSERT INTO studentlende(IdStudent, IdLende) VALUES ('$idStudent', '$hideIdLd')";
							if(mysqli_query($conn, $sql2)){
								header("Location: ShfaqStudentPerLende.php?success=addStudent");
								exit();
							}
							else 
								echo "Error: ".mysqli_error($conn);
						}
			}
			
		}
		
	}
?>