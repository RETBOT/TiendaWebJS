
<?php
include '../templates/includes.php';
?>

<?php
          $IDJuego = $_POST['IDJuego'];
          $sentencia=$pdo->prepare("Select * from tblproductos where ID=:ID");
          $sentencia->bindParam(":ID", $IDJuego);
          $sentencia->execute();
          $listProductos=$sentencia->fetchAll(PDO::FETCH_ASSOC);
?>

    <main class="contenedor">
        <h1><?php echo $listProductos[0]['Nombre'] ?></h1>
        <div class="juego">
            <img class="juego__imagen" src="<?php echo "../img/".$listProductos[0]['Imagen'] ?>" alt="Imagen del Producto">
            <div class="juego__contenido">
                <p><?php echo $listProductos[0]['Descripcion'] ?></p>
                    <form method="post" class="formulario" action="../index.php">
                        <input type="hidden" id="ID" name="ID" value="<?php echo $listProductos[0]['ID'] ?>">
                        <input type="hidden" id="Juego" name="Juego" value="<?php echo $listProductos[0]['Nombre'] ?>">
                        <p class="producto__precio">Cantidad</p>
                        <input type="number" id="Cantidad" name="Cantidad" class="formulario__campo"  placeholder="Cantidad" value="1" min="1" max="<?php echo $listProductos[0]['Disponible'] ?>">  
                        <input type="hidden" id="Precio" name="Precio" value="<?php echo $listProductos[0]['Precio']?>">
                        <p class="producto__precio">Precio $<?php echo $listProductos[0]['Precio']?></p>
                        <p class="producto__precio">Disponibles: <?php echo $listProductos[0]['Disponible'] ?> Unidades</p>
                        <input type="hidden" id="Imagen" name="Imagen" value="<?php echo "../img/".$listProductos[0]['Imagen'] ?>">
                        <button class="formulario__submit" type="submit" value="Agregar" name="btnAccion" >Agregar al carrito</button>
                    </form>
            </div>
        </div>
    </main>

<?Php 
include '../templates/pie.php';
?>
</body>
</html>
