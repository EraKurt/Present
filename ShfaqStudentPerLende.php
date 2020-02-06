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
	<style type="text/css">
		th , td
		{
			width: 150px;
			height: 30px;
			text-align: center;
			font-size: 22px;
			font-family: "Times New Roman";
		}
		.open-button
		{
			background-color: rgba(29,252,123,0.9);
			padding: 5px;
			padding-right: 7px;
			padding-right: 7px;
			font-size: 20px;
			cursor: pointer;
			margin-left: 5px;
			margin-right: 5px;
			margin: 5px;
			color: black;
			text-align: center;
		}
		/*.form-popup
		{
			display:none;
			left: 580px;
			position: relative;
			background-color: rgba(188,254,216,0.6);
			
		}
		.form-container
		{
			
			padding: 10px;
			width: 400px;
			border: 1px solid green;
			margin: 5px;
		}*/
	</style>
	
</head>
<body>
	<p style="margin-top: 5px;"><h1 style="background-color: rgba(221,255,236,0.2); width: 700px;padding-left: 50px;">Student list for <?php echo $_SESSION['emriLendes'] ?> subject</h1></p>

<i><a href="logout.php"><button id="butoni" type="submit" name="logout" class="button2">Logout</button></a><a href="ShtoKlase.php"><button class="button2" type="submit" name="shtoklase">Show subject</button></a></i>
	<div class="shtoKlase" id="shtoKlase" style="margin-bottom: 50px;">
		<p style="margin-bottom: 30px;padding-bottom: 20px; "><h1 style="padding: 20px;margin-left: 30px"><a href="#popup" id="shto" style="border:1px solid white;background-color: rgba(50,241,222,0.9);padding: 4px;border-radius: 5px;">Add Student</a></h1></p>
	
	<div style="margin-top:50px; padding-left: 50px;position: absolute; padding-top: 25px;margin-bottom: 50px;">
		<table id="tabelaStudent" border="1" style="background-color: rgba(250,255,255,0.9); color:black;border: 1px solid rgba(13,210,210,1); ">
			<thead>
				<th>ID: </th>
				<th>First Name: </th>
				<th>Last Name: </th>
				<th>Class: </th>
				<th>Data: </th>
				<th>Sem/Lab/Final Project: </th>
				<th>Present/Absent: </th>
				<th>Take: </th>
				<th>Delete from subject: </th>

			</thead>
			<tbody>
				<?php 
				$idM=$_SESSION['id'];
				$idL=$_SESSION['idLend'];
					$sql="SELECT student.IdStudent, student.Emri, student.Mbiemri, student.Klasa,lenda.IdLenda  FROM ((studentlende INNER JOIN student ON studentlende.IdStudent=student.IdStudent)INNER JOIN lenda ON studentlende.IdLende=lenda.IdLenda) WHERE student.IdMesues=$idM AND lenda.IdMesues=$idM AND studentlende.IdLende=$idL";
					if($result=mysqli_query($conn, $sql))
					{
						$num=mysqli_num_rows($result);
						if($num>0)
						{
							while($row=mysqli_fetch_assoc($result))
							{
								$thisrow="<tr><td>".$row['IdStudent']."</td><td>".$row['Emri']."</td><td>".$row['Mbiemri']."</td><td>".$row['Klasa']."</td><td><form action='ShtoMungesa.php' method='post' class='form-container'><input required='required' type='date' id='date' name='date' style='height:30px;margin:5px;'></td><td><select required style='height:30px;' name='selectTipi' id='selectTipi'><option value='S'>S</option><option value='L'>L</option><option value='FP'>FP</option></select></td><td><input required='required' style='width:20px;height:20px;margin-right:7px;' type='radio' name='mung' class='mung' value='1'>Present<br><input style='width:20px;height:20px;margin-right:7px;' type='radio' class='mung' name='mung' value='0'>Absent<br></td><td><input type='hidden' name='studID' value='".$row['IdStudent']."'><input type='hidden' name='lendeID' value='".$row['IdLenda']."'><button type='submit' name='submit1' class='open-button'>Take Attendance</button></td><td><button type='submit' name='delStud' class='open-button' style='width:120px;height:50px;background-color:rgba(247,73,65,0.9);'>Delete</button></form></td></tr>";
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
<button id='butonI' style="position: fixed;bottom: 23px;right: 28px;width: 200px;background-color: blue;height: 40px;cursor: pointer;color: white;font-size: 22px;font-family: 'Times New Roman';" class="open-button" onclick="openForm()">Lists</button>

<div class="form-popup1" id="myForm">
	<div class="form-container1">
  <form action="ShfaqStudentPerLende.php" method="post" >
    <button style="background-color: lightblue;margin:20px; width: 170px;height: 35px;color: black;cursor: pointer;">Attendance List</button><br>
    <div style="width: 220px;border: 1px solid red;height: 300px;position: fixed;bottom: 210px;right: 40px;scroll-behavior: auto;"><label style="font-size: 22px;font-family:'Times New Roman';color: black;right :45px;margin-left: 20px; " >Student_List/Teacher
   		<select style="width: 180px;height: 35px;margin: 10px;margin-bottom: 10px;" name="emra">
    <?php 
    $idM=$_SESSION['id'];
    $idL=$_SESSION['idLend'];
    $sql5="SELECT * FROM student WHERE IdMesues=$idM ";
    $thisrow1="";
    if($result=mysqli_query($conn, $sql5))
    {
    	if(mysqli_num_rows($result)>0)
    	{
    		while($row=mysqli_fetch_assoc($result))
    		{
    			$thisrow1.="<option value='".$row['IdStudent']."'>"."ID:".$row['IdStudent']." / ".$row['Emri']." ".$row['Mbiemri']."</option>";

    		}$thisrow1.="</select></label></div><br><button type='submit' name='delStudent'  style='background-color: rgba(247,73,65,0.9);margin:20px; width: 100px;height: 31px;color: black;position: fixed;bottom: 210px;right: 140px;cursor:pointer;'>Del Stu</button><button type='submit' name='show'  style='background-color: lightblue;margin:20px 10px 20px 20px; width: 100px;height: 35px;color: black;position: fixed;bottom: 210px;right: 35px;cursor:pointer;'>Show Pass</button><br></form>";
    		echo $thisrow1;
    		
    	}
    }?>
    
	
    		
    	<?php
    	if(isset($_POST['show']))
    	{
    		$selValue=$_POST['emra'];
    		$sql6="SELECT * FROM student WHERE IdStudent=$selValue";
    		if($res=mysqli_query($conn, $sql6))
    		{
    			if(mysqli_num_rows($res)>0)
    			{
    				$pass=mysqli_fetch_assoc($res);
    				$pass1=$pass['Fjalekalimi'];
    				echo "<textarea readonly='readonly' cols='20' rows='2' style='position: fixed;bottom: 300px;right: 75px;'>".$pass1."</textarea>";
    			}
    		}
    	}
    	if(isset($_POST['delStudent']))
    	{
    		$studID=$_POST['emra'];
			$lendeID=$_SESSION['idLend'];
			$sqlDel11="DELETE  FROM seance WHERE IdStudent=$studID AND IdLende=$lendeID";
			if(mysqli_query($conn, $sqlDel11)){
			
				$sqlDel22="DELETE FROM studentlende WHERE IdStudent=$studID AND IdLende=$lendeID";
				if(mysqli_query($conn, $sqlDel22))
				{
					$sqlDel33="DELETE FROM student WHERE IdStudent=$studID";
					if(mysqli_query($conn, $sqlDel33)){
					header("Location: ShfaqStudentPerLende.php?success=StudentDeleteFromStudent");
					exit();
					}else
					echo "Error".mysqli_error($conn);
				}
		
			}
    	}
    ?>
    
     
    <button type="button" class="btn cancel" style="background-color: lightblue;margin:20px; width: 170px;height: 35px;color: black;position: fixed;bottom: 30px;right: 35px;" onclick="closeForm()">Close</button></div>
  
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
		function openForm() {
		  document.getElementById("myForm").style.display = "block";
		}
		function openForm2() {
		  document.getElementById("myForm").style.display = "flex";
		}

		function closeForm() {
		  document.getElementById("myForm").style.display = "none";
		}
</script>
</body>
</html>