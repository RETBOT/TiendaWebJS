<?php 
include '../global/config.php';
include '../global/conexion.php'; 
include '../templates/session.php';
?>

<?php 
if($_POST){
    $IDVENTA = $_POST['IDVENTA'];
    $IDPRODUCTO = $_POST['IDPRODUCTO'];
    $CANTIDAD = $_POST['CANTIDAD'];

    $sentencia=$pdo->prepare("SELECT * FROM `tbldetalleventa`
                            WHERE IDVENTA=:IDVENTA
                            AND IDPRODUCTO=:IDPRODUCTO
                            AND DESCARGADO<$CANTIDAD");

    $sentencia->bindParam(":IDVENTA",$IDVENTA);
    $sentencia->bindParam(":IDPRODUCTO",$IDPRODUCTO);
    $sentencia->execute();

    $listaProductos=$sentencia->fetchAll(PDO::FETCH_ASSOC);

    if($sentencia->rowCount()>0){
        echo "Archivo en descarga...";

        $nombreArchivo="../archivos/".$listaProductos[0]['IDPRODUCTO'].".pdf";
        $nuevoNombreArchivo=$_POST['IDVENTA'].$_POST['IDPRODUCTO'].".pdf";

        header("Content-Transfer-Encoding: binary");
        header("Content-type: application/force-download");
        header("Content-Disposition: attachment; filename=$nuevoNombreArchivo");
        readfile("$nombreArchivo");
       // aumentan las descargas 
        $sentencia=$pdo->prepare("UPDATE `tbldetalleventa`
                            SET DESCARGADO=DESCARGADO+1
                            WHERE IDVENTA=:IDVENTA 
                            AND IDPRODUCTO=:IDPRODUCTO");
        
        $sentencia->bindParam(":IDVENTA",$IDVENTA);
        $sentencia->bindParam(":IDPRODUCTO",$IDPRODUCTO);
        $sentencia->execute();
        
        // disminuye la cantidad disponible del producto 
        $sentencia=$pdo->prepare("UPDATE `tblproductos`
                            SET Disponible=Disponible-1
                            WHERE ID=:ID");
        
        $sentencia->bindParam(":ID",$IDPRODUCTO);
        $sentencia->execute();


    }else{
        echo "<head>";
        echo "<Title>Descargas agotadas</Title>";
        echo "<link rel=stylesheet href=../css/normalize.css>";
        echo "<link href=https://fonts.googleapis.com/css2?family=Staatliches&display=swap rel=stylesheet>";
        echo "<link rel=stylesheet href=../css/style.css>";
        echo "</head>";

        echo "<h3>Tus descargas se agotaron.</h3>";
        echo "<center><h3><input type=button value=Regresar onClick=history.go(-1); style=background-color:#1FC52E;></h3></center>";
    }
}

?>