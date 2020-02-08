<?php 
	include "dbh.php";
	session_start();
	if(isset($_POST['fshiAc']))
	{
		$id=$_SESSION['id'];
		$sql="SELECT * FROM lenda WHERE IdMesues=$id";
		if($res=mysqli_query($conn, $sql))
		{
			if(mysqli_num_rows($res)>0)
			{
				while($row=mysqli_fetch_assoc($res))
				{
					$idL=$row['IdLenda'];
					$sql="DELETE FROM weekday WHERE IdLenda=$idL";
					mysqli_query($conn, $sql);
					$sql2="DELETE FROM seance WHERE IdLende=$idL";
					mysqli_query($conn, $sql2);
					$sql3="DELETE FROM studentlende WHERE IdLende=$idL";
					mysqli_query($conn, $sql3);
				}
			}
		}else echo "Error2".mysqli_error($conn);
		$sql1="DELETE FROM lenda WHERE IdMesues=$id";
		mysqli_query($conn, $sql1);
		$sql2="SELECT * FROM student WHERE IdMesues=$id";
			if($res2=mysqli_query($conn, $sql2))
			{
				if(mysqli_num_rows($res2)>0)
				{
					while($row=mysqli_fetch_assoc($res2))
					{
						$idS=$row['IdStudent'];
						$sql="DELETE FROM seance WHERE IDStudent=$idS";
						mysqli_query($conn, $sql);
						$sql1="DELETE FROM studentlende WHERE IdStudent=$idS";
						mysqli_query($conn, $sql1);
					}
				}
			}else echo "Error3".mysqli_error($conn);
			$sql3="DELETE FROM student WHERE IdMesues=$id";
			mysqli_query($conn, $sql3);
			$sql4="DELETE FROM mesues WHERE ID=$id";
				if(mysqli_query($conn, $sql4))
				{
					header("Location: present1.php?success=AccountDeleteFromMesues");
					exit();
				}
					else
					echo "Error1".mysqli_error($conn);
				
			
		
	}
?>