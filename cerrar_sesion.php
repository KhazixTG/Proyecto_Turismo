<?php

session_start();

// Borrar todas las variables de sesión
$_SESSION = [];


session_destroy();


header("Location: index.html");
exit;
?>
