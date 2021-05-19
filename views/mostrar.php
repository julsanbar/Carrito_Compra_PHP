<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mostrar</title>
    
    <!-- Enlazamos nuestra hoja de estilo. -->
    <link rel="stylesheet" href="../views/resources/css/estiloMostrar.css">
    
    <!-- Enlazamos el nuevo icono de la pestaña. -->
    <link rel="shortcut icon" href="../views/resources/img/logo.jpg" type="image/x-icon">
</head>
<body>

    <header>
       
        <!-- Verificamos si la variable de control vacio es true, en cuyo caso le indicamos al usuario que 
            no hay productos almacenados en el carro de la compra. -->
        <?php  if(strcmp($vacio,'true') == 0): ?>
            <h2>Ups no encontré ningún producto en la lista</h2>
        <?php  endif;  ?>
        
        <?php  if(strcmp($vacio,'true') != 0): ?>
            <h2>Productos</h2>
        <?php  endif;  ?>
    </header>

    <section>
        
        <!-- Verificamos que la variable vacio no sea true, en cuyo caso se procede a visualizar la lista de compra. -->
        <?php if(strcmp($vacio,'true') != 0): ?>
            
            <table>
                
                <thead>

                    <tr>

                        <th>Nombre</th>
                        <th>Cantidad</th>
                        <th>Precio (und.)</th>
                        <th>Precio Total</th>

                    </tr>

                </thead>

                <tbody>
                    
                    <!-- Llamamos a la función mustraProductos la cual nos imprime por pantalla directamente la lista de productos,
                        junto con su precio total. -->
                    <?php muestraProductos(); ?>

                </tbody>

                <tfoot>

                    <tr>

                        <td colspan="3">

                            Cuantía total de la compra

                        </td>

                        <td>
                            
                            <!-- Se procede a llamar a la función precioTotal, el cual nos devuelve el total de la compra indicada. -->
                            <?php echo precioTotal(); ?>

                        </td>

                    </tr>

                </tfoot>

            </table>

        <?php endif; ?>
    </section>

    <footer>
        
        <!-- Le damos al usuario la opción de volver al menú principal. -->
        <br>
        <a href="../index.php">Menú</a>
        </br>

        <p>Realizado por Julián Sanjuán Barrera</p>

    </footer>

</body>
</html>