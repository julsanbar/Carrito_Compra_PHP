<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menú</title>
    <!-- Enlazamos nuestra hoja de estilo. -->
    <link rel="stylesheet" href="views/resources/css/estiloMenu.css">
    <!-- Enlazamos el nuevo icono de la pestaña. -->
    <link rel="shortcut icon" href="views/resources/img/logo.jpg" type="image/x-icon">
    
</head>
<body>

    <header>
        <h1>Bienvenido a Merca-donna</h1>
        <h2>Seleccione una de las siguientes opciones</h2>

    </header>

    <section>

        <ul>
            <!-- En cada opción nos dirigimos a cada uno de los controladores. -->
            <li><a href="controllers/controller.mostrar.php">Mostrar lista</a></li>    
            <li><a href="controllers/controller.insertar.php">Insertar</a></li>
            <li><a href="controllers/controller.modificar.php">Modificar</a></li>
            <li><a href="controllers/controller.eliminar.php">Eliminar</a></li>
        
        </ul>

    </section>

    <footer>

        <p>Realizado por Julián Sanjuán Barrera</p>

    </footer>

</body>
</html>