<!DOCTYPE html>
<meta charset="UTF-8" />
<html>

<head>
	<title>ΘΠΔ</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>

<body background="photo1.jpg">
	
	<?php // Init Database code
		$servername = "localhost";
		$username = "3519";
		$password = "tenlix";

		// Create connection
		$conn = new mysqli($servername, $username, $password);
		// Check connection
		if ($conn->connect_error) {
			die("<div>Connection failed: " . $conn->connect_error) . "</div>"; 
		} 

		// Create database
		$DBName = "db3519";
		$tableName = "data3";
		$sqlCreateDB = "CREATE DATABASE " . $DBName;
		$sqlCreateTable = "CREATE TABLE ". $tableName ." (id integer, name varchar(20), "
				. "surname varchar(30), username varchar(20), password varchar(10), "
				. "email varchar(20), address varchar(20), dpt varchar(20), "
				."semester integer, PRIMARY KEY(ID))";
	   
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
		elseif ($conn->query("DROP TABLE " . $tableName) === TRUE) { // Delete to disable debug mode
			echo "Table " . $tableName . " dropped successfully. ";
			if ($conn->query("DROP DATABASE " . $DBName) === TRUE) { // Delete to disable debug mode
				echo "Database " . $DBName . " dropped successfully. ";
			}
			$conn->query($sqlCreateDB);
			echo "Database " . $DBName . " created successfully. ";
			$DBselected = mysqli_select_db ($conn, $DBName); 
			$conn->query($sqlCreateTable);
			echo "Table ". $tableName ." created successfully. ";     
		}
		else {  echo "<div>Error creating database: " . $conn->error . ".</div>"; }

		$conn->close();
	?>
	
	
	
	<div class="report">
		<?php 
			$conn = new mysqli($servername, $username, $password, $DBName);
			$fields = array($_GET["AM"], $_GET["onoma"], $_GET["epwnumo"], $_GET["username"], $_GET["pass"]
					, $_GET["email"], $_GET["adress"], $_GET["class"], $_GET["semester"]); 
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
		
		<h1 style="text-align:center;">Θέματα Προγραμματισμού Διαδικτύου</h1>
		<div>Όνομα: 		<?php echo $_GET["onoma"]; 		?></div><br/>
		<div>Επώνυμο: 		<?php echo $_GET["epwnumo"]; 	?></div><br/>
		<div>Όνομα χρήστη: 	<?php echo $_GET["username"]; 	?></div><br/>
		<div>Συνθηματικό: 	<?php echo $_GET["pass"]; 		?></div><br/>
		<div>Επιβεβαίωση: 	<?php echo $_GET["conf_pass"]; 	?></div><br/>
		<div>AΜ:			<?php echo $_GET["AM"]; 		?></div><br/>
		<div>Εmail: 		<?php echo $_GET["email"]; 		?></div><br/>
		<div>Διεύθυνση: 	<?php echo $_GET["adress"]; 	?></div><br/>
		<div>Τμήμα: 		<?php echo $_GET["class"]; 		?></div><br/>
		<div>Εξάμηνο: 		<?php echo $_GET["semester"]; 	?></div><br/>
		<div>Μάθημα: 		<?php echo $_GET["classes"]; 	?></div><br/>
		<div> 				<?php echo $_GET["submit"]; 	?></div><br/>
	</div>








</body>

</html>