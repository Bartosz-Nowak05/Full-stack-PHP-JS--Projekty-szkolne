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
        <img src="back.png" alt="back" id="back" onclick="back()">
        <h1>Kreatywny Impuls</h1><img src="fav.ico" alt="">
    </header>
    <div class="kontener">
    <nav>
        <form action="" method="POST" id="myForm">

            <label for="nazwa_firmy">Nazwa firmy:</label><br>
            <input type="text" name="nazwa_firmy" id="nazwa_firmy" required><br><br>

            <label for="email">E-mail:</label><br>
            <input type="email" name="email" id="email"><br><br>

            <label for="telefon">Telefon:</label><br>
            <input type="text" name="telefon" id="telefon" required><br><br>

            <button type="submit">Dodaj klienta</button>
                <?php
                        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                        $nazwa_firmy  = $_POST['nazwa_firmy'] ?? '';
                        $email        = $_POST['email'] ?? '';
                        $telefon      = $_POST['telefon'] ?? '';

                        if (!empty($nazwa_firmy) && !empty($email) && !empty($telefon)) {
                            $stmt = $conn->prepare("INSERT INTO klienci (nazwa_firmy, email, telefon) VALUES (?, ?, ?)");
                            $stmt->bind_param("sss", $nazwa_firmy, $email, $telefon);

                            if ($stmt->execute()) {
                                echo "<p>Nowy klient został dodany.</p>";
                            } 

                            $stmt->close();
                        }
                    }
                ?>
       </form>
    </nav>
    
    <main>
        <section id="klienci">
            <table class="pracownicytabela">
                    <th>Nazwa firmy</th>
                    <th>Email</th>
                    <th>Telefon</th>
                    <?php
                        $sql = "SELECT * FROM `klienci`";
                        $query = mysqli_query($conn,$sql);
                        while($row = mysqli_fetch_array($query))
                        {
                            echo "<tr>";
                            echo "<td>".$row["nazwa_firmy"]."</td>";
                            echo "<td>".$row["email"]."</td>";
                            echo "<td>".$row["telefon"]."</td>";
                        }
                    ?>
            </table>
        </section>        
    </main>
    </div>
    <footer>
        <p>Autor: 00000000</p>
    </footer>
    <script src="skrypty.js"></script>
</body>
</html>