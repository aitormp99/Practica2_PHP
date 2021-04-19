<?php
require "DataBase.php";
$db = new DataBase();
if (isset($_POST['username']) && isset($_POST['password'])) {
    if ($db->dbConnect()) {
        if ($db->logIn("users", $_POST['username'], $_POST['password'])) {
            echo "Logeado Correctamenete";
        } else echo "Usuario o Contrasena incorrecta";
    } else echo "Error: Al conectar a la base de datos";
} else echo "Todos los archivos requeridos";
?>
