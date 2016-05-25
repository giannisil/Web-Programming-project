<!DOCTYPE html>
<meta charset="UTF-8" />
<html>

<head>
    <title>ΘΠΔ</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>

<body background="photo1.jpg">
    <h1 style="text-align:center;">Θέματα Προγραμματισμού Διαδικτύου</h1>
    <div>Όνομα: <?php echo $_POST["onoma"]; ?></div>
    <br/>
    <div>Επώνυμο: <?php echo $_POST["epwnumo"]; ?></div>
    <br/>
    <div>Όνομα χρήστη: <?php echo $_POST["username"]; ?></div>
    <br/>
    <div> Συνθηματικό: <?php echo $_POST["pass"]; ?></div>
    <br/>
    <div>Επιβεβαίωση συνθηματικού: <?php echo $_POST["conf_pass"]; ?></div>
    <br/>
    <div>Εmail: <?php echo $_POST["email"]; ?></div>
    <br/>
    <div>Διεύθυνση: <?php echo $_POST["adress"]; ?></div>
    <br/>
    <div>Τμήμα: <?php echo $_POST["class"]; ?></div>
    <br/>
    <div>Εξάμηνο: <?php echo $_POST["semester"]; ?></div>
    <br/>
    <div> <?php echo $_POST["submit"]; ?></div>
    <br/>
</body>

</html>