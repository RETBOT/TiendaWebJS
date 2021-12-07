<?php include '../templates/cabeceraCarrito.php' ?>
<?php
$ID = $_POST['ID'];
try{
    $sentencia=$pdo->prepare("DELETE FROM `tblproductos` WHERE `tblproductos`.`ID` = :ID");

    $sentencia->bindParam(":ID",$ID);
    $sentencia->execute();
    $eliminado=$sentencia->fetchAll(PDO::FETCH_ASSOC);

    echo "<h1>El producto numero ".$ID." ha sido eliminado</h1>";
    echo "<center><h3><input type=button value=Regresar onClick=history.go(-1); style=background-color:#1FC52E;></h3></center>";
}catch( PDOException $Exception ) {
    echo "<h1>El producto numero ".$ID." no ha sido encontrado</h1>";
    echo "<center><h3><input type=button value=Regresar onClick=history.go(-1); style=background-color:#1FC52E;></h3></center>";
}
?>
<?Php 
include '../templates/pie.php';
?>