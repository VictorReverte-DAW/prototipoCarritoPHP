<?php
session_start();
?>
<!DOCTYPE html>
<html>

    <head>
        <meta charset="UTF-8">
        <title></title>
        <!--Link con Boostrap y mi propio css-->
        <link rel="stylesheet" href="CSS/CSSBootstrap/css/bootstrap.min.css"/>
        <link rel="stylesheet" href="CSS/MyStyle.css"/>
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
    </head>
    <body>
        <div class="container-fluid">
        <?php
        //Los datos para conectarse a la base de datos
        $usuario = "root";
        $contrasena = "";
        $host = "localhost";
        $basededatos = "carrito";
        //Nos conectamos
        if ($conexion = new mysqli($host, $usuario, $contrasena, $basededatos))
            ;
        //En caso de que da fallo nos avisa y nos lo guarda en un fichero
        if ($conexion->connect_errno) {
            die("Fallo al conectar el fallo");
            file_put_contents("bd.log", "Fallo al conectar el fallo", FILE_APPEND | LOCK_EX);
        }
        ?>