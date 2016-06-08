<?php
	// If we came to the page after a session login
	if ( (!empty($_POST)) && isset($_POST['username']) && isset($_POST['password']) ) {
		// Check in Database if login credentials are valid
		
		// Credentials for Database connection
		$servername = "localhost";
		$username = "3519";
		$password = "3519-Ix";
		$DBName = "db3519";
		$tableName = "data3";
		// Connecto to DB
		$conn = new mysqli($servername, $username, $password, $DBName);
		// Construct SQL query
		$sqlCheckCredentials = "SELECT password FROM ". $tableName ." WHERE username='". $_POST['username'] ."';";
		// Send Query
		$result = $conn->query($sqlCheckCredentials);
		if (!$result === TRUE) {
			echo "Error: " . $DBName . ". " . $conn->error . "<br/> SQL command: " . $sqlCheckCredentials;
		}
		echo "result->num_rows = ".$result->num_rows; //TODO DELETE DEBUG
		// Check if any matching passwords were found in DB
		if ($result->num_rows > 0) {
			$passwordMatched = false;
			while($row = $result->fetch_assoc()) {
				echo "row['password'] = ".$row["password"]; //TODO DELETE DEBUG
				echo "post['password'] = ".$_POST["password"]; //TODO DELETE DEBUG
				if ($row["password"] == $_POST['password']) {
						$passwordMatched = true;
					break;
				}
			}
			if ($passwordMatched) {
				// If matching password for user is found in DB then redirect to userList without POST requests
				header('Location: usersList.php');
			} else { 
				// Else, if no matching password is found for user, then redirect back to login page
				header('Location: class.html');
			}
		}
	}
?>

<!DOCTYPE html>
<meta charset="UTF-8" />
<html>

<head>
	<title>ΘΠΔ</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>

<body background="photo1.jpg">
	
	<h1>Student List</h1>

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
		$sqlGetAssoc = "SELECT id,name,surname FROM data3";
		$result = $conn->query($sqlGetAssoc);
		
		if ($result->num_rows > 0) {
			// output data of each row
			while($row = $result->fetch_assoc()) {
				echo '<div id="'. $row["id"] .'"><a href="userDetails.php?id='. $row["id"] .'">AM</a>: ' 
						. $row["id"]. " | Onoma: " . $row["name"]. " " . $row["surname"]. "</div><br>"; 
			}
		} else {
			echo "0 results";
		}
		
		$conn->close();
	?>

</body>

</html>