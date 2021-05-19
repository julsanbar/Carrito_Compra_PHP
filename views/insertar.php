<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insertar</title>
    
    <!-- Enlazamos nuestra hoja de estilo. -->
    <link rel="stylesheet" href="../views/resources/css/estiloInsertar.css">
    
    <!-- Enlazamos el nuevo icono de la pestaña. -->
    <link rel="shortcut icon" href="../views/resources/img/logo.jpg" type="image/x-icon">
</head>
<body>

    <header>

        <h2>Por favor rellene los siguientes campos</h2>

    </header>

    <section>
        
        <!-- Enviamos los datos recogidos por el formulario a la misma página. Además verificamos que si existe un 
            error en el envio de dicha información se guarden los valores introducidos por el usuario en cada campo.
            Para poder facilitar la correción de errores de cada campo. -->
        <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">

            <label for="nombre">Nombre:</label>
            <input type="text" name="nombre" id="nombre" placeholder="Azúcar" value="<?php if(!$enviado && isset($nombre)) echo $nombre; ?>"><br>

            <label for="cantidad">Cantidad:</label>
            <input type="text" name="cantidad" id="cantidad" placeholder="1" value="<?php if(!$enviado && isset($cantidad)) echo (int) $cantidad; ?>"><br>

            <label for="precio">Precio (unidad):</label>
            <input type="text" name="precio" id="precio" placeholder="3.0" value="<?php if(!$enviado && isset($precio)) echo (float) $precio; ?>"><br>

            <input type="submit" value="Insertar" name="aceptar" class="btnsubmit">
            
            <!-- Verifica los errores y si existen los imprime por pantalla. -->
            <?php  if(!empty($errores)): ?>
                <div class = "error"> <?php echo $errores; ?> </div>
            <?php  endif;  ?>

        </form>

        <?php  if(!empty($introducido)): ?>
                <p> <?php echo $introducido; ?> </p>
        <?php  endif;  ?>

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