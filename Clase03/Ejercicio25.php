<?php

/*Se quiere realizar una aplicación que lea un archivo (../misArchivos/palabras.txt) y ofrezca
estadísticas sobre cuantas palabras de 1, 2, 3, 4 y más de 4 letras hay en el texto. No tener en
cuenta los espacios en blanco ni saltos de líneas como palabras.
Los resultados mostrarlos en una tabla. */

$archivo = fopen("./Ejercicio25/palabras.txt", "r");

    $unaLetra = 0;
    $dosLetras = 0;
    $tresLetras = 0;
    $cuatroLetras = 0;
    $masLetras = 0;

    while(!feof($archivo))
    {     
            $linea = fgets($archivo);

            if($linea == "")
            {
                continue;  
            }
            
            $palabra = array();
            $palabra = explode(" ", $linea);

            

            for($i=0; $i<count($palabra); $i++)
            {
                //echo "La palabra ".$palabra[$i]." tiene ".strlen($palabra[$i])." letras.<br>";
                switch(strlen($palabra[$i]))
                {
                    case 1:
                    {
                        $unaLetra += 1;
                    }
                    break;

                    case 2:
                    {
                        $dosLetras += 1;
                    }
                    break;

                    case 3:
                    {
                        $tresLetras+=1;
                    }
                    break;

                    case 4:
                    {
                        $cuatroLetras+=1;
                    }
                    break;

                    default:
                    {
                        $masLetras+=1;
                    }
                    break;
                }
            }      
    }

fclose($archivo);
?>

<!DOCTYPE html>
<html>
<head>
<style>
table, th, td {
  border: 1px solid black;
}
</style>
</head>
<body>

<table style="width:100%">
  <tr>
    <th>Una Letra</th>
    <th>Dos Letras</th> 
    <th>Tres Letras</th>
    <th>Cuatro Letras</th>
    <th>Mas Letras</th>
  </tr>
  <tr>
    <td><?php echo $unaLetra ?></td>
    <td><?php echo $dosLetras ?></td>
    <td><?php echo $tresLetras ?></td>
    <td><?php echo $cuatroLetras ?></td>
    <td><?php echo $masLetras ?></td>
  </tr>
</table>

</body>
</html>