<?php

    try
    {
        $username = "root";
        $password = "";
        $host = "localhost";
        $db = "cdcol";

        $conexion = new PDO("mysql:dbname=$db;host=$host",$username,$password);

        $objQuery = $conexion->query("SELECT * FROM cds");

        $todosLosDatos = $objQuery->fetchall();

        //var_dump($todosLosDatos);

        foreach($todosLosDatos as $dato)
        {
            echo $dato[0]." ";
            echo $dato[1]." ";
            echo $dato[2]."<br>";

        }

        echo "<br><br>Conexion satisfactoria de:<br> User: ".$username."<br>Pass: ".$password."<br>";

        




    }
    catch(PDOException $e)
    {

    }
    

?>