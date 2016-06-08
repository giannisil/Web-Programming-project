<!DOCTYPE html>
<meta charset="UTF-8" />
<?php  /*========= Code to handle sesssion ============ */ 
	session_start(); 
	// Add classes from GET request to session 
	if (!empty($_GET)) {
		// reset previous session state
		if (isset($class['java'])) 	unset($_SESSION['java']);
		if (isset($class['tpd'])) 	unset($_SESSION['tpd']);
		if (isset($class['linux'])) unset($_SESSION['linux']);
		// update session state from get request
		$_SESSION['name'] = $_GET["onoma"];
		foreach ($_GET["classes"] as $class) {
			$_SESSION[$class] = 1;
		}
	}
?>

<?php /*========= Code to initialise Database ============ */ 
	$servername = "localhost";
	$username = "3519";
	$password = "3519-Ix";

	// Create connection
	$conn = new mysqli($servername, $username, $password);
	// Check connection
	if ($conn->connect_error) {
		die("<div>Connection failed: " . $conn->connect_error) . "</div>"; 
	} 

	// Create database
	$DBName = "db3519";
	$tableName = "data3";
	$sqlCreateDB = "CREATE DATABASE IF NOT EXISTS " . $DBName;
	$sqlCreateTable = "CREATE TABLE IF NOT EXISTS ". $tableName ." (id integer, name varchar(20), "
			. "surname varchar(30), username varchar(20), password varchar(10), "
			. "email varchar(20), address varchar(20), dpt varchar(20), semester integer, "
			."classJava boolean, classTPD boolean, classLinux boolean, PRIMARY KEY(ID))";
	
	// Select Database
	$DBselected = mysqli_select_db ($conn, $DBName); 
	
	// Create Database if it doesn't exist
	if ($conn->query($sqlCreateDB) === TRUE) {
		echo "Database " . $DBName . " created successfully. ";
		$DBselected = mysqli_select_db ($conn, $DBName); 
		if ($conn->query($sqlCreateTable) === TRUE){
			echo "Table ". $tableName ." created successfully. ";
		} 
		else {  echo "<div>Error creating table: " . $conn->error . ".</div>"; }
	}
	else {  echo "<div>Error creating database: " . $conn->error . ".</div>"; }

	$conn->close();
?>

<?php /*========= Code to insert the new registration entry to DB ============ */ 
	$conn = new mysqli($servername, $username, $password, $DBName);
	
	$fields = array($_GET["AM"], $_GET["onoma"], $_GET["epwnumo"], $_GET["username"], $_GET["pass"]
			, $_GET["email"], $_GET["adress"], $_GET["class"], $_GET["semester"]); 
	if (in_array("java", $_GET["classes"])) {
			array_push($fields, "1");
	}else {
		array_push($fields, "0");
	}
	if (in_array("tpd", $_GET["classes"])) {
			array_push($fields, "1");
	}else {
		array_push($fields, "0");
	}
	if (in_array("linux", $_GET["classes"])) {
			array_push($fields, "1");
	}else {
		array_push($fields, "0");
	}
	
	$sqlInserData = 'INSERT INTO ' . $tableName . ' VALUES (';
	
	foreach ($fields as $field) {
		$sqlInserData = $sqlInserData . '"' . $field . '"' . ', ';
	}
	$sqlInserData = rtrim($sqlInserData, ", ");
	$sqlInserData = $sqlInserData . ')';
	
	if (!$conn->query($sqlInserData) === TRUE) {
		echo "Error creating new entry in database " . $DBName . ". " . $conn->error . "<br/>" 
				. "SQL command: " . $sqlInserData;
	}
	
	$conn->close();
?>
<html>

<head>
	<title>ΘΠΔ</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>

<body background="photo1.jpg">
	
	<h1>Student subscriptions</h1>

	<div>
		<h3>Classes</h3>
		<ul>
			
		<?php
			if(isset($_SESSION['java']))  echo '<li>Αντικειμενοστραφής Προγραμματισμός</li>';
			if(isset($_SESSION['tpd']))   echo '<li>Προγραμματισμός διαδικτύου</li>';
			if(isset($_SESSION['linux'])) echo '<li>Λειτουργικά συστήματα</li>';
		 ?>
		 </ul>
	</div>
	
	<div style="margin-top:60px;">
		<a href="registration.php">Go back to registration page &raquo;</a>
	</div>
	
	<div style="margin-top:20px;">
		<a href="logout.php">Logout <?php if (isset($_SESSION['name'])) echo $_SESSION['name'];?> &raquo;</a>
	</div>

</body>

</html>