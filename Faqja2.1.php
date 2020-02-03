<?php
	session_start();
require 'dbh.php';
if(isset($_POST['plus1']))
{
	header("Location: ShtoKlase.php?shtoklase");  
		exit();
}
if(isset($_POST['plus2']))
{
	header("Location: Faqja2.php#popup?shtoklase");  
		exit();
}
if(isset($_POST['addKlase']))
{
	
	$emriLendes=$_POST['lenda'];
	$_SESSION['emLend']=$emriLendes;
	$dtFillimit=$_POST['dataFillimit'];
	$dtMbarimit=$_POST['dataMbarimit'];
	$idMesues=$_SESSION['id'];

	$sql1="SELECT Pershkrimi FROM lenda WHERE IdMesues=$idMesues";
	if($result=mysqli_query($conn, $sql1))
	{
		if(mysqli_num_rows($result)>0)
		{	$nr=1;
			while($row=mysqli_fetch_assoc($result))
			{
				if($row['Pershkrimi']==$emriLendes)
				{
					header("Location: Faqja2.php?Error=ClassExists");
					exit();
				}
				else
				{
					if($nr==$num)
					{
						$sql="INSERT INTO lenda(Pershkrimi, DataFillimit, DataMbarimit, IdMesues) VALUES ('$emriLendes', '$dtFillimit', '$dtMbarimit', '$idMesues')";
						if(mysqli_query($conn, $sql))
						{
							$id=mysqli_insert_id($conn);
							$selectdays=$_POST['selectDays'];
							if($selectdays)
							{
								foreach ($selectdays as $days) {
									mysqli_query($conn, "INSERT INTO weekday (IdLenda, DitetJaves) VALUES(".$id.", ' ".mysqli_real_escape_string($conn, $days)." ')");	
								}
							}header("Location: ShtoKlase.php?Success=ClassAdded");
								exit();
							
						}
						else
							echo "Error in adding class: ".mysqli_error($conn);
					}else echo "Error in adding class: ".mysqli_error($conn);
					$nr++;
				}
			}
		}
		$sql="INSERT INTO lenda(Pershkrimi, DataFillimit, DataMbarimit, IdMesues) VALUES ('$emriLendes', '$dtFillimit', '$dtMbarimit', '$idMesues')";
						if(mysqli_query($conn, $sql))
						{
							$id=mysqli_insert_id($conn);
							$selectdays=$_POST['selectDays'];
							if($selectdays)
							{
								foreach ($selectdays as $days) {
									mysqli_query($conn, "INSERT INTO weekday (IdLenda, DitetJaves) VALUES(".$id.", ' ".mysqli_real_escape_string($conn, $days)." ')");	
								}
							}header("Location: ShtoKlase.php?Success=ClassAdded");
								exit();
							
						}
						else
							echo "Error in adding class: ".mysqli_error($conn);
	}

	
	
}

mysqli_close($conn);
 ?>