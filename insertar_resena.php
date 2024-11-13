<?php
// Conexión a la base de datos
require 'conexion.php';

//  datos del formulario
$lugar_id = $_POST['lugar_id'];
$usuario_id = $_POST['usuario_id']; // Este se envía de forma oculta desde el formulario
$calificacion_resena = $_POST['calificacion_resena'];
$comentario_resena = $_POST['comentario_resena'];


$stmt = $conn->prepare("CALL insertar_reseña(?, ?, ?, ?)");
$stmt->bind_param("iiis", $lugar_id, $usuario_id, $calificacion_resena, $comentario_resena);

if ($stmt->execute()) {
    echo "Reseña registrada con éxito.";
} else {
    echo "Error al registrar la reseña: " . $conn->error;
}

$stmt->close();
$conn->close();
?>
