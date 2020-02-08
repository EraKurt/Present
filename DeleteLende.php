<?php 
	include 'dbh.php';

 if(isset($_POST['fshi']))
            {   
                  $Idfshi=$_POST['hidID'];
                  $sql1="DELETE FROM seance WHERE IdLende=$Idfshi";
                  if(mysqli_query($conn, $sql1))
                  {
                  	$sql2="DELETE FROM studentlende WHERE IdLende=$Idfshi";
                        if(mysqli_query($conn, $sql2)){
                              $sql3="DELETE FROM weekday WHERE IdLenda=$Idfshi";
                              if(mysqli_query($conn, $sql3))
                              {
                                    $sql="DELETE FROM lenda WHERE IdLenda=$Idfshi";
                                    if(mysqli_query($conn,$sql))
                                    {
                                        header("Location: ShtoKlase.php?success=SubjectDeleteFromLenda");
                                           exit();
                                    }else
                                     echo "Error".mysqli_error($conn);
                              }
                        }
                  	
                  }
            }
?>