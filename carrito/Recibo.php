<?php
include '../global/config.php';
include '../global/conexion.php';
include '../templates/session.php';
require_once '../libreria/dompdf/autoload.inc.php';
?>
<?php
    
    $IDVENTA = $_POST['IDVENTA'];
    $PagoFinal = 0;
      // Informacion del usuario 
    $sentencia=$pdo->prepare("SELECT * FROM `tblventas` where ID=:ID");
    $sentencia->bindParam(":ID", $IDVENTA);
    $sentencia->execute();
    $listaVenta = $sentencia->fetchAll(PDO::FETCH_ASSOC);

    //print_r($listaVenta);

    $ID = $listaVenta[0]['ID'];
    $ClaveTransaccion = $listaVenta[0]['ClaveTransaccion'];
    $datosPayPal = $listaVenta[0]['PaypalDatos'];
    $objRespuesta = json_decode($datosPayPal);
    $state = $objRespuesta->status;
    $total = $objRespuesta->purchase_units[0]->amount->value;
    $currency = $objRespuesta->purchase_units[0]->amount->currency_code;
    $correo = $objRespuesta->payer->email_address;
    $nombre = $objRespuesta->payer->name->given_name;
    $apellido = $objRespuesta->payer->name->surname;

    // imagen de los productos
    $sentencia2=$pdo->prepare("SELECT * FROM `tbldetalleventa` where `IDVENTA` = :ID");
    $sentencia2->bindParam(":ID", $IDVENTA);
    $sentencia2->execute();
    $listaJuegos = $sentencia2->fetchAll(PDO::FETCH_ASSOC);
  ?>
    <html>
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Video Games Store</title>
            <link rel="stylesheet" href="../css/normalize.css">
            <link href="https://fonts.googleapis.com/css2?family=Staatliches&display=swap" rel="stylesheet">
            <link rel="stylesheet" href="../css/style.css">
        </head>
        <body>
            <h3 style="text-align: center;">Recibo de compra</h3>
            <h3 style="text-align: center;">Informacion de usuario</h3>
            <p>Nombre: <?php echo $nombre." ".$apellido ?></p>
            <p>Numero de compra: <?php echo $ID ?> </p>
            <p>Clave de transacción: <?php echo $ClaveTransaccion ?> </p>
            <p>Estado de transacción: <?php echo $state ?> </p>
            <p>Total de compra: <?php echo $total ?></p>
            <p>Divisa: <?php echo $currency ?> </p>
            <p>Correo electronico: <?php echo $correo ?></p>

            <h3 style="text-align: center;">Productos</h3>
    <center><?php if(!empty( $_SESSION['CARRITO'])) { ?>
    <div class="producto">
        <table style="border-collapse: collapse; text-align: center; width: 100%;"  border="5"  bordercolor="#1FC52E">
                    <tr>
                        <th width="10%">Imagen</th>
                        <th width="30%">Juego</th>
                        <th width="15%">Cantidad</th>
                        <th width="20%">Precio</th>
                        <th width="20%">Total</th>
                    </tr>
                    <?php foreach($_SESSION['CARRITO'] as $indice=>$producto){ ?>
                    <tr>
                        <td width="10%"><img width="100" height="150" class="producto__imagen" src="http://<?php echo $_SERVER['HTTP_HOST'].'/TiendaWebPhp/img/'.$listaJuegos[$indice]['IDPRODUCTO'].".jpg" ?>" alt="imagen juego"></td>
                        <td width="30%"><?php echo $producto['Juego'] ?></td>
                        <td width="15%"><?php echo $producto['Cantidad'] ?></td>
                        <td width="20%"><?php echo '$'.$producto['Precio'] ?></td>
                        <td width="20%"><?php echo '$'.number_format($producto['Precio']*$producto['Cantidad'],2) ?></td>  
                    </tr>
                    <?php $PagoFinal+=($producto['Precio']*$producto['Cantidad']);  ?>
                    <?php } ?>
                    <tr>
                        <td colspan="4" align="right">Total</td>
                        <td align="center"><?php echo '$'.number_format($total,2);?></td>
                    </tr>
            </table>
    </div>
            <?php }?></center>

        </body>
    </html>

  <?php
    //pdf 
    $html = ob_get_clean();

    use Dompdf\Dompdf;
    $dompdf = new Dompdf();

    $opcion = $dompdf->getOptions();
    $opcion->set(array('isRemoteEnabled' => true));
    $dompdf->setOptions($opcion);

    $dompdf->loadHtml($html);

    $dompdf->setPaper('letter');
    //$dompdf->setPaper('A4','landscope');
    $dompdf->render();
    $dompdf->stream("recibo.pdf",array("Attachment" => true));
?>