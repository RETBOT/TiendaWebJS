<?php include '../templates/cabeceraCarrito.php' ?>
<?php
$ID = $_POST['ID'];
    $sentencia=$pdo->prepare("SELECT * FROM `tblproductos` WHERE `tblproductos`.`ID` = :ID");

    $sentencia->bindParam(":ID",$ID);
    $sentencia->execute();
    $producto=$sentencia->fetchAll(PDO::FETCH_ASSOC);

    if(!empty($producto)){
    $ID = $producto[0]['ID'];
    $Nombre = $producto[0]['Nombre'];
    $Descripcion = $producto[0]['Descripcion'];
    $Precio = $producto[0]['Precio'];
    $Cantidad = 1;
    $Imagen = $producto[0]['Imagen'];
    $Disponible = $producto[0]['Disponible'];
    ?>
 <h1>Producto</h1>
        <div class="grid"> 
        <center></center><table style="border-collapse: collapse;  border-spacing: 10px 5px;"  border="5"  bordercolor="#1FC52E">
            <form method="post">
                <tr>
                    <td style="width: 50%;"><h3>ID: </h3></td>
                    <td style="width: 50%;"><input type="text" placeholder="ID Producto" autofocus="1" name="ID" value="<?php echo $ID ?>" required></td>
                </tr>
                <tr>
                    <td style="width: 50%;"><h3>Nombre: </h3></td>
                    <td style="width: 50%;"><input type="text" placeholder="ID Producto" name="Nombre" value="<?php echo $Nombre ?>" required></td>
                </tr>
                <tr>
                    <td style="width: 50%;"><h3>Descripcion: </h3></td>
                    <td><textarea placeholder="Descripción producto" name="Descripcion" cols="50" rows="5" style="width: 100%;" required><?php echo $Descripcion ?></textarea></td>
                </tr>
                <tr>
                    <td style="width: 50%;"><h3>Precio: </h3></td>
                    <td style="width: 50%;"><input type="text" placeholder="ID Producto" name="Precio" value="<?php echo $Precio ?>" required></td>
                    <input type="hidden" name="Cantidad" value="1">
                </tr>
                <tr>
                    <td style="width: 50%;"><h3>Imagen: </h3></td>
                    <td style="width: 50%;"><input type="text" placeholder="ID Producto" name="Imagen" value="<?php echo $Imagen ?>" required></td>
                </tr>
                <tr>
                    <td style="width: 50%;"><h3>Disponible: </h3></td>
                    <td style="width: 50%;"><input type="text" placeholder="ID Producto" name="Disponible" value="<?php echo $Disponible ?>" required></td>
                </tr>
                <tr>
                    <td colspan="2" ><center><button style="width: 80%; border-radius: 1rem;" class="formulario__submit" type="submit" name="btnAccion" value="usuario">Modificar</button></center></td>
                </tr>
            </form>
            <form action="../ModificarProducto.php" method="post">
                <tr>
                    <td colspan="2"><center><button style="width: 60%; border-radius: 1rem;" class="formulario__submit" type="submit" >Regresar</button></center></td>
                </tr>
            </from>
        </table>
        </div>


<?php 
}else{
    echo "<h1>El producto numero ".$ID." no ha sido encontrado</h1>";
    echo "<center><h3><input type=button value=Regresar onClick=history.go(-2); style=background-color:#1FC52E;></h3></center>";
}

    if(!empty($_POST['Nombre'])){
        echo "<h1>Producto modificado</h1>"; 
        echo "<script>alert('Producto Modificado');</script>";
        $IDMod = $_POST['ID'];
        $NombreMod = $_POST['Nombre'];
        $DescripcionMod = $_POST['Descripcion'];
        $PrecioMod = $_POST['Precio'];
        $CantidadMod = $_POST['Cantidad'];
        $ImagenMod = $_POST['Imagen'];
        $DisponibleMod = $_POST['Disponible'];
        try{
        $sentencia=$pdo->prepare("UPDATE `tblproductos` SET 
        `ID` = :ID, 
        `Nombre` = :Nombre, 
        `Descripcion` = :Descripcion, 
        `Precio` = :Precio, 
        `Imagen` = :Imagen, 
        `Disponible` = :Disponible 
        WHERE `tblproductos`.`ID` = :IDProd;");

        $sentencia->bindParam(":ID",$IDMod);
        $sentencia->bindParam(":Nombre",$NombreMod);
        $sentencia->bindParam(":Descripcion",$DescripcionMod);
        $sentencia->bindParam(":Precio",$PrecioMod);
        $sentencia->bindParam(":Imagen",$ImagenMod);
        $sentencia->bindParam(":Disponible",$DisponibleMod);
        $sentencia->bindParam(":IDProd",$ID);
        $sentencia->execute();
        $producto=$sentencia->fetchAll(PDO::FETCH_ASSOC);
        }catch( PDOException $Exception ) {
            echo "<h1>Error al ingresar los datos</h1>";
        }
    }else{
        echo "<h1>Producto no modificado</h1>";  
    } 
?>
<?Php 
include '../templates/pie.php';
?>