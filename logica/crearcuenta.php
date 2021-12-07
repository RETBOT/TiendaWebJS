<?php
include '../global/config.php';
include '../global/conexion.php';
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
            <a class="navegacion__enlace" href="../ModificarProducto.php">Modificar producto</a>
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


    <?php
          $sentencia=$pdo->prepare("Select * from tblproductos");
          $sentencia->execute();
          $listProductos=$sentencia->fetchAll(PDO::FETCH_ASSOC);
          $total = 0;
    ?>

<h1>Crear cuenta</h1>
        <div class="grid"> 
        <center></center>
        <table style="border-collapse: collapse;  border-spacing: 10px 5px;"  width="700" border="5"  bordercolor="#1FC52E">
            <form method="post" action="registro.php" class="formulario" id="formulario" onsubmit = "return validar();">
                <tr>
                <td><h3>Corrreo electronico: </h3></td>
                    <td><input type="email" style="width:100%;" placeholder="Correo electronico" name="usuario" id="usuario"></td>
                </tr>
                <tr>
                <td><h3>Contraseña: </h3></td>  
                    <td><input type="password" style="width:100%;" placeholder="La contraseña debe contener entre 8 y 12 caracteres" name="clave" id="clave" > 
                </tr>
                <tr>
                    <td><h3>Nombre: </h3></td>
                    <td><input type="text" style="width:100%;" placeholder="Nombre y apellido" autofocus="1" name="nombre" id="nombre" ></td> 
                </tr>
                <tr>
                <td colspan="2"><center><button style="width: 60%; border-radius: 1rem;" class="formulario__submit" type="submit">Crear cuenta</button></center></td>
                </tr>
            </form>
            
            <script src="../js/formulario.js"></script>
        </table>
        </div>

<?Php 
include '../templates/pie.php';
?>