<?php

session_start();


if (!isset($_SESSION['usuario_id'])) {
   
    header("Location: iniciar_sesion.php");
    exit;
}


require 'conexion.php';


$reseña_id = $_POST['reseña_id'];
$calificacion_resena = $_POST['calificacion_resena'];
$comentario_resena = $_POST['comentario_resena'];


$stmt = $conn->prepare("CALL modificar_resena(?, ?, ?)");
$stmt->bind_param("iis", $reseña_id, $calificacion_resena, $comentario_resena);


$stmt->execute();


$result = $stmt->get_result();
$row = $result->fetch_assoc();


if ($row) {
    echo $row['mensaje'];
} else {
    echo "Error al modificar la reseña. Por favor, inténtelo de nuevo.";
}


$stmt->close();
$conn->close();
?>
