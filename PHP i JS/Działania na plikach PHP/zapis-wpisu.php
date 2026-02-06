<?php
$plik = fopen("plik.txt", "a"); 
fwrite($plik, "Nowy wpis: " . date("Y-m-d H:i:s") . "\n");
fclose($plik);
?>
