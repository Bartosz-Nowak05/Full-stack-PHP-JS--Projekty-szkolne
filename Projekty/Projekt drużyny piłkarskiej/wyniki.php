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
    <!-- logowanie -->
<section class="login">
    <h2>Logowanie</h2>
    <form method="post">
        <label for="username">Login</label>
        <input type="text" name="username" id="username" required>

        <label for="password">Hasło</label>
        <input type="password" name="password" id="password" required>
        <br>
        <button type="submit" name="login">Zaloguj</button>
         <button type="button" onclick="window.location.href='logout.php'">Wyloguj</button>

    </form>

    <?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['login'])) {
        require_once 'db_connect.php';
    

        $username = mysqli_real_escape_string($conn, $_POST["username"]);
        $password = $_POST["password"];

        $sql = "SELECT * FROM users WHERE username='$username'";
        $result = mysqli_query($conn, $sql);
        $user = mysqli_fetch_assoc($result);

       if ($user && $password === $user['password']) {
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['username'] = $user['username'];
            $_SESSION['admin'] = true;
            header("Location: wyniki.php");
            exit;
        } else {
            echo "<p style='color:red;'>Nieprawidłowe dane logowania.</p>";
        }
    }
    ?>
</section>
    </header>
        
    <main>
        <h1> Nasze osiągi</h1>
        <table>
          <th>gospodarze</th>
           <th>goscie</th>
            <th>asysty</th>
             <th>spalone</th>
              <th>rzuty rozne</th>
               <th>rzuty wolne</th>
                <th>zolte_kartki</th>
                 <th>gole</th>
                    <th>gole przeciwnikow</th>
                        <th>wygrany mecz</th>

                 <?php
                 $sql ="SELECT * FROM `mecze` WHERE 1";
                 $REQUEST = mysqli_query($conn,$sql);
                 while ($row = mysqli_fetch_array($REQUEST)) {
                    echo "<tr>";
                    echo "<td>".$row["gospodarze"]."</td>";
                    echo "<td>".$row["goscie"]."</td>";
                    echo "<td>".$row["asysty"]."</td>";
                    echo "<td>".$row["spalone"]."</td>";
                    echo "<td>".$row["rzuty_rozne"]."</td>";
                    echo "<td>".$row["rzuty_wolne"]."</td>";
                    echo "<td>".$row["zolte_kartki"]."</td>";
                    echo "<td>".$row["gole"]."</td>";
                    echo "<td>".$row["gole_przeciwnikow"]."</td>";
                    echo "<td>".$row["wygrany_mecz"]."</td>";
                    echo "</tr>";
                 }
                 ?>
                 </table>
                   <h1>Statystyki</h1>
           <?php


    $labels = [];
    $asysty = [];
    $spalone = [];
    $rzuty_rozne = [];
    $rzuty_wolne = [];
    $zolte_kartki = [];
    $gole = [];
    $gole_przeciwnikow = [];
    $wygrany_mecz = [];

    $sql = "SELECT * FROM mecze";
    $REQUEST = mysqli_query($conn, $sql);

    while ($row = mysqli_fetch_array($REQUEST)) {
        $labels[] = $row["gospodarze"] . " vs " . $row["goscie"];
        $asysty[] = (int)$row["asysty"];
        $spalone[] = (int)$row["spalone"];
        $rzuty_rozne[] = (int)$row["rzuty_rozne"];
        $rzuty_wolne[] = (int)$row["rzuty_wolne"];
        $zolte_kartki[] = (int)$row["zolte_kartki"];
        $gole[] = (int)$row["gole"];
        $gole_przeciwnikow[] = (int)$row["gole_przeciwnikow"];
        $wygrany_mecz[] = $row["wygrany_mecz"] === "tak" ? 1 : 0;
    }
    ?>


    <canvas id="statsChart" height="1900"></canvas>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
    const ctx = document.getElementById('statsChart').getContext('2d');
    const statsChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: <?php echo json_encode($labels); ?>,
            datasets: [
                {
                    label: 'Asysty',
                    data: <?php echo json_encode($asysty); ?>,
                    backgroundColor: 'rgba(0, 123, 255, 0.6)'
                    
                },
                {
                    label: 'Spalone',
                    data: <?php echo json_encode($spalone); ?>,
                    backgroundColor: 'rgba(255, 99, 132, 0.6)'
                },
                {
                    label: 'Rzuty rożne',
                    data: <?php echo json_encode($rzuty_rozne); ?>,
                    backgroundColor: 'rgba(255, 206, 86, 0.6)'
                },
                {
                    label: 'Rzuty wolne',
                    data: <?php echo json_encode($rzuty_wolne); ?>,
                    backgroundColor: 'rgba(75, 192, 192, 0.6)'
                },
                {
                    label: 'Żółte kartki',
                    data: <?php echo json_encode($zolte_kartki); ?>,
                    backgroundColor: 'rgba(255, 159, 64, 0.6)'
                },
                {
                    label: 'Gole (gospodarze)',
                    data: <?php echo json_encode($gole); ?>,
                    backgroundColor: 'rgba(0, 0, 255, 0.6)'
                },
                {
                    label: 'Gole przeciwników',
                    data: <?php echo json_encode($gole_przeciwnikow); ?>,
                    backgroundColor: 'rgba(255, 0, 0, 0.6)'
                },
                {
                    label: 'Wygrany mecz',
                    data: <?php echo json_encode($wygrany_mecz); ?>,
                    backgroundColor: 'rgba(0, 255, 0, 0.6)'
                }
            ]
        },
    options: {
        indexAxis: 'y',
        responsive: true,
        scales: {
            x: {
                beginAtZero: true
            }
        }
    }
        
    });
    </script>
    <script>
    document.querySelectorAll("td").forEach(td => td.innerText === "wygrany" && (td.style.background = "green"));
    document.querySelectorAll("td").forEach(td => td.innerText === "przegrany" && (td.style.background = "red"));

    </script>
                   
