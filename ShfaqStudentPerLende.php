<?php 
	
	include ('dbh.php');
	include 'header.php';
	include("RegisterStudent.php");
	if(!isset($_SESSION['user1']))
	header("Location: present1.php");
?>
<!DOCTYPE html>
<html>
<head>
	<title>Show Student/Class </title>
	<link rel="stylesheet" type="text/css" href="StudentPerLende.css">
</head>
<body>
	<p style="margin-top: 5px;"><h1>Student list for <?php echo $_SESSION['emriLendes'] ?> class</h1></p>

<i><a href="logout.php"><button id="butoni" type="submit" name="logout" class="button2">Logout</button></a><a href="ShtoKlase.php"><button class="button2" type="submit" name="shtoklase">Show class</button></a></i>
	<div class="shtoKlase" id="shtoKlase">
		<p style="margin-bottom: 30px;padding-bottom: 20px; "><h1 style="padding: 10px;"><a href="#popup" id="shto" style="border:1px solid white;background-color: rgba(50,241,222,0.9);padding: 4px;border-radius: 5px;">Add Student</a></h1></p>
	
	<div style="margin-top:50px; padding: 10px;position: fixed; ">
		<table border='1' style="background-color: rgba(250,255,255,0.9); color:black; margin-top: 50px;border: 1px solid rgba(13,210,210,1); ">
			<thead>
				<th>ID: </th>
				<th>First Name: </th>
				<th>Last Name: </th>
				<th>Klasa: </th>
				

			</thead>
			<tbody>
				<?php 
				$idM=$_SESSION['id'];
				$idL=$_SESSION['idLend'];
					$sql="SELECT student.IdStudent, student.Emri, student.Mbiemri, student.Klasa  FROM ((studentlende INNER JOIN student ON studentlende.IdStudent=student.IdStudent)INNER JOIN lenda ON studentlende.IdLende=lenda.IdLenda) WHERE student.IdMesues=$idM AND lenda.IdMesues=$idM AND studentlende.IdLende=$idL";
					if($result=mysqli_query($conn, $sql))
					{
						$num=mysqli_num_rows($result);
						if($num>0)
						{
							while($row=mysqli_fetch_assoc($result))
							{
								$thisrow="<tr><td>".$row['IdStudent']."</td><td>".$row['Emri']."</td><td>".$row['Mbiemri']."</td><td>".$row['Klasa']."</td></tr>";
								echo $thisrow;
								
							}
						}
					}
					else
						echo "Error:".$sql." ".mysqli_error($conn);
				?>
			</tbody>
		</table>
	</div>
</div>
<div id="popup" class="popup">
	<div class="popup-content">
		<form action="RegisterStudent.php" method="post" class="rregjKlase">
			<input type="text"  class="stud" name="firstname" placeholder="First Name" required="required">
			<input type="text"  class="stud" name="lastname" placeholder="Last Name" required="required">
			<input type="text"  class="stud" name="klasa" placeholder="Class Name">
			<input type="password"  class="stud" name="password" placeholder="Password" required="required">
			<input type="button" class="button2" name="close" id="close" value="Close">
			<input type="submit" class="button2" name="addStud" value="Add Student">
		</form>
	</div>
</div>
<script type="text/javascript">
		document.querySelector("#shto").addEventListener("click",function(){
			document.querySelector(".popup").style.display="flex";
			document.querySelector(".shtoKlase").style.display="none";
		document.querySelector("#close").addEventListener("click",function(){
			document.querySelector(".shtoKlase").style.display="flex";
			document.querySelector(".popup").style.display="none";})
		
		})
</script>
</body>
</html>