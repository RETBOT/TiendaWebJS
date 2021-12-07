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
        <center></center><table style="border-collapse: collapse;  border-spacing: 10px 5px;"  border="5"  bordercolor="#1FC52E">
            <form method="post" action="registro.php" class="formulario" id="formulario" >
                <tr>
                <td style="width: 50%;"><h3>Corrreo electronico: </h3></td>
                    <td style="width: 50%;"><input type="text" placeholder="Correo electronico" name="usuario" required></td>
                </tr>
                <tr>
                <td style="width: 50%;"><h3>Contraseña: </h3></td>  
                    <td style="width: 50%;"><input type="password" placeholder="Contraseña" name="clave" required></td> 
                </tr>
                <tr>
                    <td style="width: 50%;"><h3>Nombre: </h3></td>
                    <td style="width: 50%;"><input type="text" placeholder="Nombre de usuario" autofocus="1" name="nombre" required></td> 
                </tr>
                <tr>
                <td colspan="2"><center><button style="width: 60%; border-radius: 1rem;" class="formulario__submit" type="submit" >Crear cuenta</button></center></td>
                </tr>
            </form>
        </table>
        </div>
        <main>
		<form action="" class="formulario" id="formulario">
			<!-- Grupo: Nombre -->
			<div class="formulario__grupo" id="grupo__nombre">
				<label for="nombre" class="formulario__label">Nombre</label>
				<div class="formulario__grupo-input">
					<input type="text" class="formulario__input" name="nombre" id="nombre" placeholder="John Doe">
					<i class="formulario__validacion-estado fas fa-times-circle"></i>
				</div>
				<p class="formulario__input-error">El usuario tiene que ser de 4 a 16 dígitos y solo puede contener numeros, letras y guion bajo.</p>
			</div>


			<!-- Grupo: Correo Electronico -->
			<div class="formulario__grupo" id="grupo__correo">
				<label for="correo" class="formulario__label">Correo Electrónico</label>
				<div class="formulario__grupo-input">
					<input type="email" class="formulario__input" name="correo" id="correo" placeholder="correo@correo.com">
					<i class="formulario__validacion-estado fas fa-times-circle"></i>
				</div>
				<p class="formulario__input-error">El correo solo puede contener letras, numeros, puntos, guiones y guion bajo.</p>
			</div>

			<!-- Grupo: Teléfono -->
			<div class="formulario__grupo" id="grupo__telefono">
				<label for="telefono" class="formulario__label">Teléfono</label>
				<div class="formulario__grupo-input">
					<input type="text" class="formulario__input" name="telefono" id="telefono" placeholder="4491234567">
					<i class="formulario__validacion-estado fas fa-times-circle"></i>
				</div>
				<p class="formulario__input-error">El telefono solo puede contener numeros y el maximo son 14 dígitos.</p>
			</div>

			<div class="formulario__mensaje" id="formulario__mensaje">
				<p><i class="fas fa-exclamation-triangle"></i> <b>Error:</b> Por favor rellena el formulario correctamente. </p>
			</div>

			<div class="formulario__grupo formulario__grupo-btn-enviar">
				<button type="submit" class="formulario__btn">Enviar</button>
				<p class="formulario__mensaje-exito" id="formulario__mensaje-exito">Formulario enviado exitosamente!</p>
			</div>
		</form>
	</main>

	<script src="js/formulario.js"></script>

<?Php 
include '../templates/pie.php';
?>