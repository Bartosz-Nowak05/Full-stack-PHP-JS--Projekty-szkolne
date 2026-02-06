<?php
include "login.php";
?>
<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="shortcut icon" href="fav.ico" type="image/x-icon">
    <title>Kreatywny Impuls</title>
</head>
<body>
    <header>
        <h1>Kreatywny Impuls</h1><img src="fav.ico" alt="">
    </header>
    <div class="kontener">
        <nav>
            <aside onclick="pracownicy()" class="pracownicy">Pracownicy</aside>
            <aside onclick="uslugi()" class="uslugi">Usługi</aside>
            <a href="dodaj.php">Klienci</a>
            <form action="" method="post">
                <label>Szukaj</label>
                <input type="text" name="search">
                <button type="submit" onclick="search()">Wyszukaj</button>
            </form>
        </nav>
    <main>
       <section id="pracownicy">
            <?php
            if(empty($_POST["search"])) {
                echo '<table class="pracownicytabela">';
                echo '<tr><th>Imię</th><th>Nazwisko</th><th>Stanowisko</th><th>Data Zatrudnienia</th></tr>';
                $sql = "SELECT * FROM `pracownicy`";
                $query = mysqli_query($conn,$sql);
                while($row = mysqli_fetch_array($query)) {
                    echo "<tr>";
                    echo "<td>".$row["imie"]."</td>";
                    echo "<td>".$row["nazwisko"]."</td>";
                    echo "<td>".$row["stanowisko"]."</td>";
                    echo "<td>".$row["data_zatrudnienia"]."</td>";
                    echo "</tr>";
                }
                echo "</table>";
            } else {

                $search = mysqli_real_escape_string($conn, $_POST["search"]);
                $zapytanie = "SELECT 
                                klienci.nazwa_firmy, 
                                projekty.id_uslugi, 
                                uslugi.nazwa_uslugi, 
                                projekty.status_projektu, 
                                projekty.szacowany_koszt
                            FROM klienci
                            LEFT JOIN projekty ON projekty.id_klienta = klienci.id_klienta
                            LEFT JOIN uslugi ON projekty.id_uslugi = uslugi.id_usługi
                            WHERE klienci.nazwa_firmy = '$search';";

                $result = mysqli_query($conn, $zapytanie);

                echo "<table border='1'>";
                echo "<tr>
                        <th>Nazwa firmy</th>
                        <th>ID usługi</th>
                        <th>Nazwa usługi</th>
                        <th>Status projektu</th>
                        <th>Szacowany koszt</th>
                    </tr>";

                while($row = mysqli_fetch_array($result)) {
                    echo "<tr>";
                    echo "<td>".$row['nazwa_firmy']."</td>";
                    echo "<td>".$row['id_uslugi']."</td>";
                    echo "<td>".$row['nazwa_uslugi']."</td>";
                    echo "<td>".$row['status_projektu']."</td>";
                    echo "<td>".$row['szacowany_koszt']."</td>";
                    echo "</tr>";
                }
                echo "</table>";
            }
            ?>
        </section>
        
        <section id="uslugi">
            <table>
                <tr>
                    <th>Nazwa Usługi</th>
                    <th>Cena Netto</th>
                    <th>Opis</th>
                </tr>
            <?php
                $sql = "SELECT * FROM `uslugi`";
                $query = mysqli_query($conn,$sql);
                while($row = mysqli_fetch_array($query)) {
                    echo "<tr>";
                    echo "<td>".$row["nazwa_uslugi"]."</td>";
                    echo "<td>".$row["cena_netto"]."</td>";
                    echo "<td>".$row["opis"]."</td>";
                    echo "</tr>";
                }
            ?>
            </table>
        </section>
             
    </main>
    </div>
    <footer>
        <p>Autor: 00000000</p>
        <h4>
            <?php
            $liczba = "SELECT COUNT(`projekty`.`status_projektu`) AS liczba, AVG (`projekty`.`szacowany_koszt`) AS koszt
            FROM `projekty`
            WHERE `projekty`.`status_projektu` = 'W trakcie';";
            $result = mysqli_query($conn, $liczba);

        $row = mysqli_fetch_array($result);

echo "Liczba projektów w trakcie: " . $row['liczba'] . "<br>";
echo "Średni koszt: " . $row['koszt'];
?>

        </h4>
    </footer>
       
    <script src="skrypty.js"></script>
</body>
</html>