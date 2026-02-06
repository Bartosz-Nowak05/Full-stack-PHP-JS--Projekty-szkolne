<?php
$conn = mysqli_connect('localhost','root','','szkola25');
?>

<!DOCTYPE html>
<html lang="pl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formularz</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <main>
        <form action="" method="post">
            <label>Imie</label>
            <br>
            <input type="text" name="imie" required>
            <br>
            <label>Nazwisko</label>
            <br>
            <input type="text" name="nazwisko" required>
            <br>
            <label>Email</label>
            <br>
            <input type="text" name="email" required>
            <br>
            <label>Narodowość</label>
            <br>
            <input type="text" name="narodowosc" list="narodowosc" required>
            <datalist id="narodowosc">
                <?php
                    $sql = "SELECT `osoby`.`narodowosc`
                    FROM `osoby`;";
                    $query = mysqli_query($conn,$sql);
                    while($row = mysqli_fetch_array($query))
                        {
                            echo "<option value=".$row["narodowosc"].">";
                        }
                ?>
            </datalist>
            <br>
            <label>Wojewódstwo</label>
            <br>
            <input type="text" list="wojewodstwo" name="wojewodstwo" required>
            <br><br>
            <button type="submit">Dodaj</button>
            <datalist id='wojewodstwo'>
                <option value="Dolnośląskie">
                <option value="Kujawsko-Pomorskie">
                <option value="Lubelskie">
                <option value="Lubuskie">
                <option value="Łódzkie">
                <option value="Małopolskie">
                <option value="Mazowieckie">
                <option value="Opolskie">
                <option value="Podkarpackie">
                <option value="Podlaskie">
                <option value="Pomorskie">
                <option value="Śląskie">
                <option value="Świętokrzyskie">
                <option value="Warmińsko-Mazurskie">
                <option value="Wielkopolskie">
                <option value="Zachodniopomorskie">
                    <?php
                        $sql = "SELECT `osoby`.`wojewodstwo`
                        FROM `osoby`;";
                        $query = mysqli_query($conn,$sql);
                        while($row = mysqli_fetch_array($query))
                            {
                                echo "<option value=".$row["wojewodstwo"].">";
                            }
                    ?>
            </datalist>
            <?php
                if($_SERVER["REQUEST_METHOD"] == "POST")
                {
                    $imie = $_POST["imie"];
                    $nazwisko = $_POST["nazwisko"];
                    $email = $_POST["email"];
                    $narodowosc = $_POST["narodowosc"];
                    $wojewodstwo = $_POST["wojewodstwo"];
                    $sql = "INSERT INTO `osoby`( `imie`, `nazwisko`, `email`, `wojewodstwo`, `narodowosc`) VALUES ('$imie','$nazwisko','$email','$wojewodstwo','$narodowosc')";
                    $query = mysqli_query($conn, $sql);
                    }
            ?>
        </form>
        <section>
            <table>
                <th>Imie</th>
                 <th>Nazwisko</th>
                  <th>Email</th>
                   <th>Narodowość</th>
                    <th>Wojewódstwo</th>
                     <th>Czas</th>
                    <?php
                    $sql = "SELECT * FROM `osoby`";
                    $query = mysqli_query($conn,$sql);
                    while($row = mysqli_fetch_array($query))
                    {
                        echo "<tr>";
                        echo "<td>".$row["imie"]."</td>";
                        echo "<td>".$row["nazwisko"]."</td>";
                        echo "<td>".$row["email"]."</td>";
                        echo "<td>".$row["narodowosc"]."</td>";
                        echo "<td>".$row["wojewodstwo"]."</td>";
                        echo "<td>".$row["created_at"]."</td>";
                        echo "</tr>";
                    }
                    ?>
            </table>
        </section>
    </main>
     <?php
     mysqli_close($conn);
     ?>               
</body>

</html>