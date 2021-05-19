<?php

    //Controlador dedicado a la insercción del producto.

    //Indicamos que vamos a iniciar una nueva sesión o restaurarla,
    //en el caso de que ya existiera una.
    session_start();

    //Incluimos todas las funciones necesarias.
    require "../models/funciones.php";

    $introducido = '';
    $errores = '';
    $enviado = '';
    $nombre = null;
    $cantidad = null;
    $precio = null;

    if(isset($_POST['aceptar'])){

        $nombre = $_POST['nombre'];
        $cantidad = $_POST['cantidad'];
        $precio = $_POST['precio'];

        //Pasamos a validar el formuario haciendo uso de la función correspondiente.
        $errores = validaFormulario($errores,$nombre,$cantidad,$precio);
        
        //Verificamos si hay errores
        if(!$errores){
        
            $enviado='true';
            
            //Se realiza un array asociativo dentro de un indexado para poder aprovechar el indexado automático
            //y autoincrementado del array indexado. 
            $producto = array('Nombre' => $nombre,'Cantidad' => (int) $cantidad,'Precio' => (float) $precio);
            
            //Se procede a realizar la insercción del producto en la sesión.
            //NO SE CONTROLA QUE EL NOMBRE DEL PRODUCTO SEA ÚNICO EN LA COMPRA PUES UN NOMBRE PUEDE REFERIRSE A 
            //MULTITUD DE CARACTERÍSTICAS DE UN PRODUCTO. POR EJEMPLO: NOMBRE = ACEITE MARCA = COOSUR
            //LA MARCA SI PODRÍA SER UNA CLAVE ÚNICA VÁLIDA. SE TOMA LA ANTERIOR ESTRATEGIA PARA TODO EL EJERCICIO
            //DEBIDO A LAS POCAS ESPECIFICACIONES DEL ENUNCIADO SOBRE ESTE DETALLE.
            if(isset($_SESSION['productos'])){

                array_push($_SESSION['productos'],$producto);

                $introducido = "Producto ".$nombre." ha sido introducido con éxito.";

            }else{
                
                //En este punto no se controla que el usuario quisiera por voluntad propia ir a esta página directamente.
                //En tal caso se añadiria un null al array indexado y posiblemente saltaría un error offset.
                $_SESSION['productos'] = array();
                array_push($_SESSION['productos'],$producto);
                
                $introducido = "Producto ".$nombre." ha sido introducido con éxito.";

            }

        }
        
    }

    //Incluimos la vista insertar.php, da tal forma que si no fuera incluida
    //no se podría realizar ninguna funcionalidad.
    require_once "../views/insertar.php";
    
?>