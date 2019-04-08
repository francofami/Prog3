<?php

    require_once "Empleado.php";  

    var_dump($_POST);
    
    //Debo copiar la carpeta a xamp/htdocs para utilizar el php

    echo "<br>";
    var_dump($_FILES); 

    $destino = "FotosEmpleados\\".$_REQUEST["legajo"]."_".$_REQUEST["apellido"].".".pathinfo($_FILES["foto"]["name"], PATHINFO_EXTENSION); //Guardo la imagen y la renombro a legajo_apellido.extension (la extension la consigo con pathinfo)
    move_uploaded_file($_FILES["foto"]["tmp_name"],$destino);

    $emp = new Empleado($_REQUEST["apellido"],$_REQUEST["nombre"],$_REQUEST["dni"],$_REQUEST["legajo"],$_REQUEST["sueldo"], $destino);

    Empleado::Agregar($emp);

    echo "<br> Todos los empleados: <br>";
    
    $array = Empleado::TraerTodos();

    foreach($array as $empleado)
    {
        echo $empleado->legajo." ".$empleado->apellido." ".$empleado->nombre."<br>"."<img src='".$empleado->path_foto."' width=100 height=100/>"."<br>";
    }
    
    
?>

<br><a href="ingreso.html">Volver</a>
