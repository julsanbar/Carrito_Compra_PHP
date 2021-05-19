<?php

    /**
     * En esta página residen todas aquellas funciones que otorgan funcionalidad a cada
     * una de nuestras páginas.
     */

    //Devuelve la lista de errores detectada, la cual sirve para controlar la insercción.
    function validaFormulario($errores,$nombre,$cantidad,$precio){
        
        $cantidadNum = (int) $cantidad;
        $precioNum = (float) $precio;
        
        //Verificamos si el nombre introducido por el usuario para el producto no tiene
        //carácteres especiales, ni algún otro similar para evitar ataques XSS por ejemplo.
        if(!empty($nombre)){
            $nombre = filter_var($nombre, FILTER_SANITIZE_STRING);
        }else{
            $errores .= 'Por favor introduzca nombre.<br>';
        }
        
        //Verificamos que la cantidad introducida por el usuario es un número, mayor que cero
        //y distinto a cero. Además de que el usuario a introducido un valor y no lo a dejado
        //sin rellenar dicho campo.
        if(!empty($cantidadNum)){
            $cantidadNum = filter_var($cantidadNum, FILTER_SANITIZE_NUMBER_INT);
            if(!filter_var($cantidadNum, FILTER_VALIDATE_INT)){
                $errores .= 'Debe introducir un número entero.<br>';
            }else{
                if($cantidadNum < 0){
                    $errores .= 'La cantidad no puede ser negativa.<br>';
                }
            }
        }else{
            $errores .= 'Por favor introduzca una cantidad.<br>';
        }
        
        //Verificamos que el producto es un número, distinto de cero y mayor que cero.
        //A diferencia de la cantidad aquí se verifica que dicho número es decimal, en este caso
        //se escogio como tipo de dato float por su logitud de decimales.
        if(!empty($precioNum)){
            $precioNum = filter_var($precioNum, FILTER_SANITIZE_NUMBER_FLOAT);
            if(!filter_var($precioNum, FILTER_VALIDATE_FLOAT)){
                $errores .= 'Debe introducir un número decimal.<br>';
            }else{
                if($precioNum < 0.0){
                    $errores .= 'El precio no puede ser menor que cero.<br>';
                }
            }
        }else{
            $errores .= 'Por favor introduzca un precio.<br>';
        }
    
        return $errores;

    }

    //Visualiza una tabla por pantalla con la información de los productos almacenados.
    function muestraProductos(){
        
        //No es necesario controlar que la sesion tenga productos almacenados, pues mediante la variable de
        //control vacio realizamos dicha operación.
        $listaProductos = $_SESSION['productos'];
        $precioTotalProd = 0;

        for($i=0;$i<sizeof($listaProductos);$i++){

            echo "<tr>";
            
            //Se procede a calcular tanto el precio total de cada producto.
            $precioTotalProd = $listaProductos[$i]['Cantidad'] * $listaProductos[$i]['Precio'];

            foreach($listaProductos[$i] as $informacion){

                echo "<td>".$informacion."</td>";

            }

            echo "<td>".$precioTotalProd."</td>";

            echo "</tr>";

        }

    }

    //Calcula el precio total de la compra.
    function precioTotal(){

        $listaProductos = $_SESSION['productos'];
        $precioTotalProd = 0;
        $precioTotal = 0;

        for($i=0;$i<sizeof($listaProductos);$i++){

            //Se procede a calcular tanto el precio total de cada producto.
            $precioTotalProd = $listaProductos[$i]['Cantidad'] * $listaProductos[$i]['Precio'];
            
            //Se procede a calcular el precio total de la compra.
            $precioTotal += $precioTotalProd;

        }

        return $precioTotal;

    }

    //Visualiza todos los productos almacenados junto con un boton para seleccionarlo
    function seleccionProducto(){

        $listaProductos = $_SESSION['productos'];
        $precioTotalProd = 0;

        for($i=0;$i<sizeof($listaProductos);$i++){

            echo "<tr>";
            
            //Se procede a calcular tanto el precio total de cada producto.
            $precioTotalProd = $listaProductos[$i]['Cantidad'] * $listaProductos[$i]['Precio'];

            foreach($listaProductos[$i] as $informacion){

                echo "<td>".$informacion."</td>";

            }

            echo "<td>".$precioTotalProd."</td>";
            echo "<td><button id=".$i.">X</button></td>";

            echo "</tr>";

        }

    }

    //Visualiza todos los productos almacenados para ser actualizados.
    function seleccionaActualiza(){

        $listaProductos = $_SESSION['productos'];

        for($i=0;$i<sizeof($listaProductos);$i++){

            echo "<tr>";

            foreach($listaProductos[$i] as $informacion){

                echo "<td><input type=\"text\" value=".$informacion." disabled=\"disabled\" ></td>";

            }

            echo "<td><button id=".$i.">X</button></td>";

            echo "</tr>";

        }

    }

?>