<?php
    
    //Indicamos que vamos a iniciar una nueva sesión o restaurarla,
    //en el caso de que ya existiera una.
    session_start();

    //Incluimos la vista menú en el archivo, solo una vez.
    //Siendo el mismo un requisito indispensable y solo pudiendo incluir dicho
    //archivo una vez.
    require_once "views/menu.php";

?>