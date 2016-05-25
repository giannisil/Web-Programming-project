<!DOCTYPE html>
<meta charset="UTF-8" />
<html>

<head>
	<title>ΘΠΔ</title>
	<link rel="stylesheet" type="text/css" href="style.css">
	
	<script type="text/javascript">
        function jsGetDetails(id){
			var div = document.getElementById(id);
			
			<?php
				$servername = "localhost";
				$username 	= "3519";
				$password 	= "tenlix";
				$DBName 	= "db3519";

				// Create connection
				$conn = new mysqli($servername, $username, $password, $DBName);
				// Check connection
				if ($conn->connect_error) {
					die("<div>Connection failed: " . $conn->connect_error) . "</div>"; 
				} 
				
				// Get data from Database
				$sqlGetAssoc = "SELECT id,name,surname,username,password,email,address,dpt,semester FROM data3 WHERE id=''"; //TODO fix WHERE id
				$result = $conn->query($sqlGetAssoc);
				
				if ($result->num_rows > 0) {
					// output data of each row
					while($row = $result->fetch_assoc()) {
						echo '<div>AM: ' 
								. $row["id"]
								. " - Onoma: "      . $row["name"] 
								. " - Epitheto: "    . $row["surname"] 
								. " - Username: "    . $row["username"] 
								. " - Password: "    . $row["password"] 
								. " - Email: "       . $row["email"] 
								. " - Address:  "    . $row["address"] 
								. " - Department: "  . $row["dpt"] 
								. " - Semester:  "   . $row["semester"] 
								. "</div><br>";
					}
				} else {
					echo "0 results";
				}
				
				$conn->close();
			?>			
		}
	</script>
</head>

<body background="photo1.jpg">
	
	<h1>Student List</h1>

	<?php
		$servername = "localhost";
		$username = "3519";
		$password = "tenlix";
		$DBName = "db3519";

		// Create connection
		$conn = new mysqli($servername, $username, $password, $DBName);
		// Check connection
		if ($conn->connect_error) {
			die("<div>Connection failed: " . $conn->connect_error) . "</div>"; 
		} 
		
		// Get data from Database
		$sqlGetAssoc = "SELECT id,name,surname FROM data3";
		$result = $conn->query($sqlGetAssoc);
		
		if ($result->num_rows > 0) {
			// output data of each row
			while($row = $result->fetch_assoc()) {
				echo '<div id="'. $row["id"] .'"><a onclick="jsGetDetails('. $row["id"] .')" href="#">AM</a>: ' 
						. $row["id"]. " - Onoma: " . $row["name"]. " " . $row["surname"]. "</div><br>";
			}
		} else {
			echo "0 results";
		}
		
		$conn->close();
	?>

</body>

</html>