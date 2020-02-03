<!DOCTYPE html>
<html>
<head>
	<title>Weekday</title>
</head>
<body>
	<form method="POST" action="index.php">
		<select name="selectDays[]" multiple="multiple">
			<option value="days">Days Met</option>
			<option value="Monday">Monday</option>
			<option value="Tuesday">Tuesday</option>
			<option value="Wednsday">Wednsday</option>
			<option value="Thursday">Thursday</option>
			<option value="Friday">Friday</option>
			<option value="Saturday">Saturday</option>
			<option value="Sunday">Sunday</option>
		</select>
		<input type="button" class="button2" name="close" id="close" value="Close">
		<input type="submit" class="button2" name="addKlase" value="Add Class">
	</form>
	<?php 
	$conn=mysqli_connect('localhost', 'root', '', 'presentuser');
	if(!$conn)
		die("Errorrrr");
	if(isset($_POST['addKlase'])){
		$id=8;
	
	$selectdays=$_POST['selectDays'];
	if($selectdays)
	{
		foreach ($selectdays as $days) {
			mysqli_query($conn, "INSERT INTO weekday (IdLenda, DitetJaves) VALUES(".$id.", ' ".mysqli_real_escape_string($conn, $days)." ')");
			
				
		}
	}
}
	$sql="SELECT lenda.Pershkrimi, lenda.IdLenda, weekday.DitetJaves, weekday.IdLenda FROM (lenda INNER JOIN weekday ON lenda.IdLenda=weekday.IdLenda)";
	$query=mysqli_query($conn, $sql);
	if(!$query)
		echo "Te dhenat nuk shfaqen";
	else{print("<html><body><table border='1'><th>Pershkrimi: </th><th>IdLenda: </th><th>DitetJaves: </th><th>IdLenda: </th>");
		while($result=mysqli_fetch_array($query))
		{
			print("<tr><td>".$result['Pershkrimi']."</td><td>".$result['IdLenda']."</td><td>".$result['DitetJaves']."</td><td>".$result['IdLenda']."</td></tr>");
		}
		print("</table></body></html>");
	}
	?>
</body>
</html>