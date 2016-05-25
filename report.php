<!DOCTYPE html>
<meta charset="UTF-8" />
<html>

<head>
    <title>ΘΠΔ</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>

<body background="photo1.jpg">
    <h1 style="text-align:center;">Θέματα Προγραμματισμού Διαδικτύου</h1>
    <div>Όνομα: <?php echo $_GET["onoma"]; ?></div>
    <br/>
    <div>Επώνυμο: <?php echo $_GET["epwnumo"]; ?></div>
    <br/>
    <div>Όνομα χρήστη: <?php echo $_GET["username"]; ?></div>
    <br/>
    <div> Συνθηματικό: <?php echo $_GET["pass"]; ?></div>
    <br/>
    <div>Επιβεβαίωση συνθηματικού: <?php echo $_GET["conf_pass"]; ?></div>
    <br/>
    <div>Εmail: <?php echo $_GET["email"]; ?></div>
    <br/>
    <div>Διεύθυνση: <?php echo $_GET["adress"]; ?></div>
    <br/>
    <div>Τμήμα: <?php echo $_GET["class"]; ?></div>
    <br/>
    <div>Εξάμηνο: <?php echo $_GET["semester"]; ?></div>
    <br/>
    <div>Μάθημα: <?php echo $_GET["classes"]; ?></div>
    <br/>
    <div> <?php echo $_GET["submit"]; ?></div>
    <br/>








</body>

</html>