<?php
include "login.php";
?>
<!DOCTYPE html>
<html lang="pl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Książka kucharska</title>
    <link rel="shortcut icon" href="grafika/ico.ico" type="image/x-icon">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
    <script src="script.js"></script>
</head>

<body>
    <header>
        <h1>Moja Książka Kucharska</h1>
        <h2>Spis dań które sam przygotujesz</h2>
    </header>
     
    <nav>
        <ul>
            <li onclick="sniadanie()">Śniadanie</li>
            <li onclick="obiad()">Obiad</li>
            <li onclick="kolacja()">Kolacja</li>
        </ul>
    </nav>
<section id="wyszukiwarka">
    <input type="text" id="searchInput" placeholder="Szukaj przepisu...">
</section>
    <main>
        
        <section id="dodaj">
            <form method="post">
                <label>Nazwa dania:</label>
                <input type="text" name="nazwa_dania">

                <label>Kalorie:</label>
                <input type="number" name="kalorie">

                <label>Zdjęcie:</label>
                <input type="file" name="zdj_potrawy">

                <label>Typ posiłku:</label>
                <select name="typ_posilku">
                    <option value="śniadanie">Śniadanie</option>
                    <option value="obiad">Obiad</option>
                    <option value="kolacja">Kolacja</option>
                </select>

                <label>Przepis:</label>
                <textarea name="przepis"></textarea>

                <label>Miary składników:</label>
                <input type="text" name="miary">

                <button type="submit">Dodaj</button>
            </form>
            <?php

            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $nazwa   = $_POST['nazwa_dania'] ?? '';
                $kalorie = $_POST['kalorie'] ?? 0;
                $typ     = $_POST['typ_posilku'] ?? '';
                $przepis = $_POST['przepis'] ?? '';
                $miary   = $_POST['miary'] ?? '';

                $zdj = '';
                if (!empty($_FILES['zdj_potrawy']['tmp_name'])) {
                    $zdj = addslashes(file_get_contents($_FILES['zdj_potrawy']['tmp_name']));
                }
                switch ($typ) {
                    case 'śniadanie': $id_dania = 1; break;
                    case 'obiad':     $id_dania = 2; break;
                    case 'kolacja':   $id_dania = 3; break;
                    default:          $id_dania = 0;
                }

                $sql1 = "INSERT INTO potrawa (id_dania, nazwa_dania, kalorie, zdj_potrawy)
                        VALUES ('$id_dania', '$nazwa', '$kalorie', '$zdj')";
                mysqli_query($conn, $sql1);
                $id_potrawa = mysqli_insert_id($conn);

                $sq2 = "INSERT INTO skladniki (przepis, miary)
                        VALUES ('$przepis', '$miary')";
                mysqli_query($conn, $sq2);
                $id_skladniki = mysqli_insert_id($conn);

                if ($id_potrawa && $id_skladniki) {
                    $sql3 = "INSERT INTO potrawa_skladniki (id_potrawa, id_skladniki)
                            VALUES ('$id_potrawa', '$id_skladniki')";
                    mysqli_query($conn, $sql3);
                }

                echo "Dodano potrawę i składnik";
            }
            ?>
            </form>


        </section>
        <section id="sniadanie">
            <?php
                $query = "SELECT `dania`.*, `potrawa`.*, `potrawa_skladniki`.*, `potrawa`.*, `skladniki`.*, `dania`.`nazwa`
                FROM `dania` 
                    LEFT JOIN `potrawa` ON `potrawa`.`id_dania` = `dania`.`id_dania` 
                    LEFT JOIN `potrawa_skladniki` ON `potrawa_skladniki`.`id_potrawa` = `potrawa`.`id_potrawa` 
                    LEFT JOIN `skladniki` ON `potrawa_skladniki`.`id_skladniki` = `skladniki`.`id_skladniki`
                    WHERE `dania`.`nazwa` = 'śniadanie';";

                $result = mysqli_query($conn, $query);

                while ($row = mysqli_fetch_array($result)) {
                    echo "<div>";
                    echo "<h2>" . ($row['nazwa_dania']) . "</h2>";
                    echo "<br>";
                    echo "<p onclick='oblicz()'>"."Kalorie:  ".$row["kalorie"]."</p>";
                    echo '<img src="data:image/webp;base64,' . base64_encode($row['zdj_potrawy']) . '" alt="Zdjęcie potrawy">';
                    echo "<details>".$row["przepis"]."<br>".$row["miary"]."</details>";
                    echo "</div>";
                }
            ?>
        </section>
        <section id="obiad">
            <?php
                $query = "SELECT `dania`.*, `potrawa`.*, `potrawa_skladniki`.*, `potrawa`.*, `skladniki`.*, `dania`.`nazwa`
                FROM `dania` 
                    LEFT JOIN `potrawa` ON `potrawa`.`id_dania` = `dania`.`id_dania` 
                    LEFT JOIN `potrawa_skladniki` ON `potrawa_skladniki`.`id_potrawa` = `potrawa`.`id_potrawa` 
                    LEFT JOIN `skladniki` ON `potrawa_skladniki`.`id_skladniki` = `skladniki`.`id_skladniki`
                    WHERE `dania`.`nazwa` = 'obiad';";

                $result = mysqli_query($conn, $query);

                while ($row = mysqli_fetch_array($result)) {
                    echo "<div>";
                echo "<h2>" . ($row['nazwa_dania']) . "</h2>";
                echo "<br>";
                echo "<p onclick='oblicz()'>"."Kalorie:  ".$row["kalorie"]."</p>";
                echo '<img src="data:image/webp;base64,' . base64_encode($row['zdj_potrawy']) . '" alt="Zdjęcie potrawy">';
                echo "<details>".$row["przepis"]."<br>".$row["miary"]."</details>";
                echo "</div>";
                }
            ?>
        </section>
        <section id="kolacja">
            <?php
                $query = "SELECT `dania`.*, `potrawa`.*, `potrawa_skladniki`.*, `potrawa`.*, `skladniki`.*, `dania`.`nazwa`
                     FROM `dania` 
                     LEFT JOIN `potrawa` ON `potrawa`.`id_dania` = `dania`.`id_dania` 
                     LEFT JOIN `potrawa_skladniki` ON `potrawa_skladniki`.`id_potrawa` = `potrawa`.`id_potrawa` 
                     LEFT JOIN `skladniki` ON `potrawa_skladniki`.`id_skladniki` = `skladniki`.`id_skladniki`
                     WHERE `dania`.`nazwa` = 'kolacja';";

                $result = mysqli_query($conn, $query);

                while ($row = mysqli_fetch_array($result)) {
                    echo "<div>";
                    echo "<h2>" . ($row['nazwa_dania']) . "</h2>";
                    echo "<br>";
                    echo "<p onclick='oblicz()'>"."Kalorie:  ".$row["kalorie"]."</p>";
                    echo '<img src="data:image/webp;base64,' . base64_encode($row['zdj_potrawy']) . '" alt="Zdjęcie potrawy">';
                    echo "<details>".$row["przepis"]."<br>".$row["miary"]."</details>";
                    echo "</div>";
                }
            ?>
        </section>
    </main>
</body>
</html>