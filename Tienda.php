<?php
include './include/cabecera.php';
if (!isset($_SESSION['carrito'])) {
    $_SESSION['carrito'] = array();
}
?>
<!--Creamos una foto que sea un enlace al carrito-->
<header>
    <i class="fab"><h3>PIPELINE</h3></i>
    <a href="ver_carro.php">
        <i class="fas fa-shopping-cart"></i>
        <span class="badge badge-light"><?php print count($_SESSION['carrito']) ?></span>
    </a>
    <h1><p>Tu tienda de juegos de switch<p></h1>
</header>
<?php
$consulta = "SELECT * FROM productos;";
$datos = $conexion->query($consulta);
?>
<section class="row">
    <?php
    while ($array = $datos->fetch_array()) {
        print "<article class='col-lg-3 col-md-4'>";
        print "<h5>" . $array['nombre'] . "</h5>";
        print "<div class = 'shadow-lg p-3 mb-5 bg-white rounded'>" . "h<4>" . "<img src=imagenes/" . $array['imagen'] . ".jpg>" . "</h4>" . "</div >";
        print "<p>Precio: " . $array['precio'] . "€</p>";
        print "Stock: " . $array['stock'];
        if ($array['stock'] > 0) {
            ?>
            <form method="POST" action="admin/realizarUpdate.php">
                <input type="hidden" name="id" value="<?php print $array['id_producto'] ?>">
                <input type="hidden" name="nombre" value="<?php print $array['nombre'] ?>">
                <input type="hidden" name="img" value="<?php print $array['imagen'] ?>">
                <input type="hidden" name="precio" value="<?php print $array['precio'] ?>">
                <input type="hidden" name="stock" value="<?php print $array['stock'] ?>">
                <input type="number" class="form-control" min="1" max="<?php print $array['stock'] ?>" name="cantidad" placeholder="cantidad"required>
                <input type="submit" name="comprar" value="comprar">
            </form>
            <?php
        } else {
            print "<div class='alert alert-info' role='alert'>No queda stock</div>";
        }
        print "</article>";
    }
    ?>
</section>

<?php
include './include/pie.php';
?>
