<?php include '../templates/cabeceraCarrito.php' ?>
<?php
$ID = $_POST['ID'];
$Nombre = $_POST['nombre'];
$Descripcion = $_POST['descripcion'];
$Precio = $_POST['precio'];
$Cantidad = $_POST['cantidad'];
$Imagen = $_POST['imagen'];
$Disponible = $_POST['disponible'];

try{
 $sentencia=$pdo->prepare("INSERT INTO `tblproductos` 
 (`ID`, `Nombre`, `Descripcion`, `Precio`, `Cantidad`, `Imagen`, `Disponible`) 
 VALUES (:ID, :Nombre, :Descripcion, :Precio, :Cantidad, :Imagen, :Disponible);");

    $sentencia->bindParam(":ID",$ID);
    $sentencia->bindParam(":Nombre",$Nombre);
    $sentencia->bindParam(":Descripcion",$Descripcion);
    $sentencia->bindParam(":Precio",$Precio);
    $sentencia->bindParam(":Cantidad",$Cantidad);
    $sentencia->bindParam(":Imagen",$Imagen);
    $sentencia->bindParam(":Disponible",$Disponible);
    $sentencia->execute();
    $eliminado=$sentencia->fetchAll(PDO::FETCH_ASSOC);

    echo "<h1>El producto numero ".$ID." ha sido agregado</h1>";
    echo "<center><h3><input type=button value=Regresar onClick=history.go(-1); style=background-color:#1FC52E;></h3></center>";
}catch( PDOException $Exception ) {
    echo "<h1>El producto numero ".$ID." ha sido registrado</h1>";
    echo "<center><h3><input type=button value=Regresar onClick=history.go(-1); style=background-color:#1FC52E;></h3></center>";
}
?>
<?Php 
include '../templates/pie.php';
?>