<?php
session_start();


require 'conexion.php';


$correo_usuario = $_POST['correo_usuario'];
$password = $_POST['password'];


$stmt = $conn->prepare("CALL verificar_usuario(?, ?)");
$stmt->bind_param("ss", $correo_usuario, $password);


$stmt->execute();

//id_usuario
$result = $stmt->get_result();
$row = $result->fetch_assoc();


if ($row && $row['validacion'] > 0) {
    
    $_SESSION['usuario_id'] = $row['validacion'];
    
    
    header("Location: formulario_resena.php");
    exit;
} else {
    
    echo "Correo o contraseña incorrectos. Por favor, inténtelo de nuevo.";
}


$stmt->close();
$conn->close();
?>


