<?php
include './include/cabecera.php';
?>
<section>
    <section>
        <form action="Tienda.php" method="POST">
            <input type="submit" value="Volver a la tienda">
        </form>
        <?php
        //Si hay valores en el array imprimira el articulo
        if (count($_SESSION['carrito'])) {
            $sumaTotal = 0;
            //Recorremos el carrito
            print "<section class='row'>";
            foreach ($_SESSION['carrito'] as $key => $dato) {
                //Imprimimos el articulo
                print "<article class='col-lg-3 col-md-4'>";
                print "<p>Nombre:$dato[1]</p>";
                print "<img src=imagenes/" . $dato[2] . ".jpg>";
                print "<p>Precio:$dato[3]€</p>";
                print "<p>cantidad:$dato[4]</p>";      
                ?>
                <form action="admin/incrementarStock.php" method="POST">
                    <input type="hidden" name="key" value="<?php print $key ?>"> 
                    <input type="hidden" name="id" value="<?php print $dato[0] ?>"> 
                    <input type="hidden" name="cantidad" value="<?php print $dato[4] ?>"> 
                    <input type="hidden" name="stock" value="<?php print $dato[5] ?>"> 
                    <input type='submit' value='borrar' name='borrar'>
                </form>
                <?php
                //Calculamos el subtotal
                $suma = ($dato[3] * $dato[4]) * 1.21;
                //Y el total
                $sumaTotal += $suma;
                print "<br>subtotal : " . round($suma, 2) . "€";
                print "</article>";
            }
            print "</section>";
            //Lo imprimimos
            print "<span>Precio total: " . round($sumaTotal, 2) . "€</span>";
        } else {
            //Sino dira que no hay articulos
            print "<h2>No hay articulos</h2>";
        }
        ?> 
    </section>
</section>
    <?php
    include './include/pie.php';
    ?>
