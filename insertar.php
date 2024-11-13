<?php

require 'conexion.php';  

$nombre_usuario = $_POST['nombre_usuario'];
$correo_usuario = $_POST['correo_usuario'];
$password = $_POST['password'];
$fecha_registro = $_POST['fecha_registro'];


$stmt = $conn->prepare("CALL nuevo_usuario(?, ?, ?, ?)");
$stmt->bind_param("ssss", $nombre_usuario, $correo_usuario, $password, $fecha_registro);

// Ejecutamos la consulta
if ($stmt->execute()) {
    echo "Usuario registrado con éxito.";
} else {
    echo "Error al registrar el usuario.";
}

// Cerramos la conexión
$stmt->close();
$conn->close();
?>
