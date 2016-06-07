<!DOCTYPE html>
<meta charset="UTF-8" />
<?php session_start(); ?>
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