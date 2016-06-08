<!DOCTYPE html>
<meta charset="UTF-8" />
<?php session_start(); ?>
<html>

<head>
	<title>ΘΠΔ</title>
	<link rel="stylesheet" type="text/css" href="style.css">
	<script type="text/javascript">
        function submitForm() {
            if (document.getElementById('fclasses').value == '') {
                alert('Δεν έχει επιλεχθεί μάθημα');
            } else { // input is all OK
                document.forms[0].submit();
            }
        }
    </script>
</head>

<body background="photo1.jpg">

	<h1 style="text-align:center;">Update Registered Classes</h1>
	
	<div>
		<form action="subscriptions.php" method="GET">
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
			<input type="button" id="subbtn" value="update registration" onclick="submitForm()" />
		</form>
	</div>	
		
</body>

</html>