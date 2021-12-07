<?php include '../templates/cabeceraCarrito.php'?>

    <main class="contenedor">
        <h1>Productos</h1>
       
        <center></center>
        <h3>
        <div class="producto">
        <?php if(!empty( $_SESSION['CARRITO'])) { ?>
        <table style="border-collapse: collapse; height: 100%; width: 100%;"  border="5"  bordercolor="#1FC52E">
                    <tr>
                        <th width="25%">Imagen</th>
                        <th width="30%">Juego</th>
                        <th width="15%">Cantidad</th>
                        <th width="20%">Precio</th>
                        <th width="20%">Total</th>
                        <th width="5%">--</th>
                    </tr>
                    <?php foreach($_SESSION['CARRITO'] as $indice=>$producto){ ?>
                    <tr>
                        <td width="25%"><img class="producto__imagen" src="<?php echo $producto['Imagen'] ?>" alt="imagen juego"></td>
                        <td width="30%"><?php echo $producto['Juego'] ?></td>
                        <td width="15%"><?php echo $producto['Cantidad'] ?></td>
                        <td width="20%"><?php echo '$'.$producto['Precio'] ?></td>
                        <td width="20%"><?php echo '$'.number_format($producto['Precio']*$producto['Cantidad'],2) ?></td>
                        <td width="5%">
                            <form action="" method="post">
                                <input type="hidden" name="ID" value="<?Php echo $producto['ID'];?>">
                                <button style="background-color:#1FC52E;" type="submit" class="btn btn-danger" name="btnAccion" value="Eliminar">Eliminar</button>
                            </form>
                        </td>
                        
                    </tr>
                        <?php $total = $total+($producto['Precio']*$producto['Cantidad']); ?>
                    <?php } ?>
                    <tr>
                        <td colspan="4" align="right">Total</td>
                        <td align="right"><?php echo '$'.number_format($total,2);?></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td colspan="5">
                            <form action="pagar.php" method="post">
                            <div>
                                <label for="my-input">Correo de contacto:</label>
                                <input required id="email" name="email" type="email" pattern="/^[A-z0-9\\._-]+@[A-z0-9][A-z0-9-]*(\\.[A-z0-9_-]+)*\\.([A-z]{2,6})$/" placeholder="Por favor escribe tú correo" style="width: 30%;">
                                <small id="emailHelp" class="form-text text-muted">
                                        <br>Los productos se enviarán a este correo.
                                </small>
                            </div>
                                <button type="submit" class="btn btn-default" style="background-color:#1FC52E;" name="btnAccion">
                                Proceder a pagar >>
                               </button>
                            </form>
                        </td>

                    </tr>
            </table></h3>
            <?php } else { ?>
                <div class="alert alert-succes">
                    <h3>No hay productos en el carrito..</h3>
                </div>
            <?php } ?>
        </div>
        
    </main>

<?Php 
include '../templates/pie.php';
?>
    
</body>
</html>
