<?php include '../templates/cabeceraCarrito.php'?>

<?php
    $sentenciaUsuario = $pdo->prepare("SELECT IDCliente FROM `tblusuarios` WHERE usuario=:Usuario");
    $sentenciaUsuario->bindParam(":Usuario",$_SESSION['usuario']);
    $sentenciaUsuario->execute();
    $identificador=$sentenciaUsuario->fetchAll(PDO::FETCH_ASSOC);
    //print_r($identificador[0]['IDCliente']);
    $idCliente = $identificador[0]['IDCliente'];
    
    $sentenciaVenta = $pdo->prepare("SELECT IDPRODUCTO,IDVENTA FROM `tbldetalleventa` WHERE IDCliente=:IDCliente");
    $sentenciaVenta->bindParam(":IDCliente",$idCliente);
    $sentenciaVenta->execute();
    $venta=$sentenciaVenta->fetchAll(PDO::FETCH_ASSOC);

?>
<?php if(!empty($venta)) {?>
<h1>Productos comprados</h1>
<center><table style="border-collapse: collapse;  border-spacing: 20px 10px; width:80%;"  border="5"  bordercolor="#1FC52E">
    <tr>
        <th><h3>ID juego</h3></th>
        <th><h3>ID Venta</h3></th>
        <th><h3>Estado</h3></th>
    </tr>

<?php for($i=0;$i<sizeof($venta); $i++){ ?>
<tr>
    <td><h3><?php echo $venta[$i]['IDPRODUCTO']  ?></h3></td>
    <td><h3><?php echo $venta[$i]['IDVENTA']  ?></h3></td>
    <?php 
        $sentenciaEstado = $pdo->prepare("SELECT status FROM `tblventas` WHERE ID=:IDVENTA");
        $sentenciaEstado->bindParam(":IDVENTA",$venta[0]['IDVENTA']);
        $sentenciaEstado->execute();
        $status=$sentenciaEstado->fetchAll(PDO::FETCH_ASSOC);
        echo "<td><h3>".$status[0]["status"]."</h3></td>";
    ?>

    
</tr>
<?php }?>

</table></center>
<?php }else {?>
    <h1>Sin productos </h1>
<?php }?>    
<?Php 
include '../templates/pie.php';
?>
    
</body>
</html>