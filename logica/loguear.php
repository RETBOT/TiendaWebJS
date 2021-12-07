<?php include '../templates/cabeceraCarrito.php' ?>

<?php
$usuario = $_POST['usuario'];
$clave = $_POST['clave'];

$sentencia=$pdo->prepare("SELECT COUNT(*) FROM tblusuarios where usuario=:Usuario AND clave=:Clave");

    $sentencia->bindParam(":Usuario",$usuario);
    $sentencia->bindParam(":Clave",$clave);
    $sentencia->execute();

    $existe=$sentencia->fetchAll(PDO::FETCH_ASSOC);
    printf($existe[0]['COUNT(*)']);

    if($existe[0]['COUNT(*)'] > 0){
        header("location: ../index.php");
    }
    else {
        echo "<h1>Datos incorrectos<h1>";
        echo "<center><h3><input type=button value=Regresar onClick=history.go(-1); style=background-color:#1FC52E;></h3></center>";
        session_destroy();
        echo "<script>alert('Contraseña incorrecta');</script>";
        header("location: ../index.php");
        exit();
    }
?>

<?Php 
include '../templates/pie.php';
?>

