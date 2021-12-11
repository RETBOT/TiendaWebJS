<?php 
include 'templates/cabeceraPrincipal.php';
include 'global/config.php';
include 'global/conexion.php';
?>
<?php
$sentencia=$pdo->prepare("Select * from tblproductos");
$sentencia->execute();
$listProductos=$sentencia->fetchAll(PDO::FETCH_ASSOC);
//print_r($listProductos);
?>
    <main class="contenedor">
        <h1>Nuestros Productos</h1>
        <div class="grid">
        <?php foreach ($listProductos as $producto) { ?>
        <div class="producto">
            <form action="prod/Producto.php" method="post">
                    <img class="producto__imagen" src="img/<?php echo $producto['ID'] ?>.jpg" alt="imagen juego">
                    <div class="producto__informacion">
                        <p class="producto__nombre"><?php echo $producto['Nombre'] ?></p>
                        <p class="producto__precio">$<?php echo $producto['Precio'] ?></p> 
                    </div>
                    <input type="hidden" id="IDJuego" name="IDJuego" value="<?php echo $producto['ID'] ?>">
                    <button style="width: 100%;" class="formulario__submit" type="submit" value="Comprar" name="btnComprar" >Comprar</button>
                </form> 
        </div>  <!--.producto-->
        <?php } ?>
            <div class="grafico grafico--xbox"></div>
            <div class="grafico grafico--ps4"></div>
        </div>
    </main>
<?Php 
include 'templates/pie.php';
?>
    
</body>
</html>
