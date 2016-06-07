<!DOCTYPE html>
<meta charset="UTF-8" />
<?php session_start(); 
	// Add classes from GET request to session 
	if (!empty($_GET)) {
		$_SESSION['name'] = $_GET["onoma"];
		foreach ($_GET["classes"] as $class) {
			$_SESSION[$class] = 1;
		}
	}
	// Remove classes from session that don't appearing in GET request (e.g. not selected in form)
	if (!empty($_GET)) {
		foreach ($_GET["classes"] as $class) {
			// if only java class was selected
			if (isset($class['java']) && !isset($class['tpd']) && !isset($class['linux'])) {
				unset($_SESSION['tpd']);
				unset($_SESSION['linux']);
			}
			// if only tpd class was selected
			else if (!isset($class['java']) && isset($class['tpd']) && !isset($class['linux'])) {
				unset($_SESSION['java']);
				unset($_SESSION['linux']);
			}
			// if only linux class was selected
			else if (!isset($class['java']) && !isset($class['tpd']) && isset($class['linux'])) {
				unset($_SESSION['java']);
				unset($_SESSION['tpd']);
			}
			// if only java AND tpd classes were selected
			else if (isset($class['java']) && isset($class['tpd']) && !isset($class['linux'])) {
				unset($_SESSION['linux']);
			}
			// if only java AND linux classes were selected
			else if (isset($class['java']) && !isset($class['tpd']) && isset($class['linux'])) {
				unset($_SESSION['tpd']);
			}
			// if only tpd AND linux classes were selected
			else if (!isset($class['java']) && isset($class['tpd']) && isset($class['linux'])) {
				unset($_SESSION['java']);
			}
			// if ALL classes were selected, then nothing to unset
			else { echo "Dead man's land in cookie unset ifs" ; }
		}
	}
	else {
		unset($_SESSION['java']);
		unset($_SESSION['tpd']);
		unset($_SESSION['linux']);
	}
	
	
	
	
	if (!isset($_GET['java'])) unset($_SESSION['java']);
	if (!isset($_GET['tpd'])) unset($_SESSION['tpd']);
	if (!isset($_GET['linux'])) unset($_SESSION['linux']);
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
		<a href="logout.php">&raquo; Logout <?php if (isset($_SESSION['name'])) echo $_SESSION['name'];?> &laquo;</a>
	</div>

</body>

</html>