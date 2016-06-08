<!DOCTYPE html>
<meta charset="UTF-8" />
<html>

<head>
	<title>ΘΠΔ</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>

<body background="photo1.jpg">
	
	<h1>Student Details</h1>

	<?php
		$servername = "localhost";
		$username = "3519";
		$password = "3519-Ix";
		$DBName = "db3519";

		// Create connection
		$conn = new mysqli($servername, $username, $password, $DBName);
		// Check connection
		if ($conn->connect_error) {
			die("<div>Connection failed: " . $conn->connect_error) . "</div>"; 
		} 
		
		// Get data from Database
		$sqlGetAssoc = "SELECT id,name,surname,username,password,email,address,dpt,semester,classJava,classTPD,classLinux FROM data3 WHERE id='".$_GET["id"]."'"; 
		$result = $conn->query($sqlGetAssoc);
		
		if ($result->num_rows > 0) {
			// output data of each row
			while($row = $result->fetch_assoc()) {
				$echoString = '<div>AM: '    . $row["id"]
                        . " - Onoma: "       . $row["name"] 
                        . " - Epitheto: "    . $row["surname"] 
                        . " - Username: "    . $row["username"] 
                        . " - Password: "    . $row["password"] 
                        . " - Email: "       . $row["email"] 
                        . " - Address:  "    . $row["address"] 
                        . " - Department: "  . $row["dpt"] 
                        . " - Semester:  "   . $row["semester"] ;
				if ($row["classJava"]  == 1) { $echoString = $echoString . " - Class: Αντικειμενοστραφής Προγραμματισμός"; }
				if ($row["classTPD"]   == 1) { $echoString = $echoString . " - Class: Προγραμματισμός διαδικτύου"; }
				if ($row["classLinux"] == 1) { $echoString = $echoString . " - Class: Λειτουργικά συστήματα"; }
				$echoString = $echoString . "</div><br>";
				echo $echoString;
			}
		} else {
			echo "0 results";
		}
		
		$conn->close();
	?>

</body>

</html>