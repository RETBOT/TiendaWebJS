<?php include '../templates/cabeceraCarrito.php' ?>

<?php

$ClientID = "ARjVoR8AmUgBWm8SVd5ubT1D_zDVuSsGxeW75ubZshukB-vy3kUaJ4fG-zLvxC2Tl4soB17cUui6bPDq";
$Secret = "EJYECmELD1UWf41IOELzQltV_PKujJ_B9SzFLuVU3JlSIwjdk_Zihz89E1u0N_b8laC-a15DlLMMY0yi";

$Login = curl_init("https://api-m.sandbox.paypal.com/v1/oauth2/token");
curl_setopt($Login, CURLOPT_RETURNTRANSFER, TRUE);
curl_setopt($Login, CURLOPT_USERPWD, $ClientID . ":" . $Secret);
curl_setopt($Login, CURLOPT_POSTFIELDS, "grant_type=client_credentials");
$Respuesta = curl_exec($Login);
$objRespuesta = json_decode($Respuesta);
$AccessToken = $objRespuesta->access_token;

//print_r($AccessToken);

$orderData = $_GET['orderData'];
$objDatosTransaccion = json_decode($orderData);
//print_r($objDatosTransaccion);

$state = $objDatosTransaccion->status;
$email = $objDatosTransaccion->payer->email_address;

$total = $objDatosTransaccion->purchase_units[0]->amount->value;
$currency = $objDatosTransaccion->purchase_units[0]->amount->currency_code;
$SID = $_GET['SID'];
$IDVenta = $_GET['ID'];
$Cantidad = $_GET['Cantidad'];

curl_close($Login);
if ($state == "COMPLETED") {
    $mensajePaypal = "<center><h3>Pago aprovado</h3></center>";

    $sentencia = $pdo->prepare("UPDATE `tblventas`
     SET `PaypalDatos` = :PaypalDatos, 
     `status` = 'aprovado' 
     WHERE `tblventas`.`ID` = :ID;");
    $sentencia->bindParam(":ID", $IDVenta);
    $sentencia->bindParam(":PaypalDatos", $orderData);
    $sentencia->execute();

    $sentencia = $pdo->prepare("UPDATE `tblventas` SET status='completo'  
     WHERE ClaveTransaccion = :ClaveTransaccion
     AND Total = :Total
     AND ID = :ID");
    $sentencia->bindParam(":ClaveTransaccion", $SID);
    $sentencia->bindParam(":Total", $total);
    $sentencia->bindParam(":ID", $IDVenta);
    $sentencia->execute();
    $completado = $sentencia->rowCount();
} else {
    $mensajePaypal = "<center><h3>Hay un problema con el pago</h3></center>";
}
?>



<div>
    <div>
        <meta http-equiv="refresh" content="10" />
        <h1>¡Listo!</h1>
        <hr>
        <p><?php echo $mensajePaypal ?></p>
        <p> <?php
            if ($completado >= 1) {
                $sentencia = $pdo->prepare("SELECT * FROM tbldetalleventa, tblproductos WHERE tbldetalleventa.IDPRODUCTO=tblproductos.ID and 
                tbldetalleventa.IDVENTA=:ID");
                $sentencia->bindParam(":ID", $IDVenta);
                $sentencia->execute();

                $listaProductos = $sentencia->fetchAll(PDO::FETCH_ASSOC);
                //print_r($listaProductos);
            }
            ?>
        <h3>
            <center>
                <table style=" text-align: center; border-collapse: collapse; height: 50%; width: 50%;" border="5" bordercolor="#1FC52E">
                    <tr>
                        <th width="20%">Imagen</th>
                        <th width="30%">Juego</th>
                        <th width="30%">Cantidad</th>
                        <th width="5%">Descargar</th>
                    </tr>
                    <?php foreach ($_SESSION['CARRITO'] as $indice => $producto) { ?>
                        <tr>
                            <td width="25%"><img class="producto__imagen" src="<?php echo $producto['Imagen'] ?>" alt="imagen juego"></td>
                            <td width="30%"><?php echo $producto['Juego'] ?></td>
                            <td width="30%"><?php echo $producto['Cantidad'] ?></td>
                            <td width="5%">
                                <?php if ($listaProductos[$indice]['DESCARGADO'] < $producto['Cantidad']) { ?>
                                    <form action="descargas.php" method="POST">
                                        <input type="hidden" name="IDVENTA" value="<?php echo $IDVenta ?>">
                                        <input type="hidden" name="IDPRODUCTO" value="<?php echo $producto['ID'] ?>">
                                        <input type="hidden" name="CANTIDAD" value="<?php echo $producto['Cantidad'] ?>">
                                        <button style="background-color:#1FC52E;" type="submit">Descagrar</button>
                                    </form>
                                <?php } else { ?>
                                    <button style="background-color:#1FC52E;" type="button" disabled>Descagrar</button>
                                <?php } ?>
                            </td>
                        </tr>
                    <?php } ?>
                    <tr>
                        <td colspan="5">
                            <form action="Recibo.php" method="POST">
                                <input type="hidden" name="IDVENTA" value="<?php echo $IDVenta ?>">
                                <button style="background-color:#1FC52E;" type="submit">Recibo de compra</button>
                            </form>
                        </td>
                    </tr>
                </table>
            </center>
        </h3>


        </p>
    </div>
</div>


<?Php
include '../templates/pie.php';
?>