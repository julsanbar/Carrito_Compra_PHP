<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modificar</title>
    <link rel="stylesheet" href="../views/resources/css/estiloModificar.css">
    <link rel="shortcut icon" href="../views/resources/img/logo.jpg" type="image/x-icon">
    <script src="../views/resources/js/modificarApp.js"></script>
    
</head>
<body>

    <header>

        <?php  if(strcmp($vacio,'true') == 0 || sizeof($_SESSION['productos']) == 0): ?>
            <h2>Ups no encontré ningún producto en la lista</h2>
        <?php  endif;  ?>
        
        <?php  if(strcmp($vacio,'true') != 0 && sizeof($_SESSION['productos']) != 0): ?>
            <h2>Productos</h2>
        <?php  endif;  ?>
    </header>

    <section>

        <?php if(strcmp($vacio,'true') != 0 && sizeof($_SESSION['productos']) != 0): ?>
            
            <table>
                
                <thead>

                    <tr>

                        <th>Nombre</th>
                        <th>Cantidad</th>
                        <th>Precio (und.)</th>
                        <th>Elección</th>

                    </tr>

                </thead>

                <tbody>

                    <?php seleccionaActualiza(); ?>

                </tbody>

            </table>

        <?php endif; ?>
    </section>

    <section style="visibility: hidden; display: none;">

        <p>¿Desea actualizar el producto seleccionado?</p>

        <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">

            <input type="hidden" name="producto" id="ocultoProducto" value="">
            <input type="hidden" name="Nombre" id="ocultoNombre" value="">
            <input type="hidden" name="Cantidad" id="ocultoCantidad" value="">
            <input type="hidden" name="Precio" id="ocultoPrecio" value="">

            <input type="submit" value="Si" name="si" class="btnsubmit">
            <input type="button" value="No" name="no" id="no" class="btnbutton">
    
        </form>

        <br>

    </section>

    <?php  if(!empty($errores)): ?>
            <div class = "error"> <?php echo $errores; ?> </div>
    <?php  endif;  ?>

    <footer>
        
        <!-- Le damos al usuario la opción de volver al menú principal. -->
        <br>
        <a href="../index.php">Menú</a>
        </br>

        <p>Realizado por Julián Sanjuán Barrera</p>

    </footer>

</body>
</html>