<!DOCTYPE html>
<meta charset="UTF-8" />
<?php session_start(); 
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