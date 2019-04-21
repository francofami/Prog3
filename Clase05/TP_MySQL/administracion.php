<?php

/*
1. Obtener los detalles completos de todos los productos, ordenados alfabéticamente.
2. Obtener los detalles completos de todos los proveedores de ‘Quilmes’.
3. Obtener todos los envíos en los cuales la cantidad este entre 200 y 300 inclusive.
4. Obtener la cantidad total de todos los productos enviados.
5. Mostrar los primeros 3 números de productos que se han enviado.
6. Mostrar los nombres de proveedores y los nombres de los productos enviados.
7. Indicar el monto (cantidad * precio) de todos los envíos.
8. Obtener la cantidad total del producto 1 enviado por el proveedor 102.
9. Obtener todos los números de los productos suministrados por algún proveedor de
‘Avellaneda’.
10. Obtener los domicilios y localidades de los proveedores cuyos nombres contengan la
letra ‘I’.
11. Agregar el producto número 4, llamado ‘Chocolate’, de tamaño chico y con un precio
de 25,35.
12. Insertar un nuevo proveedor (únicamente con los campos obligatorios).
13. Insertar un nuevo proveedor (107), donde el nombre y la localidad son ‘Rosales’ y ‘La
Plata’.
14. Cambiar los precios de los productos de tamaño ‘grande’ a 97,50.
15. Cambiar el tamaño de ‘Chico’ a ‘Mediano’ de todos los productos cuyas cantidades
sean mayores a 300 inclusive.
16. Eliminar el producto número 1.
17. Eliminar a todos los proveedores que no han enviado productos.
*/

require_once "producto.php";
require_once "proveedor.php";
require_once "envio.php";

$queHago = isset($_POST['queHago']) ? $_POST['queHago'] : NULL;

$host = "localhost";
$user = "root";
$pass = "";
$base = "utn";

switch($queHago)
{
    case 1:
    $array = Producto::TraerTodos();
    $array = Producto::OrdenarAlfabeticamente($array);
    Producto::MostrarTodos($array);
    break;

    case 2:
    $array = Proveedor::TraerQuilmes();
    Proveedor::MostrarTodos($array);
    break;

    case 3:
    $array = Envio::TraerEntre200y300();
    Envio::MostrarTodos($array);
    break;

    case 4:
    echo Envio::CantidadTotal();
    break;

    case 5:

    break;

    case 6:

    break;

    case 7:

    break;

    case 8:

    break;

    case 9:

    break;

    case 10:

    break;

    case 11:

    break;

    case 12:

    break;

    case 13:

    break;

    case 14:

    break;

    case 15:

    break;

    case 16:

    break;

    case 17:

    break;

    default:
    echo "uWu";


}

?>