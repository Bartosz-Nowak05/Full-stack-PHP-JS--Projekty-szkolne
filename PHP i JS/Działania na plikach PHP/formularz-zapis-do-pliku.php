<?php
if (isset($_POST["imie"]) && isset($_POST["nazwisko"]) && isset($_POST["email"])) {
    $imie = $_POST["imie"];
    $nazwisko = $_POST["nazwisko"];
    $email = $_POST["email"];
    
    $zawartosc = $imie . " " . $nazwisko . " " . $email . "\n";
    
    file_put_contents("notatka.txt", $zawartosc, FILE_APPEND);
    
    
}
?>
<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formularz</title>
</head>
<body>
    <form method="post" action="zadanie2.php">
        <label for="imie">Imię</label><br>
        <input type="text" name="imie" id="imie" required><br>

        <label for="nazwisko">Nazwisko</label><br>
        <input type="text" name="nazwisko" id="nazwisko" required><br>

        <label for="email">Email</label><br>
        <input type="email" name="email" id="email" required><br><br>

        <button type="submit">Prześlij</button>
    </form>
</body>
</html>
