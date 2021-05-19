<?php

    session_start();

    require "../models/funciones.php";

    $vacio = '';
    $errores = '';
    $producSelec = null;
    $nombre = null;
    $cantidad = null;
    $precio = null;

    if(!isset($_SESSION['productos']) || sizeof($_SESSION['productos']) == 0){
        
        $vacio = 'true';

    }

    if(isset($_POST['si'])){

        $productosAl = $_SESSION['productos'];

        $producSelec = $_POST['producto'];
        $nombre = $_POST['Nombre'];
        $cantidad = $_POST['Cantidad'];
        $precio = $_POST['Precio'];

        $indice = (int) $producSelec;
        $cantidadNum = (int) $cantidad;
        $precioNum = (float) $precio;
        
        $errores = validaFormulario($errores,$nombre,$cantidad,$precio);

        if((strcmp($nombre,$productosAl[$indice]['Nombre']) == 0) && ($cantidadNum == $productosAl[$indice]['Cantidad']) && ($precioNum == $productosAl[$indice]['Precio'])){

            $errores .= 'Por favor no introduzca los mismos datos en todas las casillas para actualizar.<br>';   

        }

        if(!$errores){
        
            $productosAl[$indice]['Nombre'] = $nombre;
            $productosAl[$indice]['Cantidad'] = $cantidadNum;
            $productosAl[$indice]['Precio'] = $precioNum;

            $_SESSION['productos'] = $productosAl; 

        }
        
    }

    require_once "../views/modificar.php";

?>