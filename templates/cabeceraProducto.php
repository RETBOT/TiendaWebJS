
<?php
include '../templates/session.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Video Games Store</title>
    <link rel="stylesheet" href="../css/normalize.css">
    <link href="https://fonts.googleapis.com/css2?family=Staatliches&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="shortcut icon" href="../img/icono.png">
</head>
<body>
    <header class="header">
        <a href="../index.php">
            <img class="header__logo" src="../img/logo.png" alt="Logotipo">
        </a>
    </header>

    <?php 
    if(isset($_SESSION['usuario'])) {
        if (strcmp($_SESSION['usuario']['Correo'],"admin@correo.com")==0){
            ?>
            <nav class="navegacion">
            <a class="navegacion__enlace navegacion__enlace--activo" href="../index.php">Tienda</a>
            <a class="navegacion__enlace" href="../nosotros.php">Nosotros</a>
            <a class="navegacion__enlace" href="../carrito/carrito.php">Carrito (<?php 
                echo (empty($_SESSION['CARRITO']))?0:count($_SESSION['CARRITO']);
            ?>)</a>
            <a class="navegacion__enlace" href="../AgregarProducto.php">Agregar producto</a>
            <a class="navegacion__enlace" href="../EliminarProducto.php">Eliminar producto</a>
            <a class="navegacion__enlace" href="../logica/salir.php">Cerrar sesión</a>
        </nav>
         
         <?php
            }else{
         ?>
     <nav class="navegacion">
        <a class="navegacion__enlace" href="../index.php">Tienda</a>
        <a class="navegacion__enlace" href="../nosotros.php">Nosotros</a>
        <a class="navegacion__enlace navegacion__enlace--activo" href="../carrito/carrito.php">Carrito (<?php 
            echo (empty($_SESSION['CARRITO']))?0:count($_SESSION['CARRITO']);
        ?>)</a>
        <a class="navegacion__enlace" href="../carrito/compras.php">Producto comprado</a>
        <a class="navegacion__enlace" href="../ModificarProducto.php">Modificar producto</a>
         <a class="navegacion__enlace" href="../logica/salir.php">Cerrar sesión</a>
    </nav>
     
     <?php
    }
}else{
?>
    <nav class="navegacion">
        <a class="navegacion__enlace" href="../index.php">Tienda</a>
        <a class="navegacion__enlace" href="../nosotros.php">Nosotros</a>
        <a class="navegacion__enlace navegacion__enlace--activo" href="../carrito/carrito.php">Carrito (<?php 
            echo (empty($_SESSION['CARRITO']))?0:count($_SESSION['CARRITO']);
        ?>)</a>
         <a class="navegacion__enlace" href="../login.php">Iniciar sesión</a>
    </nav>
    <?php } ?>

    <?Php ?>