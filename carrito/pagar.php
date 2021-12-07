<?php include '../templates/cabeceraCarrito.php' ?>

<?php

if ($_POST) {
    $total = 0;
    $SID = session_id();
    $Correo = $_POST['email'];
    foreach ($_SESSION['CARRITO'] as $indice => $producto) {
        $total = $total + ($producto['Precio'] * $producto['Cantidad']);
    }
}
$idUsuario = 0;

if(isset($_SESSION['usuario'])){
$sentenciaUsuario = $pdo->prepare("SELECT IDCliente FROM `tblusuarios` WHERE usuario=:Usuario");
$sentenciaUsuario->bindParam(":Usuario",$_SESSION['usuario']);
$sentenciaUsuario->execute();

$identificador=$sentenciaUsuario->fetchAll(PDO::FETCH_ASSOC);
$idUsuario = $identificador[0]['IDCliente'];
}

$sentencia = $pdo->prepare("INSERT INTO `tblventas` 
                            (`ID`,`IDCliente`, `ClaveTransaccion`, `PaypalDatos`, `Fecha`, `Correo`, `Total`, `status`) 
                            VALUES (NULL, :IDCliente, :ClaveTransaccion, '', NOW(), :Correo, :Total, 'pendiente');");
$sentencia->bindParam(":IDCliente", $idUsuario);
$sentencia->bindParam(":ClaveTransaccion", $SID);
$sentencia->bindParam(":Correo", $Correo);
$sentencia->bindParam(":Total", $total);
$sentencia->execute();
$idVenta = $pdo->lastInsertId();
$idUsuario = 0;

if(isset($_SESSION['usuario'])){
$sentenciaUsuario = $pdo->prepare("SELECT IDCliente FROM `tblusuarios` WHERE usuario=:Usuario");
$sentenciaUsuario->bindParam(":Usuario",$_SESSION['usuario']);
$sentenciaUsuario->execute();

$identificador=$sentenciaUsuario->fetchAll(PDO::FETCH_ASSOC);
$idUsuario = $identificador[0]['IDCliente'];
}

foreach ($_SESSION['CARRITO'] as $indice => $producto) {
    $sentencia = $pdo->prepare("INSERT INTO 
        `tbldetalleventa` (`ID`, `IDVENTA`, `IDPRODUCTO`,`IDCliente`,`PRECIOUNITARIO`, `CANTIDAD`, `DESCARGADO`) 
        VALUES (NULL, :IDVENTA, :IDPRODUCTO, :IDUSUARIO, :PRECIOUNITARIO, :CANTIDAD, '0');");

    $sentencia->bindParam(":IDVENTA", $idVenta);
    $sentencia->bindParam(":IDPRODUCTO", $producto['ID']);
    $sentencia->bindParam(":IDUSUARIO",$idUsuario);
    $sentencia->bindParam(":PRECIOUNITARIO", $producto['Precio']);
    $sentencia->bindParam(":CANTIDAD", $producto['Cantidad']);
    $sentencia->execute();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Add meta tags for mobile and IE -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title> PayPal Checkout Integration | Client Demo </title>
</head>

<body>
    
    <!-- Include the PayPal JavaScript SDK -->
    <script src="https://www.paypal.com/sdk/js?client-id=test&currency=MXN"></script>

    <main class="contenedor">
        <h1>¡Paso Final!</h1>
        <div class="producto">
            <h3>Estas a punto de pagar con paypal la cantidad de: </h3>
            <h4><?php echo "<h3>$" . number_format($total, 2) . "</h3>"; ?></h4>
            <h3>Los productos podrán ser descargados una vez que se procese el pago</h3>
            <!-- Set up a container element for the button -->
            <center><div id="paypal-button-container"></div></center>
            <h3>(Para mas aclaraciones: gamesstorevideo@gmail.com )</h3>
            </html>
        </div>
    </main>

    <script>
        // Render the PayPal button into #paypal-button-container
        paypal.Buttons({

            // Set up the transaction
            createOrder: function(data, actions) {
                return actions.order.create({
                    purchase_units: [{
                        amount: {
                            value: '<?php echo $total ?>'
                        }
                    }]
                });
            },

            // Finalize the transaction
            onApprove: function(data, actions) {
                return actions.order.capture().then(function(orderData) {
                    // Successful capture! For demo purposes:
                    console.log('Capture result', orderData, JSON.stringify(orderData, null, 2));
                    var transaction = orderData.purchase_units[0].payments.captures[0];
                    //alert('Transaction '+ transaction.status + ': ' + transaction.id);
                    window.location="verificador.php?paymentToken="+transaction.id+"&orderData="+JSON.stringify(orderData,null,2)+"&SID=<?php echo $SID ?>"+"&ID=<?php echo $idVenta ?>"+"&Cantidad=<?Php $producto['Cantidad']?>";
                    // Replace the above to show a success message within this page, e.g.
                     //const element = document.getElementById('paypal-button-container');
                      //element.innerHTML = '';
                    //element.innerHTML = '<h3>¡Gracas por tu compra!</h3>';
                    // Or go to another URL:  actions.redirect('thank_you.html');
                });
            }


        }).render('#paypal-button-container');
    </script>
</body>

</html>
 
  
    <?Php
    include '../templates/pie.php';
    ?>