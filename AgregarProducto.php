<?php 
include 'templates/cabeceraPrincipal.php';
include 'global/config.php';
include 'global/conexion.php';
?>

<h1>Agregar producto</h1>
        <div class="grid"> 
        <center></center><table style="border-collapse: collapse;  border-spacing: 20px 10px;"  border="5"  bordercolor="#1FC52E">
            <form method="post" action="logica/agregar.php">
                <tr>
                    <td><h3>ID: </h3></td>
                    <td><input type="text" placeholder="ID Producto" name="ID" style="width: 100%;" required></td>
                </tr>
                <tr>
                    <td><h3>Nombre: </h3></td>
                    <td><input type="text" placeholder="Nombre producto" name="nombre" style="width: 100%;" required></td>
                </tr>
                <tr>
                    <td><h3>Descripción: </h3></td>
                    <td><textarea placeholder="Descripción producto" name="descripcion" cols="50" rows="5" style="width: 100%;" required> </textarea></td>
                </tr>
                <tr>
                    <td><h3>Precio: </h3></td>
                    <td><input type="text" placeholder="Precio producto" name="precio" style="width: 100%;" required></td>
                    <input type="hidden" placeholder="Descripción producto" name="cantidad" value="1">
                </tr>
                <tr>
                    <td><h3>Imagen: </h3></td>
                    <td><input type="text" placeholder="imagen producto" name="imagen" style="width: 100%;" required></td>
                </tr>
                <tr>
                    <td><h3>Cantidad: </h3></td>
                    <td><input type="text" placeholder="Cantidad producto" name="disponible" style="width: 100%;" required></td>
                </tr>
                <tr>
                <td colspan="2"><center><button style="width: 60%; border-radius: 1rem;" class="formulario__submit" type="submit" >Agregar</button></center></td>
                </tr>
            </form>
        </table>
        </div>

<?Php 
include 'templates/pie.php';
?>