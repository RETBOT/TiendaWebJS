<?php 
include 'templates/cabeceraPrincipal.php';
include 'global/config.php';
include 'global/conexion.php';
?>

<h1>Eliminar producto</h1>
        <div class="grid"> 
        <center></center><table style="border-collapse: collapse;  border-spacing: 10px 5px;"  border="5"  bordercolor="#1FC52E">
            <form method="post" action="logica/eliminar.php">
                <tr>
                <td style="width: 50%;"><h3>ID Producto: </h3></td>
                    <td style="width: 50%;"><input type="text" placeholder="ID Producto" name="ID" required></td>
                </tr>
                <tr>
                <td colspan="2"><center><button style="width: 60%; border-radius: 1rem;" class="formulario__submit" type="submit" >Eliminar</button></center></td>
                </tr>
            </form>
        </table>
        </div>

<?Php 
include 'templates/pie.php';
?>