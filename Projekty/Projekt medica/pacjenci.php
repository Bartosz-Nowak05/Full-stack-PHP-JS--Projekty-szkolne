<?php
include "login.php";
session_start();
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
       
   <h2>Logowanie</h2>
 <form  method="post" style="margin-top: 1cm;">
  <label>Kim jesteś</label>
  <select id="role" name="role">
    <option value="pacjent">Pacjent</option>
    <option value="lekarz">Lekarz</option>
  </select>

  <div id="pacjent-panel" style="margin: 0.5cm;">
    <label>PESEL</label>
    <input type="text" name="pesel" placeholder="np. 90010112345">
  </div>

  <div id="lekarz-panel" style="display:none;">
    <label>Imię</label>
    <br>
    <input type="text" name="imie">
    <br>
    <label>Nazwisko</label>
    <br>
    <input type="text" name="nazwisko">
    <br>
       <br>
  </div>

  <button type="submit">Zaloguj</button>
</form>



<?php
$imie = $_POST['imie'] ?? '';
$nazwisko = $_POST['nazwisko'] ?? '';
?>

<?php

if ($imie && $nazwisko) {
    $sql = "SELECT * FROM lekarze WHERE imie = '$imie' AND nazwisko = '$nazwisko'";
    $result = mysqli_query($conn, $sql);

    if ($row = mysqli_fetch_array($result)) {
        $_SESSION['rola'] = 'lekarz';
        $_SESSION['id_lekarze'] = $row['id_lekarze'];
        echo "<p>"."Zalogowano jako lekarz ".$row['imie']." ".$row['nazwisko']."</p>";
        ?>
    <h2>Dodaj pacjenta</h2>
    <br><br><br>
       <form method="post" class="formularz">
  <h3>Dane pacjenta</h3>
  
  <div class="form-row">
    <label>Imię</label>
    <input type="text" name="imie">
  </div>

  <div class="form-row">
    <label>Nazwisko</label>
    <input type="text" name="nazwisko">
  </div>

  <div class="form-row">
    <label>Wiek</label>
    <input type="number" name="wiek">
  </div>

  <div class="form-row">
    <label>Wzrost</label>
    <input type="number" name="wzrost">
  </div>

  <div class="form-row">
    <label>Waga</label>
    <input type="number" name="waga">
  </div>

  <div class="form-row">
    <label>PESEL</label>
    <input type="text" name="pesel">
  </div>

  <div class="form-row">
    <label>Data urodzenia (YYYY-MM-DD)</label>
    <input type="text" name="data_ur" placeholder="1980-01-01">
  </div>

  <div class="form-row">
    <label>Kontakt</label>
    <input type="text" name="kontakt">
  </div>

  <h3>Dane badania</h3>

  <div class="form-row">
    <label>Nazwa badania</label>
    <input type="text" name="nazwa">
  </div>

  <div class="form-row">
    <label>Opis</label>
    <textarea name="opis"></textarea>
  </div>

  <div class="form-row">
<label>Data badania (YYYY-MM-DD)</label>
<input type="text" name="data_badania">
  </div>

  <div class="form-row">
    <label>Choroba</label>
    <input type="text" name="choroba">
  </div>

  <div class="form-row">
    <label>Informacje pacjenta</label>
    <textarea name="informacje_pacjenta"></textarea>
  </div>

  <div class="form-row">
    <label>Historia zabiegów</label>
    <textarea name="historia_zabiegow"></textarea>
  </div>

  <button type="submit">Zapisz</button>
</form>
<h2>Wyszukaj pacjenta</h2>
    <input type="text" id="filter" >
        <?php
        echo "<br>";
        $sql = "SELECT `pacjenci`.*, `badania`.*
        FROM `pacjenci` 
            LEFT JOIN `badania` ON `badania`.`id_badania` = `pacjenci`.`id_badania`;";
            $query = mysqli_query($conn,$sql);
 while ($rowPacjent = mysqli_fetch_array($query)) {
        echo "<div class='pacjenci'>";
        echo "<p>Imię: ".$rowPacjent['imie']."</p>";
        echo "<p>Nazwisko: ".$rowPacjent['nazwisko']."</p>";
        echo "<p>Wiek: ".$rowPacjent['wiek']."</p>";
        echo "<p>Wzrost: ".$rowPacjent['wzrost']."</p>";
        echo "<p>Waga: ".$rowPacjent['waga']."</p>";
        echo "<p>PESEL: ".$rowPacjent['pesel']."</p>";
        echo "<p>Data urodzenia: ".$rowPacjent['data_ur']."</p>";
        echo "<p>Kontakt: ".$rowPacjent['kontakt']."</p>";
        echo "<p>Nazwa badania: ".$rowPacjent['nazwa']."</p>";
        echo "<p>Informacje pacjenta: ".$rowPacjent['informacje_pacjenta']."</p>";

        echo "<p>Opis badania:</p>";
        echo "<details>";
        echo "<summary>Dodatkowe informacje</summary>";
        echo "<p>".$rowPacjent['opis']."</p>";
        echo "<p>Data badania: ".$rowPacjent['data']."</p>";
        echo "<p>Choroba: ".$rowPacjent['choroba']."</p>";
        echo "<p>Historia zabiegów: ".$rowPacjent['historia_zabiegow']."</p>";
        echo "</details>";

        echo "</div>";
         }}
         else
         {
            echo "Nie znaleziono lekarza";
         }
};?>
<?php
if ($_SESSION['rola'] === 'lekarz') {
    if (
        isset($_POST['imie']) &&
        isset($_POST['nazwisko']) &&
        isset($_POST['wiek']) &&
        isset($_POST['wzrost']) &&
        isset($_POST['waga']) &&
        isset($_POST['pesel']) &&
        isset($_POST['data_ur']) &&
        isset($_POST['kontakt']) &&
        isset($_POST['nazwa']) &&
        isset($_POST['opis']) &&
        isset($_POST['data_badania']) &&   // poprawione pole
        isset($_POST['choroba']) &&
        isset($_POST['informacje_pacjenta']) &&
        isset($_POST['historia_zabiegow'])
    ) {
        // Dane pacjenta
        $imiePacjenta = $_POST['imie'];
        $nazwiskoPacjenta = $_POST['nazwisko'];
        $wiek = $_POST['wiek'];
        $wzrost = $_POST['wzrost'];
        $waga = $_POST['waga'];
        $pesel = $_POST['pesel'];
        $data_ur = $_POST['data_ur'];
        $kontakt = $_POST['kontakt'];

        // Dane badania
        $nazwaBadania = $_POST['nazwa'];
        $opis = $_POST['opis'];
        $data_badania = $_POST['data_badania'];
        $choroba = $_POST['choroba'];
        $informacje_pacjenta = $_POST['informacje_pacjenta'];
        $historia_zabiegow = $_POST['historia_zabiegow'];

        // INSERT badanie
        $sqlBadanie = "INSERT INTO badania (nazwa, opis, data, choroba, informacje_pacjenta, historia_zabiegow)
                       VALUES ('$nazwaBadania', '$opis', '$data_badania', '$choroba', '$informacje_pacjenta', '$historia_zabiegow')";
        mysqli_query($conn, $sqlBadanie) or die("Błąd badania: " . mysqli_error($conn));

        $id_badania = mysqli_insert_id($conn);

        // INSERT pacjent
        $sqlPacjent = "INSERT INTO pacjenci (imie, nazwisko, wiek, wzrost, waga, pesel, data_ur, kontakt, id_badania)
                       VALUES ('$imiePacjenta', '$nazwiskoPacjenta', '$wiek', '$wzrost', '$waga', '$pesel', '$data_ur', '$kontakt', '$id_badania')";
        mysqli_query($conn, $sqlPacjent) or die("Błąd pacjenta: " . mysqli_error($conn));
    }
}
?>
<?php
// Dane pacjenta  logowanie po PESEL
if (isset($_POST["pesel"])) {
    $pesel = $_POST["pesel"];

    $sql = "SELECT * FROM pacjenci WHERE pesel = '$pesel'";
    $zapytanie = mysqli_query($conn, $sql);

    if ($rowPacjent = mysqli_fetch_array($zapytanie)) {
        $_SESSION['rola'] = 'pacjent';
        $_SESSION['pesel'] = $rowPacjent['pesel'];

        echo "<p>"."Zalogowano jako pacjent ".$rowPacjent['imie']." ".$rowPacjent['nazwisko']."</p>";

        // karta medyczna
        echo "<h2>Karta Medyczna ".$rowPacjent['imie']." ".$rowPacjent['nazwisko']."</h2>";

        $sql = "SELECT pacjenci.*, badania.*
                FROM pacjenci
                LEFT JOIN badania ON badania.id_badania = pacjenci.id_badania
                WHERE pacjenci.pesel = '$pesel'";
        $query = mysqli_query($conn, $sql);

        while ($row = mysqli_fetch_array($query)) {
            echo "<div class='pacjenci'>";
            echo "<p>Imię: ".$row['imie']."</p>";
            echo "<p>Nazwisko: ".$row['nazwisko']."</p>";
            echo "<p>Wiek: ".$row['wiek']."</p>";
            echo "<p>Wzrost: ".$row['wzrost']."</p>";
            echo "<p>Waga: ".$row['waga']."</p>";
            echo "<p>PESEL: ".$row['pesel']."</p>";
            echo "<p>Data urodzenia: ".$row['data_ur']."</p>";
            echo "<p>Kontakt: ".$row['kontakt']."</p>";
            echo "<p>Nazwa badania: ".$row['nazwa']."</p>";
            echo "<p>Informacje pacjenta: ".$row['informacje_pacjenta']."</p>";

            echo "<p>Opis badania:</p>";
            echo "<details>";
            echo "<summary>Dodatkowe informacje</summary>";
            echo "<p>".$row['opis']."</p>";
            echo "<p>Data badania: ".$row['data']."</p>";
            echo "<p>Choroba: ".$row['choroba']."</p>";
            echo "<p>Historia zabiegów: ".$row['historia_zabiegow']."</p>";
            echo "</details>";
            echo "</div>";
        }}
}
?>
</main>
    <footer>
        <p>Autor: Bartosz Nowak</p>
    </footer>
    <script>

  if (!localStorage.getItem("alertPokazany")) {
    alert("Zmiana przepisów dot. uprawnień do świadczeń opieki zdrowotnej dla pełnoletnich obywateli Ukrainy Informujemy, że od dn. 30.09.2025 r. nastąpiły zmiany dotyczące uprawnień do niektórych świadczeń opieki zdrowotnej dla pełnoletnich obywateli Ukrainy nieposiadających w Polsce statusu osoby ubezpieczonej. Osoby powyżej 18 roku życia, przy których w systemie eWUŚ widnieje informacja o ograniczonym zakresie świadczeń tracą prawo m.in. do refundowanych przez NFZ i wydawanych na receptę leków, środków specjalnego przeznaczenia żywieniowego oraz wyrobów medycznych. W celu uzyskania potwierdzenia możliwości udzielenia refundowanego świadczenia, należy dodatkowo sprawdzić w systemie eWUŚ szczegółowy status. Więcej szczegółów w komunikacie NFZ.");


    localStorage.setItem("alertPokazany", "true");
  }
</script>
<script>
  document.getElementById('role').onchange = function() {
    if (this.value === 'pacjent') {
      document.getElementById('pacjent-panel').style.display = 'block';
      document.getElementById('lekarz-panel').style.display = 'none';
    } else {
      document.getElementById('pacjent-panel').style.display = 'none';
      document.getElementById('lekarz-panel').style.display = 'block';
    }
  };
</script>

    <script>
      document.getElementById("filter").addEventListener("keyup", function() {
  const filter = this.value.toLowerCase();
  const pacjenci = document.querySelectorAll(".pacjenci");

  pacjenci.forEach(pacjent => {
    const text = pacjent.innerText.toLowerCase();


    if (text.includes(filter)) {
      pacjent.style.display = "block";  
    } else {
      pacjent.style.display = "none";   
    }
  });
});
      </script>
</body>
<?php
mysqli_close($conn);
?>
</html>