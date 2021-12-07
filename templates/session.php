<?php
session_start();
$mensaje = ""; 

if(isset($_POST['btnAccion'])){
    switch($_POST['btnAccion']){
        case 'Agregar': 
            if(is_numeric($_POST['ID'])){
                $ID = $_POST['ID'];
                $mensaje.= "ok, id correcto".$ID;
            }else{
                $mensaje.= "Upss.., id no correcto ".$ID; 
            }
            if(is_string($_POST['Juego'])){
                $Juego = $_POST['Juego'];
                $mensaje.= "ok, Juego correcto".$Juego;
            }else{
                $mensaje.= "Upss.., Juego no correcto ".$Juego; 
            }
            if(is_numeric($_POST['Cantidad'])){
                $Cantidad = $_POST['Cantidad'];
                $mensaje.="ok, Cantidad correcto".$Cantidad;
            }else{
                $mensaje.= "Upss.., Cantidad no correcto ".$Cantidad; 
            }
            if(is_numeric($_POST['Precio'])){
                $Precio = $_POST['Precio'];
                $mensaje.= "ok, Precio correcto".$Precio;
            }else{
                $mensaje.="Upss.., Precio no correcto ".$Precio; 
            }
            if(is_string($_POST['Imagen'])){
                $Imagen = $_POST['Imagen'];
                $mensaje.= "ok, Imagen correcto".$Imagen;
            }else{
                $mensaje.="Upss.., Imagen no correcto ".$Imagen; 
            }
            
            if(!isset($_SESSION['CARRITO'])){
                $producto = array(
                    'ID' => $ID,
                    'Juego' => $Juego,
                    'Cantidad' => $Cantidad,
                    'Precio' => $Precio,
                    'Imagen' => $Imagen
                );
                $_SESSION['CARRITO'][0]=$producto;
                $mensaje = "Producto agregado al carrito..";
            }else{
                $idProductos=array_column($_SESSION['CARRITO'],"ID");
                if(in_array($ID,$idProductos)){
                    echo "<script>alert('El producto ya ha sido seleccionado..');</script>";
                }else{
                $NumeroProductos=count($_SESSION['CARRITO']);
                $producto = array(
                    'ID' => $ID,
                    'Juego' => $Juego,
                    'Cantidad' => $Cantidad,
                    'Precio' => $Precio,
                    'Imagen' => $Imagen
                );
                $_SESSION['CARRITO'][$NumeroProductos]=$producto;
                echo "<script>alert('Producto agregado al carrito..');</script>";
                //$mensaje = print_r($_SESSION,true);
                }
            }
        break;
        case "Eliminar":
            if(is_numeric($_POST['ID'])){
                $ID = $_POST['ID'];
                foreach($_SESSION['CARRITO'] as $indice=>$producto){
                    if($producto['ID']==$ID){
                        unset($_SESSION['CARRITO'][$indice]);
                    }
                        
                }
            }else{
                $mensaje.= "Upss.., id no correcto ".$ID; 
            }
            break;

        case "usuario":{
          $usuario = $_POST['usuario'];
          $contraseña = $_POST['clave'];
            if(!isset($_SESSION['usuario'])){
                $login = array(
                    'Correo' => $usuario,
                    'Contraseña' => $contraseña
                );
                $_SESSION['usuario']=$login;
            }
        }break;
        }
    }
?>