<?php
include '../include/cabecera.php';
$resto = $_POST['stock'] + $dato[4];
$ssql = "update productos set stock='" . $resto .
        "' where id_producto=" . $_POST['id'];
function borrar(){
    foreach ($_SESSION['carrito'] as $key => $dato) {
        //Imprimimos el articulo
        print "<p>cantidad:$dato[4]</p>";
    }
    if (isset($_POST['key'])) {
        //Si el id es igual al id del producto
        //Lo vaciamos entero
        unset($_SESSION['carrito'][$_POST['key']]);
        //cambiamos el valor del array para que no quede uno huerfano
        $_SESSION['carrito'] = array_values($_SESSION['carrito']);
        //recargamos la pagina
        header("Location: ../ver_carro.php");
    }
}
if (mysqli_query($conexion, $ssql)) {
    borrar();
} else {
    print "error" . mysqli_error($conexion);
}
?>
<?php

include '../include/pie.php';
?>