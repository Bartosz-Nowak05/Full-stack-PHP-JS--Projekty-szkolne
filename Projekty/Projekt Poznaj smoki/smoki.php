<?php
    $host = "localhost";
    $user = "root";
    $pass = "";
    $db = "smoki";
    $conn = new mysqli($host,$user,$pass,$db);
    if(!$conn)
    {
        die("Błąd");
    }
?>
<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Smoki</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <script>
function baza() {
    document.querySelector(".blok1").style.backgroundColor = "MistyRose";
    document.querySelector(".blok2").style.backgroundColor = "#FFAEA5";
    document.querySelector(".blok3").style.backgroundColor = "#FFAEA5";

    document.querySelector("main section:nth-of-type(1)").style.display = "block";
    document.querySelector(".section2").style.display = "none";
    document.querySelector(".section3").style.display = "none";
}

function opisy() {
    document.querySelector(".blok1").style.backgroundColor = "#FFAEA5";
    document.querySelector(".blok2").style.backgroundColor = "MistyRose";
    document.querySelector(".blok3").style.backgroundColor = "#FFAEA5";

    document.querySelector("main section:nth-of-type(1)").style.display = "none";
    document.querySelector(".section2").style.display = "block";
    document.querySelector(".section3").style.display = "none";
}

function galeria() {
    document.querySelector(".blok1").style.backgroundColor = "#FFAEA5";
    document.querySelector(".blok2").style.backgroundColor = "#FFAEA5";
    document.querySelector(".blok3").style.backgroundColor = "MistyRose";

    document.querySelector("main section:nth-of-type(1)").style.display = "none";
    document.querySelector(".section2").style.display = "none";
    document.querySelector(".section3").style.display = "block";
}
</script>

    <header>
        <h2>
            Poznaj smoki
        </h2>
    </header>
    <nav>
        <aside onclick="baza()" class="blok1">
            <span>Baza</span>

        </aside>
        <aside onclick="opisy()" class="blok2">
            <span>Opisy</span>
            
            
              
        </aside>
        <aside onclick="galeria()" class="blok3">
            <span>Galeria</span>
              
        </aside>
    </nav>
    <main>
        <section>
            <h3>Baza Smoków</h3>
            <form method="post">
                <select name="smoka">
                    <?php
                    $sql = "SELECT DISTINCT `smok`.`pochodzenie` FROM `smok` ORDER BY `smok`.`pochodzenie` ASC";
                    $query = mysqli_query($conn,$sql);
                    while ($row = mysqli_fetch_array($query)) {
                        echo "<option>".$row["pochodzenie"]."</option>";
                    }
                    ?>
                      </select>
                    <button type="submit">Szukaj</button>

            </form>
                    <table>
                        <th>Nazwa</th>
                        <th>Długość</th>
                        <th>Szerokość</th>

                    <?php
                    if(isset($_POST["smoka"]))
                    { $smoka = $_POST["smoka"];
                                 $sql = "SELECT `smok`.`nazwa`, `smok`.`dlugosc`, `smok`.`szerokosc`
                        FROM `smok`
                        WHERE `smok`.`pochodzenie` = '$smoka';";
                        $query = mysqli_query($conn,$sql);
                    while ($row = mysqli_fetch_array($query)) {
                         echo "<tr>";
                        echo "<td>".$row["nazwa"]."</td>";
                        echo "<td>".$row["dlugosc"]."</td>";
                        echo "<td>".$row["szerokosc"]."</td>";
                        echo "</tr>";
                       
                    }
                    }
                
               
                    ?>
                    </table>
        </section>
           <section class="section2">
             <h3>Opisy smoków</h3>
             <p>Smok czerwony
Pochodzi z Chin. Ma 1000 lat. Żywi się mniejszymi zwierzętami. Posiada łuski cenne na rynkach wschodnich do wyrabiania lekarstw. Jest dziki i groźny.
		
Smok zielony
Pochodzi z Bułgarii. Ma 10000 lat. Żywi się mniejszymi zwierzętami, ale tylko w kolorze zielonym. Jest kosmaty. Z sierści zgubionej przez niego, tka się najdroższe materiały.

Smok niebieski 
Pochodzi z Francji. Ma 100 lat. Żywi się owocami morza. Jest natchnieniem dla najlepszych malarzy. Często im pozuje. Smok ten jest przyjacielem ludzi i czasami im pomaga. Jest jednak próżny i nie lubi się przepracowywać.
</p>
           </section>
        <section class="section3">
           <section>
            <h3>Galeria</h3>
            <img src="smok1.JPG" alt="Smok czerwony">
            <img src="smok2.JPG" alt="Smok wielki">
            <img src="smok3.JPG" alt="Skrzydalty łaciaty">
            
        </section>
    </main>
    
    <footer>
        <p>
            Stronę opracował: 000000
        </p>
    </footer>
    <?php
    $conn -> close();
    ?>
</body>
</html>