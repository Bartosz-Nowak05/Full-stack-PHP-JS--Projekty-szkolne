<?php
$host = 'localhost';
$user = 'root';
$pass = '';
$db = 'dziennik';
$conn = new mysqli($host,$user,$pass,$db);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style1.css">
</head>
<body>
<div>
        <table>
        <th>id</th>
        <th>Imie</th>
        <th>Nazwisko</th>
        <th>Ocena 1</th>
        <th>Ocena 2</th>
        <th>Ocena 3</th>
        <?php
        $sql = "SELECT `dziennik`.*
FROM `dziennik`;";
    $REQUEST = mysqli_query($conn,$sql);
    while($row = mysqli_fetch_array($REQUEST))
    {
        echo "<tr>";
        echo '<td>'.$row["id"].'</td>';
        echo '<td>'.$row["imie"].'</td>';
        echo '<td>'.$row["nazwisko"].'</td>';
        echo '<td>'.$row["ocena1"].'</td>';
        echo '<td>'.$row["ocena2"].'</td>';
        echo '<td>'.$row["ocena3"].'</td>';
        echo '</tr>';
    }
        ?>
</table>
<br>
<form method="post">
    <label>Oblicz średnią podaj id</label>
    <br>
    <input type="text" name="input">
    <button type="submit">Oblicz</button>
    <br>
<?php
if (isset($_POST["input"])) {
    $input = $_POST["input"];
    $sql = "SELECT (`ocena1` + `ocena2` + `ocena3`) / 3 AS srednia_ocen FROM `dziennik` WHERE `id` = '$input'";
    $result = mysqli_query($conn, $sql);
    if ($row = mysqli_fetch_assoc($result)) {
        echo $row["srednia_ocen"];
    }
}
?>



</form>
</div>
    
</body>
</html>