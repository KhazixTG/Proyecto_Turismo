<?php

session_start();


if (!isset($_SESSION['usuario_id'])) {
    
    header("Location: iniciar_sesion.php");
    exit;
}

require 'conexion.php';


$reseñas = $conn->query("SELECT r.RESEÑA_ID, l.NOMBRE_LUGAR FROM reseñas r JOIN lugares l ON r.LUGAR_ID = l.LUGAR_ID WHERE r.USUARIO_ID = " . $_SESSION['usuario_id']);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modificar Reseña</title>
</head>
<body>
    <h2>Modificar Reseña</h2>
    <form action="modificar.php" method="post">
        <label for="reseña">Reseña:</label><br>
        <select id="reseña" name="reseña_id" required>
            <option value="">Seleccionar</option>
            <?php while ($row = $reseñas->fetch_assoc()) { ?>
            <option value="<?php echo $row['RESEÑA_ID']; ?>"><?php echo $row['NOMBRE_LUGAR']; ?></option>
            <?php } ?>
        </select><br><br>

        <label for="calificacion">Nueva Calificación:</label><br>
        <select id="calificacion" name="calificacion_resena" required>
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>
        </select><br><br>

        <label for="comentario">Nuevo Comentario:</label><br>
        <textarea id="comentario" name="comentario_resena" rows="4" cols="50" placeholder="Modifica tu comentario aquí" required></textarea><br><br>

        <input type="submit" value="Modificar Reseña">
    </form>
    <br>
    <form action="formulario_resena.php" method="get">
        <input type="submit" value="ingresar Reseñas">
    </form>
    <br>
    <form action="cerrar_sesion.php" method="post">
        <input type="submit" value="Cerrar Sesión">
    </form>
    <br>
</body>
</html>

