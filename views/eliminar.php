<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Eliminar</title>
    
    <!-- Enlazamos nuestra hoja de estilo. -->
    <link rel="stylesheet" href="../views/resources/css/estiloEliminar.css">
    
    <!-- Enlazamos el nuevo icono de la pestaña. -->
    <link rel="shortcut icon" href="../views/resources/img/logo.jpg" type="image/x-icon">
    
    <!-- Enlazamos con nuestro código javaScript para la funcionalidad en la vista -->
    <script src="../views/resources/js/eliminarApp.js"></script>
</head>
<body>

    <header>
        
        <!-- Verificamos si la variable de control vacio es true, en cuyo caso le indicamos al usuario que 
            no hay productos almacenados en el carro de la compra. -->
        <?php  if(strcmp($vacio,'true') == 0 || sizeof($_SESSION['productos']) == 0): ?>
            <h2>Ups no encontré ningún producto en la lista</h2>
        <?php  endif;  ?>
        
        <?php  if(strcmp($vacio,'true') != 0 && sizeof($_SESSION['productos']) != 0): ?>
            <h2>Productos</h2>
        <?php  endif;  ?>
    </header>

    <section>
        
        <!-- Verificamos que la variable vacio no sea true, en cuyo caso se procede a visualizar la lista de compra. -->
        <?php if(strcmp($vacio,'true') != 0 && sizeof($_SESSION['productos']) != 0): ?>
            
            <table>
                
                <thead>

                    <tr>

                        <th>Nombre</th>
                        <th>Cantidad</th>
                        <th>Precio (und.)</th>
                        <th>Precio Total</th>
                        <th>Elección</th>

                    </tr>

                </thead>

                <tbody>
                    
                    <!-- Llamamos a la función mustraProductos la cual nos imprime por pantalla directamente la lista de productos,
                        junto con su precio total. -->
                    <!-- Además de crear una columna con botones los cuales, tienen como id el índice de los productos, es decir 
                        la fila o más bien el producto que se desea eliminar. -->

                    <?php seleccionProducto(); ?>

                </tbody>

            </table>

        <?php endif; ?>
    </section>
   
    <!-- Se oculta esta sección al inicio para que no haya errores. -->
    <section style="visibility: hidden; display: none;">

        <p>¿Desea eliminar el producto seleccionado?</p>

        <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">

            <input type="hidden" name="producto">

            <!-- Escogemos como tipo de campo button en la denegación de la elección, pues en un formulario no puede haber dos submit -->
            <input type="submit" value="Si" name="si" class="btnsubmit">
            <input type="button" value="No" name="no" class="btnbutton">
    
        </form>

        <br>

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