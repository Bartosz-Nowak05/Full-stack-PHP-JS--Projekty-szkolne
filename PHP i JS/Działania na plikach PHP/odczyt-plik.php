<?php
$plik = fopen("plik.txt","r");
$zawartosc = file_get_contents("plik.txt");

if($zawartosc)
{
    echo $zawartosc; 
 
}
else
{
    echo "Plik nie istnieje.";
}
   fclose($plik);
?>
