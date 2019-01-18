<?php

include '../include/cabecera.php';
//Capturamos los valores del stock y le restamos la cantidad
$resto = $_POST['stock'] - $_POST['cantidad'];
//Lo actualizamos
$ssql = "update productos set stock='" . $resto .
        "' where id_producto=" . $_POST['id'];
if (mysqli_query($conexion, $ssql)) {
    //Y metemos los datos del articulo en una variable
    $articulo = $_POST['id'] . "," . $_POST['nombre'] . "," . $_POST['img'] . "," . $_POST['precio'] . "," . $_POST['cantidad'] . "," . $_POST['stock'];
//Lo pasamo a array
    $articulo = explode(",", $articulo);
//Y lo metemos en la variable carrito
    array_push($_SESSION['carrito'], $articulo);
    header("Location: ../Tienda.php");
} else {
    print "error" . mysqli_error($conexion);
}

?>
<?php

include '../include/pie.php';
?>