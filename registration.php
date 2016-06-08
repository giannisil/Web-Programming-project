<!DOCTYPE html>
<meta charset="UTF-8" />
<?php
	session_start();
?>
<html>

<head>
	<title>ΘΠΔ</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>

<body background="photo1.jpg">
	
	<h1>Registration Form</h1>
	
	<?php 
		if (isset($_SESSION['name'])) {
			echo "<div>Welcome back ". $_SESSION['name'] ."! <div>"; 
			echo '<a href="logout.php">Logout &raquo;</a>';
			echo '<br><br><br>';
		}
	?>
	
	<?php // Init Database code
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
		else {  echo "<div>Error creating database: " . $conn->error . ".</div>"; }

		$conn->close();
	?>	
	
	<script type="text/javascript">
        function submitForm() {
            if (document.getElementById('fonoma').value == '') {
                alert('Το όνομα λείπει');
            } else if (document.getElementById('fepwnumo').value == '') {
                alert('Το επώνυμο λείπει');
            } else if (document.getElementById('fusername').value == '') {
                alert('Το όνομα χρήστη λείπει');
            } else if (document.getElementById('fpass').value == '') {
                alert('Το συνθηματικό λείπει');
            } else if (document.getElementById('fconf_pass').value == '') {
                alert('Το επιβεβαίωση συνθηματικού λείπει');
            } else if (document.getElementById('AM').value == '') {
                alert('O Αριθμός Μητρώου λείπει');
            } else if (document.getElementById("femail").value.indexOf('@') === -1) {
                alert('Λάθος είσοδος email');
            } else if (document.getElementById('femail').value == '') {
                alert('Το εmail λείπει');
            } else if (document.getElementById('fadress').value == '') {
                alert('Το διεύθυνση λείπει');
            } else if (document.getElementById('fclass').value == '') {
                alert('Το τμήμα λείπει');
            } else if (document.getElementById('fsemester').value == '') {
                alert('Το εξάμηνο λείπει');
            } else if (document.getElementById('fclasses').value == '') {
                alert('Δεν έχει επιλεχθεί μάθημα');
            } else if (!document.getElementById('faswer').checked) {
                alert('Πατήστε agree');
            } else { // input is all OK
                document.forms[0].submit();
            }
        }
    </script>
	
	<div>
		<form action="subscriptions.php" method="GET">
			<div>Όνομα:</div>
			<input type="text" id="fonoma" name="onoma" />
			<div>Επώνυμο:</div>
			<input type="text" id="fepwnumo" name="epwnumo" />
			<div>Όνομα χρήστη:</div>
			<input type="text" id="fusername" name="username" />
			<div> Συνθηματικό:</div>
			<input type="password" id="fpass" name="pass" />
			<div>Επιβεβαίωση συνθηματικού</div>
			<input type="password" id="fconf_pass" name="conf_pass" />
			<div>Αριθμός Μητρώου:</div>
			<input type="number" id="AM" name="AM" />
			<div>Εmail:</div>
			<input type="text" id="femail" name="email" />
			<div>Διεύθυνση:</div>
			<input type="text" id="fadress" name="adress" />
			<div> Τμήμα:</div>
			<input type="text" id="fclass" name="class" />
			<div> Εξάμηνο:</div>
			<input type="number" id="fsemester" name="semester" />
			<br>
			<div> Επιλογή Μαθήματος </div>
			<select multiple='multiple' id="fclasses" name="classes[]">
				<option value="" >επέλεξε μάθημα...</option> 
				<option value="java"  <?php if(isset($_SESSION['java'])) echo "selected" ?>>
						Αντικειμενοστραφής Προγραμματισμός
				</option>
				<option value="tpd" <?php if(isset($_SESSION['tpd'])) echo "selected" ?>>
						Προγραμματισμός διαδικτύου
					</option>   
				<option value="linux" <?php if(isset($_SESSION['linux'])) echo "selected" ?>>
						Λειτουργικά συστήματα
					</option>      
			</select>
			<div>
				<input type="checkbox" id="faswer" name="aswr" value="agree" /> Συμφώνω με τους όρους χρήσης</div>
			<br>
			<input type="button" id="subbtn" value="submit" onclick="submitForm()" />
			<input type="button" name="clear" value="Καθαρισμός Πεδίων" onclick="this.form.reset()" />
		</form>
	</div>








</body>

</html>