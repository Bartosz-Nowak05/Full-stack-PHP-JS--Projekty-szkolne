<?php
include "login.php";
?>
<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Przychodnia Błękitnego Krzyża </title>
    <link rel="icon" href="logo.png">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <nav>
            <ul>
                <li><a href="index.php">Strona Główna</a></li>
                <li><a href="pacjenci.php">Karta Pacjęta</a></li>
                <li><a href="przygotowania.html">Przygotowanie do badań</a></li>
                <li><a href="kontakt.php">Kontakt</a></li>
            </ul>
        </nav>
      <br>
        <h1>
            Przychodnia Błękitnego Krzyża
            <img src="logo.png" alt="logo">
        </h1>
       
    </header>
    <main>
            <h2>Kontakt</h2>
            <br>

<form id="kontakt" method="post">
  <label for="imie">Imię:</label><br>
  <input type="text" id="imie" name="imie" required><br><br>

  <label for="nazwisko">Nazwisko:</label><br>
  <input type="text" id="nazwisko" name="nazwisko" required><br><br>

  <label for="email">Email:</label><br>
  <input type="email" id="email" name="email" required><br><br>

  <label for="numer">Numer telefonu:</label><br>
  <input type="text" id="numer" name="numer" required><br><br>

  <button type="submit" name="dodaj_kontakt">Zapisz</button>
</form>
<?php
include "login.php";
session_start();

if (isset($_POST['dodaj_kontakt'])) {
    $imie = $_POST['imie'] ?? '';
    $nazwisko = $_POST['nazwisko'] ?? '';
    $email = $_POST['email'] ?? '';
    $numer = $_POST['numer'] ?? '';

    $sql = "INSERT INTO kontakt (imie, nazwisko, email, numer)
            VALUES ('$imie', '$nazwisko', '$email', '$numer')";

    if (mysqli_query($conn, $sql)) {
        echo "<p>Dodano pomyślnie</p>";
    } else {
        echo "<p> Błąd: ".mysqli_error($conn)."</p>";
    }
}
?>
    </main>
    <footer>
        <p>Autor: Bartosz Nowak</p>
    </footer>
</body>
</html>