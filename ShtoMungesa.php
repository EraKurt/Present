<?php 
	require "dbh.php";
	session_start();

	if(isset($_POST['submit1']))
	{
		$studID=$_POST['studID'];//hidden input id e studentit
		$date=$_POST['date'];//data e mungeses
		$tipi=$_POST['selectTipi'];//tipi: seminar , laboratoire, detyre kursi
		$mung=$_POST['mung'];//radio button
		$lendeID=$_POST['lendeID'];//hidden input id e lendes
		$_SESSION['studID']=$studID;
		$_SESSION['lendeID']=$lendeID;
		$dt=date('w',strtotime($date));
		//echo $dt;
		$v=0;
		$sql2="SELECT * FROM seance WHERE IdStudent=$studID AND IdLende=$lendeID";
		if($result=mysqli_query($conn, $sql2))
		{
			if(mysqli_num_rows($result)>0)
			{
				while($row2=mysqli_fetch_assoc($result))
				{
					if($row2['Data']==$date && $row2['Tipi']==$tipi)
					{

						$v++;
					}
				}
		//duhet te bejme nje select per te gjetur ditet kur zhvillohet mesim per nje lende te caktuar
					if($v==0){
						$sql1="SELECT * FROM weekday WHERE IdLenda=$lendeID";
						if($result=mysqli_query($conn, $sql1))
						{
							if(mysqli_num_rows($result)>0)
							{
								$a=array();//do te fusim numrat qe iu korrespondojne diteve te mesimit per nje X lende , dhe do ti krahasojme me daten qe duam te shenojme mungesen. Nese data e mungeses korrespondon me ndonjeren nga ditet e caktuara per mesim (ne kete lende) , atehere do te shenohet presenca/mungesa
								while($row1=mysqli_fetch_assoc($result))
								{
									
									if(strcmp($row1['DitetJaves'], " Monday ")==0)
										$a[]=1;
										
									if(strcmp($row1['DitetJaves'], " Tuesday ")==0)
										$a[]=2;
									if(strcmp($row1['DitetJaves'], " Wednsday ")==0)
										$a[]=3;
									if(strcmp($row1['DitetJaves'], " Thursday ")==0)
										$a[]=4;
									if(strcmp($row1['DitetJaves'], " Friday ")==0)
										$a[]=5;
									if(strcmp($row1['DitetJaves'], " Saturday ")==0)
										$a[]=6;
									if(strcmp($row1['DitetJaves'], " Sunday ")==0)
										$a[]=0;
								}//kemi nje vektor $a qe permban ditet e javes kur zhvillohet lenda.
								$b=0;
								foreach ($a as $value) {
									
									if($value==$dt)
									{
										$sql="INSERT INTO seance(Data, Tipi, Present, IdStudent, IdLende) VALUES('$date', '$tipi', '$mung', '$studID', '$lendeID')";
												if(mysqli_query($conn, $sql))
												{
													header("Location: ShfaqStudentPerLende.php?success=PresenceAdded");
													exit();
												}
												else
													echo "Error".mysqli_error($conn);
												$b++;
									}
								}//nese ka perfunduar cikli dhe serish $b==0, dmth asnje nga elementet e vektorit (ditet e javes) ishte e barabarte me daten tone
									if($b==0)
									{
										header("Location: ShfaqStudentPerLende.php?error=SubjectNotThisDate");
										exit();
									}
								
									
							}
							else 
								echo "Lenda nuk ka dite te percaktuara";
						}	
					}
					else
					{
						header("Location: ShfaqStudentPerLende.php?error=PresenceAlreadyTaken");
							exit();
					}
					
				}
			
			else
			{
				$sql1="SELECT * FROM weekday WHERE IdLenda=$lendeID";
						if($result=mysqli_query($conn, $sql1))
						{
							if(mysqli_num_rows($result)>0)
							{
								$a=array();//do te fusim numrat qe iu korrespondojne diteve te mesimit per nje X lende , dhe do ti krahasojme me daten qe duam te shenojme mungesen. Nese data e mungeses korrespondon me ndonjeren nga ditet e caktuara per mesim (ne kete lende) , atehere do te shenohet presenca/mungesa
								while($row1=mysqli_fetch_assoc($result))
								{
									
									if(strcmp($row1['DitetJaves'], " Monday ")==0)
										$a[]=1;
										
									if(strcmp($row1['DitetJaves'], " Tuesday ")==0)
										$a[]=2;
									if(strcmp($row1['DitetJaves'], " Wednsday ")==0)
										$a[]=3;
									if(strcmp($row1['DitetJaves'], " Thursday ")==0)
										$a[]=4;
									if(strcmp($row1['DitetJaves'], " Friday ")==0)
										$a[]=5;
									if(strcmp($row1['DitetJaves'], " Saturday ")==0)
										$a[]=6;
									if(strcmp($row1['DitetJaves'], " Sunday ")==0)
										$a[]=0;
								}//kemi nje vektor $a qe permban ditet e javes kur zhvillohet lenda.
								$b=0;
								foreach ($a as $value) {
									
									if($value==$dt)
									{
										$sql="INSERT INTO seance(Data, Tipi, Present, IdStudent, IdLende) VALUES('$date', '$tipi', '$mung', '$studID', '$lendeID')";
												if(mysqli_query($conn, $sql))
												{
													header("Location: ShfaqStudentPerLende.php?success=PresenceAdded");
													exit();
												}
												else
													echo "Error".mysqli_error($conn);
												$b++;
									}
								}//nese ka perfunduar cikli dhe serish $b==0, dmth asnje nga elementet e vektorit (ditet e javes) ishte e barabarte me daten tone
									if($b==0)
									{
										header("Location: ShfaqStudentPerLende.php?error=SubjectNotThisDate");
										exit();
									}
								
									
							}
							else 
								echo "Lenda nuk ka dite te percaktuara";
						}	
			}
		}
		else
		echo "Error".mysqli_error($conn);
	}

	if(isset($_POST['delStud']))
	{
		$studID=$_POST['studID'];
		$lendeID=$_POST['lendeID'];
		$sqlDel1="DELETE  FROM seance WHERE IdStudent=$studID AND IdLende=$lendeID";
		if(mysqli_query($conn, $sqlDel1)){
			
			$sqlDel2="DELETE FROM studentlende WHERE IdStudent=$studID AND IdLende=$lendeID";
			if(mysqli_query($conn, $sqlDel2))
			{
				header("Location: ShfaqStudentPerLende.php?success=StudentDeleteFromSubject");
				exit();
			}else
			echo "Error".mysqli_error($conn);
		
		}
	}
		

		
	
?>