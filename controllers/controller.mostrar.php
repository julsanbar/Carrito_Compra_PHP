<?php

    //Controlador dedicado a la visualización de los productos.

    //Indicamos que vamos a iniciar una nueva sesión o restaurarla,
    //en el caso de que ya existiera una.
    session_start();

    //Incluimos todas las funciones necesarias.
    require "../models/funciones.php";
    
    //Declaramos una variable para poder controlar si tenemos productos almacenados o no.
    //En el caso de no tenerlos se mostrará por pantalla un mensaje al usuario.
    $vacio = '';

    if(!isset($_SESSION['productos']) || sizeof($_SESSION['productos']) == 0){
        
        $vacio = 'true';

    }
    
    //Incluimos la vista insertar.php, da tal forma que si no fuera incluida
    //no se podría realizar ninguna funcionalidad.
    require_once "../views/mostrar.php";

?>