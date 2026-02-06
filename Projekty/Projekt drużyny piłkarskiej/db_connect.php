<?php
$host = "localhost";
$user = "root";
$pass = "";
$db = "piłkarze";
$conn = new mysqli($host,$user,$pass,$db);
if ($conn->connect_error) {
    echo "Błąd połączenia: " . $conn->connect_error;
}
mysqli_set_charset($conn, "utf8mb4");
?>
