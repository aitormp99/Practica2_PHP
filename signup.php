<?php
require "DataBase.php";
$db = new DataBase();
if (isset($_POST['fullname']) && isset($_POST['email']) && isset($_POST['username']) && isset($_POST['password'])) {
    if ($db->dbConnect()) {
        if ($db->signUp("users", $_POST['fullname'], $_POST['email'], $_POST['username'], $_POST['password'])) {
            echo "Registrado Correctamente";
        } else echo "Fallo al Registrar";
    } else echo "Error: Al conectar a la base de datos";
} else echo "Todos los archivos requeridos";
?>
