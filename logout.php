<!DOCTYPE html>
<meta charset="UTF-8" />
<?php 
	session_start();
	
	// Credentials for Database connection
	$servername = "localhost";
	$username = "3519";
	$password = "3519-Ix";
	$DBName = "db3519";
	$tableName = "data3";
	// Connecto to DB
	$conn = new mysqli($servername, $username, $password, $DBName);
	if ( ($conn->error == "") || (!empty($_SESSION)) ) { // If connection doesnt fail on initiation
		// Insert classes from session cookie into Database 
		
		// Begin constructing SQL query string
		$sqlInsertData = 'UPDATE '. $tableName .' SET ';
		
		// construct rest of SQL query to update classes for user
		if (isset($_SESSION['java'])) {
			$sqlInsertData = $sqlInsertData . "classJava=1, ";
		}else {
			$sqlInsertData = $sqlInsertData . "classJava=0, ";
		}
		if (isset($_SESSION['tpd'])) {
			$sqlInsertData = $sqlInsertData . "classTPD=1, ";
		}else {
			$sqlInsertData = $sqlInsertData . "classTPD=0, ";
		}
		if (isset($_SESSION['linux'])) {
			$sqlInsertData = $sqlInsertData . "classLinux=1, ";
		}else {
			$sqlInsertData = $sqlInsertData . "classLinux=0, ";
		}
		
		// Target to update only current user in DB
		$sqlInsertData = rtrim($sqlInsertData, ", "); // Remove trailing comma
		$sqlInsertData = $sqlInsertData . " WHERE ID=" . $_SESSION["AM"] . ";";
		
		if (!$conn->query($sqlInsertData) === TRUE) {
			echo "Error updating database " . $DBName . ". " . $conn->error . "<br/>" 
					. "SQL command: " . $sqlInsertData;
		}
		
		$conn->close();
	}
?>
<html>

<head>
	<title>ΘΠΔ</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>

<body background="photo1.jpg">
	
	<h1>Bye bye <?php if (isset($_SESSION['name'])) echo $_SESSION['name'];?>.. No more cookies for you :)</h1>
	
	<?php session_destroy(); ?>
	
	<div>
		<a href="registration.php">Return to registrations &raquo;</a>
	</div>
</body>

</html>