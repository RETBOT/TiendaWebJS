<?php 
include 'templates/cabeceraPrincipal.php';
include 'global/config.php';
include 'global/conexion.php';
?>

    <h1>Inicio de sesión</h1>
        <div class="grid"> 
        <center></center><table style="border-collapse: collapse;  border-spacing: 10px 5px;"  border="5"  bordercolor="#1FC52E">
            <form action="logica/loguear.php" method="post">
                <tr>
                    <td style="width: 50%;"><h3>Corrreo electronico: </h3></td>
                    <td style="width: 50%;"><input type="text" placeholder="Correo electronico" autofocus="1" name="usuario" required></td>
                </tr>
                <tr>
                    <td style="width: 50%;"><h3>Contraseña: </h3></td>  
                    <td style="width: 50%;"><input type="password" placeholder="Contraseña" name="clave" required></td>  
                </tr>
                <tr>
                    <td colspan="2" ><center><button style="width: 80%; border-radius: 1rem;" class="formulario__submit" type="submit" name="btnAccion" value="usuario">Iniciar sesión</button></center></td>
                </tr>
            </form>
            <form action="logica/crearcuenta.php" method="post">
                <tr>
                    <td colspan="2"><center><button style="width: 60%; border-radius: 1rem;" class="formulario__submit" type="submit" >Crear cuenta</button></center></td>
                </tr>
            </from>
        </table>
        </div>
<?Php 
include 'templates/pie.php';
?>