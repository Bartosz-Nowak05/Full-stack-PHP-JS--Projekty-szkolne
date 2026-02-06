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
    <main>
        <h1>Wyszukaj zawodnika</h1>
<section class="search">
          <form method="post">
      <form>
  <input type="search" id="searchInput">
</form>
        
      </form>
      <script>
document.getElementById("searchInput").addEventListener("input", function () {
  const query = this.value.toLowerCase();
  const zawodnicy = document.querySelectorAll(".zawodnicy");

  zawodnicy.forEach(function (zawodnik) {
    const text = zawodnik.textContent.toLowerCase();
    zawodnik.style.display = text.includes(query) ? "block" : "none";
  });
});

</script>
</section>
      
      <section id="zawodnicy">
              <?php
            $sql = 'SELECT * FROM `zawodnicy`';
            $REQUEST = mysqli_query($conn,$sql);
            while($row = mysqli_fetch_array($REQUEST))
            {   echo " <section class='zawodnicy'>";
                echo "<span>"."Imię i Nazwisko: ".$row["imie"]." "."</span>";
                 echo "<span>".$row["nazwisko"]."</span><br>";
                  echo "<p>"."Wiek: ".$row["wiek"]."</p><br>";
                    echo "<p>"."Pozycja: ".$row["pozycja"]."</p><br>";
                     echo "<p>"."Wzrost: ".$row["wzrost_cm"]."</p><br>";
                      echo "<p>"."Waga: ".$row["waga_kg"]."</p><br>";
                       echo "<p>"."Urodzony: ".$row["data_urodzenia"]."</p><br>";
                        echo "<p>"."Nr koszulski: ".$row["numer_koszulki"]."</p><br>";
                         echo "<p>"."Data debiutu: ".$row["data_debiutu"]."</p><br>";
                          echo "<p>"."Liczba meczy: ".$row["liczba_meczy"]."</p><br>";
                           echo "<p>"."Liczba goli:".$row["liczba_goli"]."</p><br>";
                            echo "<p>"."Asysty: ".$row["liczba_asyst"]."</p><br>";
                            echo "</section>";
            }

            ?>
      </section>

       
    </main>
 
    <footer>
        <p>Autor: Bartosz Nowak</p>
    </footer>
</body>
</html>