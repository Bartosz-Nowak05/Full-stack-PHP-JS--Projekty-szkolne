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
            <h2>O NAS</h2>
            <br>
            <article>
                <p>
                    Witamy w Przychodni Błękitnego Krzyża  miejscu, gdzie troska o zdrowie spotyka się z nowoczesną medycyną i życzliwym podejściem do pacjenta. Nasz zespół tworzą doświadczeni lekarze, pielęgniarki i specjaliści, którzy każdego dnia dbają o to, byś czuł się bezpiecznie, komfortowo i zaopiekowany.<br><br> Niezależnie od tego, czy przychodzisz na rutynową kontrolę, czy potrzebujesz specjalistycznej pomocy  jesteśmy tu dla Ciebie.

Zapraszamy do skorzystania z naszych usług i dołączenia do grona pacjentów, którzy cenią sobie profesjonalizm, empatię i indywidualne podejście. W Przychodni Błękitnego Krzyża zdrowie to nie tylko obowiązek  to wspólna troska i zaufanie, które budujemy każdego dnia. <br><br>
                </p>
                <p>
                    Oferujemy szeroki zakres usług medycznych, w tym konsultacje internistyczne, pediatryczne, diagnostykę laboratoryjną, badania profilaktyczne oraz opiekę specjalistyczną. Nasza przychodnia jest wyposażona w nowoczesny sprzęt, a wszystkie procedury realizujemy z zachowaniem najwyższych standardów jakości i bezpieczeństwa. Dbamy również o krótkie terminy oczekiwania i wygodny system rejestracji  zarówno telefonicznie, jak i online.
                </p>
            </article>
                <h2>NASZ ZESPÓŁ</h2>
            <section class="galery">
               <?php
                $sql = "SELECT * FROM `lekarze`";
                $query = mysqli_query($conn,$sql);
                while($row = mysqli_fetch_array($query))
                {
                    echo "<div class='box'>";
                   echo "<img src='lekarze/" . $row["id_lekarze"] . ".jpg'>";
                    echo "<p>"."Imię ".$row["imie"]."</p><br>";
                    echo "<p>"."Nazwisko ".$row["nazwisko"]."</p><br>";
                    echo "<p>"."Stanowisko ".$row["stanowisko"]."</p><br>";
                    echo "<p>"."Opis: ".$row["opis"]."</p>";
                    echo "</div>";
                }
               ?>
             
            </section>
           
    </main>
    <footer>
        <p>Autor: Bartosz Nowak</p>
    </footer>
</body>
</html>