</main>
  <br>  <br>  <br>  <br>

<?php

if (isset($_SESSION["admin"]) && $_SESSION["admin"]) {
?>

<section class="dodaj">
<form method="post" >
  <label>Gospodarze</label><br>
  <input type="text" name="gospodarze" required><br>

  <label>Goście</label><br>
  <input type="text" name="goscie" required><br>

  <label>Asysty</label><br>
  <input type="number" name="asysty" required><br>

  <label>Spalone</label><br>
  <input type="number" name="spalone" required><br>

  <label>Rzuty rożne</label><br>
  <input type="number" name="rzuty_rozne" required><br>

  <label>Rzuty wolne</label><br>
  <input type="number" name="rzuty_wolne" required><br>

  <label>Żółte kartki</label><br>
  <input type="number" name="zolte_kartki" required><br>

  <label>Gole</label><br>
  <input type="number" name="gole" required><br>

  <label>Gole przeciwników</label><br>
  <input type="number" name="gole_przeciwnikow" required><br>

  <label>Wygrany mecz</label>
  <br>
  <select name="wygrany_mecz">
    <option value="tak">Tak</option>
    <option value="nie">Nie</option>
    <option value="remis">Remis</option>
  </select><br>

  <button type="submit" >Zapisz</button>
</form>
<!-- dodawanie  -->
 
<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $gospodarze = $_POST["gospodarze"];
    $goscie = $_POST["goscie"];
    $asysty = $_POST["asysty"];
    $spalone = $_POST["spalone"];
    $rzuty_rozne = $_POST["rzuty_rozne"];
    $rzuty_wolne = $_POST["rzuty_wolne"];
    $zolte_kartki = $_POST["zolte_kartki"];
    $gole = $_POST["gole"];
    $gole_przeciwnikow = $_POST["gole_przeciwnikow"];
    $wygrany_mecz = $_POST["wygrany_mecz"];

    $sql = "INSERT INTO mecze (gospodarze, goscie, asysty, spalone, rzuty_rozne, rzuty_wolne, zolte_kartki, gole, gole_przeciwnikow, wygrany_mecz)
            VALUES ('$gospodarze', '$goscie', '$asysty', '$spalone', '$rzuty_rozne', '$rzuty_wolne', '$zolte_kartki', '$gole', '$gole_przeciwnikow', '$wygrany_mecz')";

    $REQUEST = mysqli_query($conn,$sql);
    if ($REQUEST) {
        echo "<p style='color:green;'> Dodano mecz do tabeli</p>";
    } else {
        echo "<p style='color:red;'> Błąd zapytania: " . mysqli_error($conn) . "</p>";
    }
}
?>

</section>

<?php
}
?>


        <footer>
        <p>Autor: Bartosz Nowak</p>
    </footer>
</body>
</html>