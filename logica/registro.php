<?php include '../templates/cabeceraCarrito.php' ?>
<?php
$usuario = $_POST['usuario'];
$clave = $_POST['clave'];
$nombre = $_POST['nombre'];

$sentencia=$pdo->prepare("SELECT COUNT(*) FROM tblusuarios where usuario=:Usuario");

    $sentencia->bindParam(":Usuario",$usuario);
    $sentencia->execute();

    $existe=$sentencia->fetchAll(PDO::FETCH_ASSOC);

    if($existe[0]['COUNT(*)'] > 0){ // se verifica que el correo ingresado no este registado en la base de datos 
        echo "<h2>Correo electronico en uso</h2>";
        echo "<center><h3><input type=button value=Regresar onClick=history.go(-2); style=background-color:#1FC52E;></h3></center>";
    }else { // si no, se hace el registro
        $sentencia=$pdo->prepare("INSERT INTO `tblusuarios` (`IDCliente`, `Nombre`, `usuario`, `clave`) 
                                VALUES (NULL, :Nombre, :Usuario, :Clave)");
        $sentencia->bindParam(":Nombre",$nombre);
        $sentencia->bindParam(":Usuario",$usuario);
        $sentencia->bindParam(":Clave",$clave);
        $sentencia->execute();
        header("location: ../index.php");
    }
?>

<?Php 
include '../templates/pie.php';
?>