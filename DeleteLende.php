<?php 
	include 'dbh.php';

 if(isset($_POST['fshi']))
            {   
                  $Idfshi=$_POST['hidID'];
                  $sql1="SELECT * FROM studentlende WHERE IdLende=$Idfshi";
                  if($result1=mysqli_query($conn, $sql1))
                  {
                  	$num1=mysqli_num_rows($result1);
                  	if($num>0)
                  	{
                  		$sql2="DELETE FROM studentlende WHERE ID=$Idfshi";
                  		if($result3=mysqli_query($conn, $sql2))
                  			echo "Rreshti nga tabela studentlende u fshi";
                  	}
                  }
                  $sql="DELETE FROM lenda WHERE IdLenda=$Idfshi";
                  if($result=mysqli_query($conn,$sql))
                  {
                        echo"Rreshti u fshi";
                  }
            }
?>