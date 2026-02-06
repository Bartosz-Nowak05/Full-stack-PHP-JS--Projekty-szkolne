<?php
include("db_connect.php");
session_start();
?>
<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Family Football</title>
    <link rel="icon"  href="logo.ico">
    <link rel="stylesheet" href="style.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>

    <header>
             <img id="logo" src="logo.png">
              <nav>
        <ul>
            <li><a href="index.html">Strona główna</a></li>
            <li><a href="zawodnicy.php">Zawodnicy</a></li>
                 <li><a href="wyniki.php">Wyniki</a></li>
                      <li><a href="kontakt.php">Kontakt</a></li>
        </ul>
    </nav>
    </header>
    <main class="kontakt">
        <h1>Kontakt</h1>
               <form method="post">
            <label>Imie</label>
            <br>
            <input type="text" name="imie" max="40" required>
             <br>
            <label>Nazwisko</label>
                <br>
            <input type="text" name="nazwisko" max="40" required>
             <br>
            <label>Email</label>
                <br>
            <input id="email" type="text" name="email">
             <br>
            <label>Wiadomość</label>
            <br>
            <textarea maxlength="5000" rows="7" name="wiadomosc"></textarea>
             <br>
            <button type="submit" onclick="check()">Wyślji</button>
               <script>
                function check()
                {
                    let email = document.getElementById("email").value;
                    const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
                    if(emailPattern.test(email))
                {
                    alert("email poprawny kontynułuj");
                }
                else
                {
                    alert("niepoprawny adres email odświerz stronę i spróbuj jeszcze raz ");
                   document.querySelectorAll("button").forEach(btn => {
                    btn.disabled = true;
                    btn.style.backgroundColor = "gray";
                    btn.style.cursor = "not-allowed";

                })}
                };
            </script>


    <?php
    if($_SERVER['REQUEST_METHOD'] === 'POST')
    {
        $imie = $_POST["imie"];
        $nazwisko = $_POST["nazwisko"];
        $email = $_POST["email"];
        $wiadomosc = $_POST["wiadomosc"];
        $sql = "INSERT INTO `kontakt`( `imie`, `nazwisko`, `email`, `wiadomosc`) VALUES ('$imie','$nazwisko','$email','$wiadomosc')";
        $REQUEST = mysqli_query($conn,$sql);
        if($REQUEST)
        {
            echo "<p id='wiadomosc'; >Wiadomość wysłana</p>";
        }
    }
    ?>
            </form>
                </main>
 
    <footer>
        <p>Autor: Bartosz Nowak</p>
    </footer>
</body>
</html>