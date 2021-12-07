<?php include '../templates/cabeceraCarrito.php' ?>
<?php
session_destroy();
header("location: ../index.php");
exit();
?>
<?Php 
include '../templates/pie.php';
?>