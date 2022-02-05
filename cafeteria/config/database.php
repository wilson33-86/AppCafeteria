<?php 


function conectarDB()
{
    $password = "";
    $user = "root";
    $dbName ="cafeteria";
    $database = new PDO('mysql:host=localhost;dbname=' . $dbName, $user, $password);
    $database->query("set names utf8;");
    $database->setAttribute(PDO::ATTR_EMULATE_PREPARES, FALSE);
    // ATTR_EMULATE_PREPARES, false: esta opción desactiva la emulación de las 
    // instrucciones preparadas y permite que el motor de la base de datos de MySQL las prepare por su cuenta.
    $database->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION: este atributo le indica a PDO que
    //  inicie una excepción si se encuentra un error. Los errores se pueden registrar para su depuración.
    $database->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
    return $database;
}


?>