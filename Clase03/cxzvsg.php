<?php

$nombre = "Franco Famiglietti";

$archivo = fopen("miArchivo.txt", "w");

fwrite($archivo, $nombre);

fclose($archivo);

$archivo = fopen("miArchivo.txt", "r");

while(!feof($archivo))
{
    echo fgets($archivo);
}

//fread($archivo, filesize("miArchivo.txt)); //Lee el archivo completo

fclose($archivo);

$archivo2 = fopen("miArchivo2.txt", "a");

fwrite($archivo2, $nombre." ".date("r")."\r\n");

fclose($archivo2);

$archivo2 = fopen("miArchivo2.txt", "r");

while(!feof($archivo2))
{
    echo fgets($archivo2)."<br>";
}

fclose($archivo2);
?>